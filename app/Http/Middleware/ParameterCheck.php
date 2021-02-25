<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use DB;
use Ixudra\Curl\Facades\Curl;
use Request;

/*
    傳入參數驗證
    必帶參數: host_ext_id、member_access_token
*/
class ParameterCheck extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // 如果Session已存在，則跳過驗證
        if (session()->has('LobbyInfo.host_ext_id') && session()->has('LobbyInfo.access_token') && $request->host_ext_id == session('LobbyInfo.host_ext_id') && $request->access_token == session('LobbyInfo.access_token')) {
            return $next($request);
        }

        // 語系確認
        $lang     = $this->LocalLang();
        $img_lang = 'en-US'; // 圖片語系
        switch ($lang) {
            case 'zh_tw':
                $img_lang = 'zh-TW';
            break;
            case 'zh_cn':
                $img_lang = 'zh-CN';
            break;
            case 'th_th':
                $img_lang = 'th-TH';
            break;
        }

        // 判斷必要參數
        $host_ext_id  = (isset($request->host_ext_id)) ? $request->host_ext_id : '';
        $access_token = (isset($request->access_token) ? $request->access_token : ''); // host端產生，用於驗證用戶
        if ($host_ext_id == '' || $access_token == '') { // 缺少必要參數時
            return redirect('/maintenance?error=2');
        }
        // ./判斷必要參數

        // 取得代理商資訊
        $host_info = $this->get_host_info_by_extid($host_ext_id);
        if (empty($host_info[0]) || $host_info[0]->status == 2) { // 代理商資訊不存在 || 代理商維護中
            $error_code = (empty($host_info[0])) ? 2 : 1;
            return redirect('/maintenance?error='.$error_code);
        }
        $host_id    = (isset($host_info[0]->host_id)) ? $host_info[0]->host_id : ''; // host_id
        $api_prefix = (isset($host_info[0]->api_prefix)) ? $host_info[0]->api_prefix : ''; // api前綴
        if ($host_id == '' || $api_prefix == '') { 
            return redirect('/maintenance?error=1');
        }
        $host_wallet = $host_info[0]->wallet;
        // ./取得代理商資訊

        // 判斷目前登入的代理商是否有連線資訊，如果沒有則在更新database.php後重新訪問以同步取得DB連線設定
        if ($this->check_database($host_id)) {
            return redirect('/Login/'.$host_ext_id.'?access_token='.$access_token);
        }

        // 判斷是否限制遊戲人數
        $lobby_control = $this->get_lobby_setting('lobby_control');
        if ($lobby_control == 1) { // 限制啟用時
            $lobby_limited_people = $this->get_lobby_setting('lobby_limited_people'); // 取得人數上限
            $online_count         = $this->get_online_count($host_id); // 取得該代理目前遊玩人數
            if ($online_count >= $lobby_limited_people) { // 上線人數超過上限
                return redirect('/maintenance?error=3');
            }
        }

        // 預設
        $member_id      = ""; // 玩家ID
        $member_balance = 0;  // 玩家餘額
        $jp_start       = 0;  // jackpot
        $open_game_url  = env('OPEN_GAME_URL', 'iplaystar.net'); // URL; 預設試玩URL
        $host_currency  = ""; // 代理幣別
        $timezone       = "+08:00"; // 代理商時區 預設+08:00
        // ./預設

        // 進行用戶驗證
        $validation_results = $this->verify_user($access_token, $host_id);
        if (!empty($validation_results->status_code) && $validation_results->status_code == 0) {
            $host_id_info  = $this->get_host_info_by_hostid($host_id); // 取得彩金匯率
            $member_id     = $validation_results->member_id; // 玩家ID
             // 帳戶幣別 20200423增加判斷: 如顯示幣別為NON時則顯示帳務幣別
            $host_currency = ($host_id_info[0]->currency == "NON") ? $host_id_info[0]->bill_currency : $host_id_info[0]->currency;
            $timezone      = $host_id_info[0]->timezone; // 代理所屬時區
        } else { // 驗證失敗
            return redirect('/maintenance?error=2');
        }
        // ./進行用戶驗證

        // 用戶與代理資訊存入session，存入前先清舊資料
        session()->flush('LobbyInfo');
        session([
            'LobbyInfo' => [
                'access_token'     => $access_token,
                'host_ext_id'      => $host_ext_id,
                'host_id'          => $host_id,
                'host_currency'    => $host_currency,
                'host_wallet'      => $host_wallet,
                'api_prefix'       => $api_prefix,
                'member_id'        => $member_id,
                'lang'             => $lang,
                'img_lang'         => $img_lang,
                'open_game_url'    => $open_game_url,
                'timezone'         => $timezone,
            ]
        ]);


        return $next($request)
            ->header('Access-Control-Allow-Origin', '*') // 定義可進入的doname(非同源，如果同源就無需設定)
            ->header('Access-Control-Allow-Methods', 'GET', 'OPTIONS') // 定義可接受的Methods
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorizations'); // 定義可接受的Request Header
    }

    private function get_lobby_setting($key)
    {
        $lobby_setting = DB::connection('sms')->select("
            SELECT *
            FROM `setting`
            WHERE `key` = '{$key}'
        ");

        return (!empty($lobby_setting)) ? $lobby_setting[0]->value : '';
    }

    private function get_online_count($host_id)
    {
        $online_count = DB::connection($host_id . '_slot')->select("
            SELECT COUNT(0) AS online_count
            FROM `session`
            WHERE host_id = '{$host_id}'
        ");
        return (!empty($online_count)) ? $online_count[0]->online_count : 0;
    }

}
