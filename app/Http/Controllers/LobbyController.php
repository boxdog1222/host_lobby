<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use App;
use DB;
use Ixudra\Curl\Facades\Curl;

class LobbyController extends Controller
{
    // 中途轉跳頁 暫時不使用
    public function Login_index($host_ext_id)
    {
        $input = Request::input();
        $access_token = (isset($input['access_token']) ? $input['access_token'] : '');
        return redirect('/'.$host_ext_id."?access_token=".$access_token);
    }

    // Lobby頁面
    public function Lobby_index($host_ext_id)
    {
        // 判斷必要參數
        $input = Request::input();
        $access_token = (isset($input['access_token']) ? $input['access_token'] : '');
        if ($host_ext_id == '' || $access_token == '') { // 缺少必要參數時
            return redirect('/maintenance?error=3');
        }
        // ./判斷必要參數

        // Step 1: 檢查Session
        if (!session()->has('LobbyInfo') || !session()->has('LobbyInfo.host_id') || session('LobbyInfo.host_ext_id') != $host_ext_id || session('LobbyInfo.access_token') != $access_token) {
            // Session不存在

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

            // 取得代理商資訊
            $host_info = $this->get_host_info_by_extid($host_ext_id);
            if (empty($host_info[0]) || $host_info[0]->status == 2) { // 代理商資訊不存在 || 代理商維護中
                $error_code = (empty($host_info[0])) ? 2 : 1;
                return redirect('/maintenance?error='.$error_code);
            }
            $host_id    = (isset($host_info[0]->host_id)) ? $host_info[0]->host_id : ''; // host_id
            $api_prefix = (isset($host_info[0]->api_prefix)) ? $host_info[0]->api_prefix : ''; // api前綴
            if ($host_id == '' || $api_prefix == '') { 
                return redirect('/maintenance?error=4');
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
                    return redirect('/maintenance?error=5');
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
            // var_dump($validation_results);
            if (!empty($validation_results) && $validation_results->status_code == 0) {
                $host_id_info  = $this->get_host_info_by_hostid($host_id); // 取得彩金匯率
                $member_id     = $validation_results->member_id; // 玩家ID
                // 帳戶幣別 20200423增加判斷: 如顯示幣別為NON時則顯示帳務幣別
                $host_currency = ($host_id_info[0]->currency == "NON") ? $host_id_info[0]->bill_currency : $host_id_info[0]->currency;
                $timezone      = $host_id_info[0]->timezone; // 代理所屬時區
            } else { // 驗證失敗
                return redirect('/maintenance?error=4');
            }
            // ./進行用戶驗證

            // 取得帳務幣別
            $accounting_unit = $this->accounting_unit($host_id);
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
                    'accounting_unit'  => $accounting_unit
                ]
            ]);
        }

        // Session已存在
        // 前端Value - 代理
        $access_token   = session('LobbyInfo.access_token');
        $api_prefix     = session('LobbyInfo.api_prefix');
        $host_ext_id    = session('LobbyInfo.host_ext_id');
        $host_id        = session('LobbyInfo.host_id');
        $host_currency  = session('LobbyInfo.host_currency');
        $host_wallet    = session('LobbyInfo.host_wallet');
        $host_game_data = $this->get_host_game_list($host_id);
        $host_game_list = $host_game_data['host_game_list'];
        $bcrt_check     = $host_game_data['bcrt_check'];
        $fish_check     = $host_game_data['fish_check'];
        $arcade_check   = $host_game_data['arcade_check'];
        // ./前端Value - 代理
        // 前端Value - 玩家
        $member_id      = session('LobbyInfo.member_id');
        $member_balance = 0;
        // ./前端Value - 玩家
        // 前端Value - 畫面參數
        $lang           = session('LobbyInfo.lang');
        $img_lang       = session('LobbyInfo.img_lang');
        $jp_start       = 0;
        $open_game_url  = session('LobbyInfo.open_game_url');
        $timezone       = session('LobbyInfo.timezone');
        // ./前端Value - 畫面參數

        // 預設 - 活動預熱、正式開跑、彩金宣傳
        $ad_show        = 0;  // 是否顯示廣告 0: 不顯示; 1: 顯示
        $ad_filename    = ""; // 廣告圖片名稱
        $event_mode     = -1; // 活動模式 -1: 無(預設); 0: UFA廣告; 1: 活動預告; 2: 活動正式開始;
        $ad_start       = "";
        $ad_end         = "";
        // ./預設 - 活動預熱、正式開跑、彩金宣傳

        $validation_results = $this->verify_user($access_token, $host_id);
        if (empty($validation_results) || $validation_results->status_code != 0) { // 驗證失敗
            return redirect('/logout');
        }
        
        $jp_hit_list  = $this->get_jackpot_hit($host_id); //取得中獎名單
        
        if ($host_wallet == 1) { // 獨立錢包
            $member_balance = number_format($this->get_member_info($host_id, $member_id), 2); // 玩家餘額
        } else {
            // $validation_results = $this->verify_user($access_token, $host_id);
            if (!empty($validation_results) && $validation_results->status_code == 0) {
                $member_balance = number_format(($validation_results->balance / 100), 2); // 玩家餘額
            }
        }

        // $host_currency = "THB";

        // 判斷目前是否有活動
        $lobby_ad_info = $this->get_event_info();
        $now_time      = date('Y-m-d H:i:m', strtotime("+8 hours", time())); // 當前時間
        for ($i = 0; $i < count($lobby_ad_info); $i++) {
            // 當前時間有活動
            if ($now_time >= $lobby_ad_info[$i]["start_time"] && $now_time <= $lobby_ad_info[$i]["end_time"]) {
                // 活動類型為2或4
                if (($lobby_ad_info[$i]["event"] == 2 || $lobby_ad_info[$i]["event"] == 4 || $lobby_ad_info[$i]["event"] == 5) && $host_currency == "THB") {
                    $ad_show     = ($lobby_ad_info[$i]["event"] != 4) ? 1 : 0; // 偷跑活動不顯示彈窗
                    $event_mode  = $lobby_ad_info[$i]["event"];
                    $ad_filename = $lobby_ad_info[$i]["img"];
                    $ad_start    = $lobby_ad_info[$i]["start_time"];
                    $ad_end      = $lobby_ad_info[$i]["end_time"];
                } else if ($lobby_ad_info[$i]["event"] != 2 && $lobby_ad_info[$i]["event"] != 4) {
                    $ad_show     = ($lobby_ad_info[$i]["event"] != 4) ? 1 : 0; // 偷跑活動不顯示彈窗
                    $event_mode  = $lobby_ad_info[$i]["event"];
                    $ad_filename = $lobby_ad_info[$i]["img"];
                    $ad_start    = $lobby_ad_info[$i]["start_time"];
                    $ad_end      = $lobby_ad_info[$i]["end_time"];
                }
                break;
            }
        }
        
        if ($event_mode == 2 || $event_mode == 4) {
            // 活動期間JP初始值改為紅包累積金額
            $jp_start = $this->get_event_jp($host_id, $ad_start, $ad_end, $timezone);
        } else {
            // 一般JP
            $host_id_info = $this->get_host_info_by_hostid($host_id); // 取得彩金匯率
            $jp_start = $this->get_jackpot_info($host_ext_id, $api_prefix) / $host_id_info[0]->jp_exchange_rate; // 取得目前jackpot最大值 * 代理彩金匯率
        }
        // ./判斷目前是否有活動

        // setting.lobby_ad_info: 活動相關設定Array
        // $lobby_ad_info = [
        //     // [ // 彩金宣傳
        //     //     "start_time" => "2020-03-24 00:00:00", // 開始時間
        //     //     "end_time" => "2020-03-29 23:59:59", // 結束時間
        //     //     "img" => "02", // 圖片名稱
        //     //     "event" => 0, // 活動類型
        //     // ],
        //     // [ // 預熱活動
        //     //     "start_time" => "2020-03-30 00:00:00",
        //     //     "end_time" => "2020-03-31 23:59:59",
        //     //     "img" => "event",
        //     //     "event" => 1,
        //     // ],
        //     // [ // 正式活動
        //     //     "start_time" => "2020-12-01 00:00:00",
        //     //     "end_time" => "2020-12-15 23:59:59",
        //     //     "img" => "20201224",
        //     //     "event" => 2,
        //     // ],
        //     // [ // 活動暫停公告
        //     //     "start_time" => "2020-04-05 00:00:00",
        //     //     "end_time" => "2020-04-14 23:59:59",
        //     //     "img" => "event_stop",
        //     //     "event" => 3,
        //     // ],
        //     // [ // 無彈窗活動
        //     //     "start_time" => "2020-05-04 00:00:00",
        //     //     "end_time" => "2020-05-31 23:59:59",
        //     //     "img" => "event",
        //     //     "event" => 4,
        //     // ],
        //     // [ // 刮刮樂活動
        //     //     "start_time" => "2020-12-01 00:00:00",
        //     //     "end_time" => "2020-12-15 23:59:59",
        //     //     "img" => "20201224",
        //     //     "event" => 5,
        //     // ],
        // ];
        // echo serialize($lobby_ad_info);

        // setting.lobby_host_arr: 會使用Lobby的代理商Array
        // $lobby_host_arr = ['T0000156', 'HostTemplate-CNY'];
        // echo serialize($lobby_host_arr);


        // 計算分類圖片寬度
        $category_card_width = '19.9%';
        $check_arr = [$bcrt_check, $fish_check, $arcade_check];
        $check = 0;
        for ($i = 0; $i < 3; $i++) {
            if ($check_arr[$i]) {
                $check++;
            }
        }
        if ($check == 3) {
            $category_card_width = '16.65%';
        }

        $version = $this->version();
        return view('gameLobby.game_lobby')
            ->with('lang', $lang)
            ->with('bcrt_check', $bcrt_check)
            ->with('fish_check', $fish_check)
            ->with('arcade_check', $arcade_check)
            ->with('category_card_width', $category_card_width)
            ->with('access_token', $access_token)
            ->with('api_prefix', $api_prefix)
            ->with('host_ext_id', $host_ext_id)
            ->with('img_lang', $img_lang)
            ->with('member_id', $member_id)
            ->with('member_balance', $member_balance)
            ->with('host_game_list', $host_game_list)
            ->with('jp_hit_list', $jp_hit_list)
            ->with('jp_start', $jp_start)
            ->with('open_game_url', $open_game_url)
            ->with('host_currency', $host_currency)
            ->with('ad_show', $ad_show)
            ->with('event_mode', $event_mode)
            ->with('ad_filename', $ad_filename)
            ->with('ad_start', $ad_start)
            ->with('version', $version);
    }

    public function Lobby_index_json()
    {
        //語系轉換
        $lang = Request::cookie('languages');     
        App::setLocale($lang);

        $json = array();
        $input = Request::input();

        switch ( $input['method'] ) {
            case 'jackpot_info': // 取得特定代理商的彩金
                $host_ext_id    = $input['host_ext_id'];
                $host_info      = $this->get_host_info_by_extid($host_ext_id);
                $host_id        = (isset($host_info[0]->host_id)) ? $host_info[0]->host_id : ''; // host_id
                $host_id_info   = $this->get_host_info_by_hostid($host_id); // 取得彩金匯率
                $api_prefix     = (isset($host_info[0]->api_prefix)) ? $host_info[0]->api_prefix : ''; // api前綴
                $json['jp_num'] = $this->get_jackpot_info($host_ext_id, $api_prefix) / $host_id_info[0]->jp_exchange_rate;

                $host_id        = session('LobbyInfo.host_id');
                $host_wallet    = session('LobbyInfo.host_wallet');
                $access_token   = session('LobbyInfo.access_token');
                $member_id      = session('LobbyInfo.member_id');
                if ($host_wallet == 1) { // 獨立錢包
                    $json['balance'] = session('LobbyInfo.host_currency') . " " . number_format($this->get_member_info($host_id, $member_id), 2); // 玩家餘額
                } else {
                    $validation_results = $this->verify_user($access_token, $host_id);
                    if ($validation_results->status_code == 0) {
                        $json['balance'] = session('LobbyInfo.host_currency') . " " . number_format(($validation_results->balance / 100), 2); // 玩家餘額
                    }
                }
            break;

            case 'reload_balance': 
                $json['balance'] = '';
                $host_ext_id  = $input['host_ext_id'];
                $access_token = $input['access_token'];
                $host_info    = $this->get_host_info_by_extid($host_ext_id);
                $host_id      = (isset($host_info[0]->host_id)) ? $host_info[0]->host_id : ''; // host_id
                if ($host_id != '') {
                    $validation_results = $this->verify_user($access_token, $host_id); // 進行用戶驗證
                    if ($validation_results->status_code == 0) {
                        $member_id = $validation_results->member_id; // 玩家ID
                        if ($host_info[0]->wallet == 1) { // 獨立錢包
                            $json['balance'] = number_format($this->get_member_info($host_id, $member_id), 2); // 玩家餘額
                        } else {
                            $json['balance'] = number_format(($validation_results->balance / 100), 2); // 玩家餘額
                        }
                    }
                }
            break;

            case 'session_check': 
                $host_ext_id  = $input['host_ext_id'];
                $access_token = $input['access_token'];
                $host_info    = $this->get_host_info_by_extid($host_ext_id);
                $host_id      = (isset($host_info[0]->host_id)) ? $host_info[0]->host_id : ''; // host_id
                if ($host_id != '') {
                    $validation_results = $this->verify_user($access_token, $host_id); // 進行用戶驗證
                    if ($validation_results->status_code == 0) {
                        $json['msg'] = 'success';
                    } else {
                        $json['msg'] = 'logout';
                    }
                }

            break;
        }
        return response()->json($json);
    }

    // 登出頁
    public function Logout()
    {
        session()->flush('LobbyInfo');
        return view('gameLobby.logout');
    }

    // 錯誤頁面
    public function maintenance()
    {
        session()->flush('LobbyInfo');
        $input = Request::input();
        $msg = trans('common.Game Maintenance');
        /* 
            錯誤碼 
            1: 維護中(預設)
            2: 缺少必要參數
            3: 人數已達上限
        */
        $error = (!empty($input['error'])) ? $input['error'] : 1; 
        if ($error == 2 || $error == 3 || $error == 4) {
            $msg = trans('common.Validation Failed');
        }
        return view('gameLobby.maintenance')
            ->with('error', $error)
            ->with('msg', $msg);
    }

    // 取得代理遊戲
    private function get_host_game_list($host_id)
    {
        $host_game_list = DB::connection($host_id . "_slot")->select("
            SELECT hg.game_id, hg.order, g.category, hg.subgame_id
            FROM host_game AS hg
            LEFT JOIN game AS g ON hg.game_id = g.id
            WHERE host_id = '{$host_id}'
            AND hg.game_id NOT LIKE '%APP%'
            AND hg.enable = 1
            UNION
            SELECT hfg.game_id, hfg.order, g.category, hfg.subgame_id
            FROM host_fish_game AS hfg
            LEFT JOIN game AS g ON hfg.game_id = g.id
            WHERE hfg.host_id = '{$host_id}'
            AND hfg.game_id LIKE 'PSF%'
            AND hfg.enable = 1
            UNION
            SELECT hcg.game_id, hcg.order, g.category, hcg.subgame_id
            FROM host_89_game AS hcg
            LEFT JOIN game AS g ON hcg.game_id = g.id
            WHERE hcg.host_id = '{$host_id}'
            AND hcg.enable = 1
            UNION
            (SELECT hbg.game_id, hbg.`order`, g.category, hbg.subgame_id
            FROM host_bac_game AS hbg
            LEFT JOIN game AS g ON hbg.game_id = g.id
            WHERE hbg.host_id = '{$host_id}'
            AND hbg.enable = 1
            AND hbg.subgame_id IN (1,2,3,4,5,6)
            ORDER BY hbg.subgame_id ASC
            LIMIT 1)
            UNION
            (SELECT hbg.game_id, hbg.`order`, g.category, hbg.subgame_id
            FROM host_card_game AS hbg
            LEFT JOIN game AS g ON hbg.game_id = g.id
            WHERE hbg.host_id = '{$host_id}'
            AND hbg.enable = 1
            AND hbg.subgame_id IN (0,1,2,3,4,5)
            ORDER BY hbg.subgame_id ASC
            LIMIT 1)
            UNION
            (SELECT hbg.game_id, hbg.`order`, g.category, hbg.subgame_id
            FROM host_arcade_game AS hbg
            LEFT JOIN game AS g ON hbg.game_id = g.id
            WHERE hbg.host_id = '{$host_id}'
            AND hbg.enable = 1
            ORDER BY hbg.subgame_id ASC)
            ORDER BY `order`, `game_id` ASC
        ");
        
        $bcrt_check = false;
        $fish_check = false;
        $arcade_check = false;

        if (!empty($host_game_list)) {
            foreach ($host_game_list as $key => $val) {
                 // 遊戲種類判斷
                switch (explode('-', $val->game_id)[0]) {
                    case 'PSF': 
                        $val->class_tag = 'all fish';
                        $fish_check = true;
                    break;

                    case 'PSB':
                    case 'PSC':
                        $val->class_tag = 'all card';
                        $bcrt_check = true;
                    break;

                    case 'PSM':
                        $val->class_tag = 'all arcade';
                        $arcade_check = true;
                    break;

                    default:
                        $val->class_tag = 'all';
                    break;
                }

                /* 
                    遊戲標籤判斷
                    1 : 最新
                    2 : 熱門
                    4 : 刺激
                    8 : 彩金
                */
               
                $val->class_tag .= ($val->category&1) ? ' new' : '';
                $val->class_tag .= ($val->category&2) ? ' hot' : '';
                $val->class_tag .= ($val->category&8) ? ' jp' : '';
            }
        }

        $retuen_data = [
            'host_game_list' => (empty($host_game_list)) ? [] : $host_game_list,
            'bcrt_check' => $bcrt_check,
            'fish_check' => $fish_check,
            'arcade_check' => $arcade_check,
        ];

        return $retuen_data;
    }

    // 取得後台設定 Backstage.setting
    private function get_event_info()
    {
        $lobby_ad_info = DB::connection('sms')->select("
            SELECT *
            FROM setting
            WHERE `key` = 'lobby_ad_info'
        ");

        return (!empty($lobby_ad_info)) ? unserialize($lobby_ad_info[0]->value) : [];
    }

    // 活動期間取得紅包累積金額
    private function get_event_jp($host_id, $ad_start, $ad_end, $timezone)
    {
        // if (!session()->has('LobbyInfo.total_amount') || session('LobbyInfo.total_amount') <= 0 || $host_id != session('LobbyInfo.host_id')) {
        $ad_start = date("Y-m-d 00:00:00", strtotime($ad_start));
        // echo $ad_start . '=>' . $ad_end;

        // 固定抓UFA那台
        $total_amount = DB::connection($host_id . '_slot')->select("
            SELECT IFNULL(SUM(jackpot_win), 0) AS total_amount 
            FROM acc_jackpot_daily
            WHERE jackpot_type = 3 
            AND game_day BETWEEN '{$ad_start}' AND '{$ad_end}'
        ");
        
        $total_amount = (!empty($total_amount) ? $total_amount[0]->total_amount / 100 : 0);
        return $total_amount;
        // session()->put('LobbyInfo.total_amount', $total_amount);
        // }

        // // 取得代理帳務
        // $accounting_unit = session('LobbyInfo.accounting_unit');
        // // $total_amount    = session('LobbyInfo.total_amount');

        // $now_hour = date("H", mktime(date('H')+8)); // 取得目前小時(+8時區)
        // $time  = time(); // 取得目前時間戳(+0時區)
        // if ($now_hour > 1) {
        //     $start = date("Y-m-d 00:00:00", strtotime("+8 hours", $time));
        //     $end   = date('Y-m-d H:00:00', strtotime("+8 hours", $time));
        //     // echo '過兩點: '. $start . ' -> ' . $end;
        //     try {
        //         $jp_win = DB::connection($host_id . '_slot')->select("
        //             SELECT IFNULL(SUM(jackpot_win), 0) AS jackpot_win 
        //             FROM accounting_jackpot 
        //             WHERE host_id = '{$host_id}'
        //             AND jackpot_type = '3' 
        //             AND jackpot_win > 0 
        //             AND hit_time BETWEEN convert_tz('$start', '$timezone', '+00:00') AND convert_tz('$end', '$timezone', '+00:00')
        //         ");
        //     } catch (\Exception $e) {
        //         $jp_win = 0;
        //     }
        // } else { // 還沒過凌晨2點前都撈前一日整天資料
        //     $start = date("Y-m-d 00:00:00", strtotime("+8 hours", $time));
        //     $end   = date('Y-m-d H:00:00', strtotime("+8 hours", $time));
        //     // echo '還沒過兩點: '. $start . ' -> ' . $end;
        //     try {
        //         $jp_win = DB::connection($host_id . '_slot')->select("
        //             SELECT IFNULL(SUM(jackpot_win), 0) AS jackpot_win 
        //             FROM accounting_jackpot 
        //             WHERE host_id = '{$host_id}'
        //             AND jackpot_type = '3' 
        //             AND jackpot_win > 0 
        //             AND hit_time BETWEEN convert_tz('$start', '$timezone', '+00:00') AND convert_tz('$end', '$timezone', '+00:00')
        //         ");
        //     } catch (\Exception $e) {
        //         $jp_win = 0;
        //     }
        // }
        // $jp_win = (!empty($jp_win) ? $jp_win[0]->jackpot_win / $accounting_unit : 0);

        // return ($jp_win+$total_amount);
    }

    // 中介層function
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
    } // ./中介層function
}
