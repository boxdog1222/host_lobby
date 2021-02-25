<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use App;
use DB;
use Auth;
use Cookie;
use Ixudra\Curl\Facades\Curl;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function version()
    {
        // 版本說明
        /*
            v 3.0.0.000 200331
            1.UFA LOBBY獨立
            2.database.php檔案更新機制更換
            3.驗證機制由中介層處理
            
            v 3.0.0.001 200401
            1.活動角標&JP圖更換、增加人數上限判斷
            
            v 3.0.0.002 200406
            1.暫停活動公告、增加彈窗顯示時間判斷

            v 3.0.0.004 200415
            1.JP起始值&玩家餘額移出中介層、10分鐘更新JP同步更新玩家餘額
            2.參數逾期訊息修改

            v 3.0.0.005 200422
            1.修正session問題

            v 3.0.0.006 200423
            1.修正JP顯示時機
            2.增加判斷顯示幣別

            v 3.0.0.007 200505
            1.增加event_mode: 4(偷跑活動，只更換角標)

            v 3.0.0.008 200507
            1.最新分類角標移除
            2.game_logo更新
            3.修正手機開啟百家樂時沒帶subgame_id問題
            4.增加彩金宣傳圖檔

            v 3.0.0.009 200529
            1.新增 jackpot 名單顯示

            v 3.0.0.010 200601
            1.調整 jackpot 中將名單手機顯示異常問題

            v 3.0.0.011 2000722
            1.調整正式活動判斷(僅THB幣別)

            v 3.0.0.012 2000724
            1.調整html tag名稱(廣告)

            v 3.0.0.013 2000727
            1.調整jackpot_type類型
            2.活動時JP累積金額刷新改為5分鐘更新一次(LobbyController、ResourceController)
            3.調整活動時JP數值更新規則(新的數值如未大於目前數值則不更新)
            4.跑馬燈中獎資訊調整
            
            v 3.0.0.014 2000728
            1.用戶驗證機制調整
            
            v 3.0.0.015 2000729
            1.調整登入流程
            2.活動彈窗gif更新
            
            v 3.0.0.016 2000731
            1.登入驗證流程修改、讀取活動累積彩金方式更改
            
            v 3.0.0.017 2000803
            1.驗證時間點修改
            
            v 3.0.0.018 2000804
            1.紅包累積計算方式更改
            2.畫面大小改變時，數字滾輪套件reset
            
            v 3.0.0.019 2000804
            1.中獎名單資料撈取優化
            
            v 3.0.0.020 2000810
            1.網頁時間判斷是否補0
            
            v 3.0.0.021 2000817
            1.紅包累積資料表更改為slot-game.acc_jackpot_daily

            v 3.0.0.022 2000817
            1.彩金中獎名單資料來源更改為slot-game.acc_win_times

            v 3.0.0.024 2000820
            1.紅包累積固定抓UFA那台
            2.活動彈窗圖片檔名後方改帶版號
            
            v 3.0.0.025 2000828
            1.廣告彈窗圖更換
            
            v 3.0.0.026 2000917
            1.活動判斷修正
            2.增加天子傳奇圖片
            
            v 3.0.0.027 2000924
            1.增加判斷代理商遊戲類別
            
            v 3.0.0.028 2001113
            1.增加泰文語系圖片判斷
            
            v 3.0.0.029 2001201
            1.獨立錢包用戶餘額資料來源改為撈取API
            
            v 3.0.0.030 2001207
            1.Lobby增加撈取拉密
            
            v 3.0.0.031 2001210
            1.調整玩家餘額API參數 博八博九第二階段
            
            v 3.0.0.032 2001214
            1.刮刮樂版本
            
            v 3.0.0.033 2001215
            1.活動類型增加 5: 刮刮樂活動
            
            v 3.0.0.035 2001221
            1.調整API
            
            v 3.0.0.036 2001224
            1.調整網頁前端角標顯示
            
            v 3.0.0.037 210104
            1.埋GA
            
            v 3.0.0.038 210107
            1.暫時不取得博八博九遊戲
            
            v 3.0.0.039 210108
            1.顯示博八博九遊戲
            
            v 3.0.0.040 210114
            1.增加顯示街機遊戲
            
            v 3.0.0.042 210121
            1.新增街機ICON、增加顯示判斷
            2.更換分類圖檔
            
            v 3.0.0.043 210125
            1.修正街機SQL

        */
        return 'v 3.0.0.043 210125';
    }

    // 語系設置
    public function LocalLang()
    {
        $lang = !empty(trim(Request::input('lang'))) ? trim(Request::input('lang')) : '';

    	if(!empty($lang)) {
    		switch (strtolower($lang)) {
    			case 'zh_cn':
    				$lang = 'zh_cn';
    				break;
    			case 'zh-cn':
    				$lang = 'zh_cn';
    				break;
    			case 'zh_tw':
    				$lang = 'zh_tw';
    				break;
    			case 'zh-tw':
    				$lang = 'zh_tw';
    				break;
    			case 'th_th':
    				$lang = 'th_th';
    				break;
    			case 'th-th':
    				$lang = 'th_th';
    				break;
    			default:
    				$lang = 'en';
    				break;
    		}
    		Cookie::queue(Cookie::forever('languages', $lang));
    	} else if (empty(trim(Request::cookie('languages')))) {
    		Cookie::queue(Cookie::forever('languages', "en"));
            $lang = "en";
    	} else {
            $lang = Request::cookie('languages');
    	}

        $languages = array('en', 'zh_tw', 'zh_cn', 'th_th');
        
        if (!in_array($lang, $languages)) {
        	App::setLocale('en');
        	return 'en';
        } else
            App::setLocale($lang);
        
        return $lang;
    }

    // 驗證用戶 呼API
    public function verify_user($access_token, $host_id)
    {
        // 取得該代理商資訊
        $host_info = $this->get_host_info_by_hostid($host_id);
        // 取得api資訊
        $api_info = json_decode($host_info[0]->api_info);
        $base_url = $api_info->base_url;
        $auth     = $api_info->auth;
        // 組合API位置
        $url = $base_url . '/' . $auth . '?access_token=' . $access_token;
        // 執行驗證
        $validation_results = Curl::to($url)
            ->asJson()
            ->get();
        /* 
            error code 代碼
            成功      => 0
            Token無效 => 1
        */ 

        if(!isset($validation_results->status_code)) {
            return (object) [
                'status_code' => 1
            ];
        }
        return $validation_results;
    }
    
    // 取得代理商資訊
    public function get_host_info_by_hostid($host_id)
    {
        // 取得該代理商資訊
        $host_info = DB::connection($host_id . "_slot")->select("
            SELECT *
            FROM host_id
            WHERE host_id = '{$host_id}'
        ");
        return (empty($host_info)) ? [] : $host_info;
    }

    // 從後台DB取得對應host_id
    public function get_host_info_by_extid($host_ext_id)
    {
        $host_info = DB::connection('sms')->select("
            SELECT *
            FROM host_list
            WHERE host_ext_id = '{$host_ext_id}'
        ");

        return (empty($host_info)) ? array() : $host_info;
    }
    
    // 獨立錢包取得會員錢包 2020.11.30更新
    public function get_member_info($host_id, $member_id)
    {
        $host_list_info = DB::connection('sms')->select("
            SELECT *
            FROM host_list
            WHERE host_id = '{$host_id}'
        ");
        $api_url = env('API_URL', 'iplaystar.net'); // URL; 預設試玩URL
        $api_prefix = $host_list_info[0]->api_prefix;
        $host_ext_id = $host_list_info[0]->host_ext_id;
        // $url = "https://$api_prefix.$api_url/funds/getbalance?host_id=" . $host_ext_id . "&member_id=" . $member_id . "&purpose=130";
        $url = "https://$api_prefix.$api_url/funds/getbalance?host_id=" . $host_ext_id . "&member_id=" . $member_id;
        // echo $url;
        $member_wallet_info = Curl::to($url)
            ->asJson()
            ->get();

        $balance = 0;
        if (isset($member_wallet_info->status_code) && $member_wallet_info->status_code == 0) {
            $balance = $member_wallet_info->balance / 100;
        }
        return $balance;

        // $member_info = DB::connection($host_id . '_slot')->select("
        //     SELECT player_cent
        //     FROM member
        //     WHERE id = '{$member_id}'
        //     AND host_id = '{$host_id}'
        // ");

        // return (!empty($member_info[0]->player_cent)) ? $member_info[0]->player_cent / 100 : 0;
    }

    // 取得彩金 呼API
    public function get_jackpot_info($host_ext_id, $api_prefix)
    {
        $api_url = env('API_URL', 'iplaystar.net'); // URL; 預設試玩URL

        // 組合API位置
        $url = "https://$api_prefix.$api_url/feed/jackpot?host_id=" . $host_ext_id;
        // 取得獎金池
        $jackpot_info = Curl::to($url)
            ->asJson()
            ->get();

        /* jackpot回傳取最大數值 */
        $max_amount = 0;
        $has_enter = false;
        $jackpot_info = (!empty($jackpot_info)) ? $jackpot_info : [];
        
        foreach ($jackpot_info as $pool_group) {
            foreach ($pool_group as $amount) {
                if ($max_amount < $amount->pool_amount) {
                    $has_enter = true;
                    $max_amount = $amount->pool_amount;
                }
            }
        }
        return ($has_enter) ? $max_amount / 100 : -1;
    }

    // 取得彩金中獎名單
    public function get_jackpot_hit($host_id)
    {
        $rtn_arr    = []; //回傳數據
        // return $rtn_arr;
        $time       = time();
        $start_time = date("Y-m-d H:i:s", strtotime("-1 day", $time)); // 起始時間 (當日-1天)
        $end_time   = date("Y-m-d H:i:s", strtotime("-1 hour", $time)); // 結束時間 (目前-1小時)

        // 最近 24 小時獎項
        $top_list = DB::connection($host_id . '_slot')->select("
            SELECT aj.accounting_sn, aj.member_id, aj.jackpot_win / 100 AS jackpot_win, convert_tz(aj.game_time, '+00:00', '+08:00') AS game_time
            FROM acc_win_times aj
            WHERE aj.host_id = '$host_id'
            AND aj.jackpot_win > 0
            AND aj.game_time BETWEEN convert_tz('$start_time', '+08:00', '+00:00') AND convert_tz('$end_time', '+08:00', '+00:00')
            ORDER BY aj.game_time DESC
        ");
        
        $tmp_arr  = [];
        $tmp_arr2 = [];
        // 依贏分排序 大->小
        foreach ($top_list as $key => $value) {
            $tmp_arr[$value->jackpot_win] = $value;
        }
        krsort($tmp_arr);
        $count = 0;
        foreach ($tmp_arr as $key => $value) {
            if ($count < 5) {
                // 最大獎項 TOP 5
                $rtn_arr[] = [ //回傳數據寫入
                    'jackpot_sn'  => $value->accounting_sn,
                    'member_id'   => $value->member_id,
                    'jackpot_win' => number_format($value->jackpot_win, 2),
                    'hit_time'    => $value->game_time
                ];
                unset($tmp_arr[$key]); // 移除已寫入的資料
                $count++;
            }
        }

        // 依時間排序 最新->最舊
        $tmp_count = 0;
        foreach ($tmp_arr as $key => $value) {
            // 避免日期重複
            if (!empty($tmp_arr2[$value->game_time])) {
                $tmp_arr2[$value->game_time . $tmp_count] = $value;
                $tmp_count++;
            } else {
                $tmp_arr2[$value->game_time] = $value;
            }
            
        }
        krsort($tmp_arr2);
        $count = 0;
        foreach ($tmp_arr2 as $key => $value) {
            if ($count < 5) {
                // 最新中獎 TOP 5
                $rtn_arr[] = [ //回傳數據寫入
                    'jackpot_sn'  => $value->accounting_sn,
                    'member_id'   => $value->member_id,
                    'jackpot_win' => number_format($value->jackpot_win, 2),
                    'hit_time'    => $value->game_time
                ];
                $count++;
            }
        }
        // file_put_contents("D:/msg.txt", print_r($tmp_arr2, 1) . "\n", FILE_APPEND);
        // file_put_contents("D:/msg.txt", print_r($rtn_arr, 1) . "\n", FILE_APPEND);
        // $tmp_where = "";

        // // 取出前五TOP名單，及單號排除用
        // foreach ($top_list as $value) {
        //     $rtn_arr[] = [ //回傳數據寫入
        //         'jackpot_sn'  => $value->jackpot_sn,
        //         'member_id'   => $value->member_id,
        //         'jackpot_win' => number_format($value->jackpot_win, 2),
        //         'hit_time'    => $value->hit_time
        //     ];

        //     //排除最新五筆資料使用
        //     $tmp_where .= empty($tmp_where) ? $value->jackpot_sn : "," . $value->jackpot_sn;
        // }

        // $del_sn_where = !empty($tmp_where) ? "AND aj.jackpot_sn NOT IN ($tmp_where)" : ''; //剔除已在大獎內的獎項號

        // //最近 24 小時最新五筆 jackpot 資料
        // $new_list = DB::connection($host_id . '_slot')->select("
        //     SELECT aj.jackpot_sn, a.member_id, aj.jackpot_win / 100 AS jackpot_win, convert_tz(aj.hit_time, '+00:00', '+08:00') AS hit_time
        //     FROM accounting_jackpot aj
        //     INNER JOIN accounting a ON (a.sn = aj.accounting_sn)
        //     WHERE aj.host_id = '$host_id'
        //     AND aj.jackpot_type = 1
        //     AND aj.hit_time BETWEEN convert_tz('$start_time', '+08:00', '+00:00') AND convert_tz('$end_time', '+08:00', '+00:00')
        //     $del_sn_where
        //     ORDER BY aj.hit_time DESC
        //     LIMIT 5
        // ");

        // // 取出最新五筆種獎名單
        // foreach ($new_list as $value) {
        //     $rtn_arr[] = [ //回傳數據寫入
        //         'jackpot_sn'  => $value->jackpot_sn,
        //         'member_id'   => $value->member_id,
        //         'jackpot_win' => number_format($value->jackpot_win, 2),
        //         'hit_time'    => $value->hit_time
        //     ];
        // }

        return $rtn_arr;
    }

    // 取得代理商帳務單位
    public function accounting_unit($host_id) 
    {
        $host_info = DB::connection($host_id . '_slot')->select("
            SELECT * 
            FROM host_id 
            WHERE host_id = '$host_id'
        ");
        $accounting_unit = !empty($host_info[0]) ? $host_info[0]->accounting_unit : "";
        return $accounting_unit;
    }

    // 判斷database
    public function check_database($host_id)
    {
        // 測試連線
        try {
            DB::connection($host_id . '_slot');
        } catch (\Exception $e) {
            $write_txt = "";
            $agent_txt = "";
            $local_ip = !empty(Request::server("LOCAL_ADDR")) ? Request::server("LOCAL_ADDR") : '127.0.0.1'; // 取得目前server ip
            $sub_domain = explode('//', explode('.', Request::getUri())[0])[1]; // 取得目前子網域

            // backstage 資料庫ip判斷
            if ($sub_domain == 'dev-admin') { // DEV
                $sms_ip = '127.0.0.1';
            } else if ($sub_domain == 'sms') { // abay本地&測試環境
                $sms_ip = '35.234.13.198';
            } else { // 正式
                $sms_ip = '172.31.27.103';
            }
            // ./backstage 資料庫ip判斷

            // 取得會使用Lobby的代理商
            $host_arr_txt   = "";
            $lobby_host_arr = DB::connection('sms')->select("
                SELECT `value`
                FROM setting
                WHERE `key` = 'lobby_host_arr'
            ");
            $lobby_host_arr = unserialize($lobby_host_arr[0]->value);
            foreach ($lobby_host_arr as $host) {
                if (empty($host_arr_txt)) {
                    $host_arr_txt = "('{$host}'";
                } else {
                    $host_arr_txt .= ", '{$host}'";
                }
            }
            $host_arr_txt .= ')';
            // ./取得會使用Lobby的代理商
            // 取得代理DB位置
            $host_list = DB::connection('sms')->select("
                SELECT `name`, hl.host_id as host_id, IF(region IN (SELECT region FROM provider_server_info WHERE private_ip = '$local_ip' OR public_ip = '$local_ip'), private_ip, public_ip) AS server_ip
                FROM host_list hl 
                LEFT JOIN server_info si ON (hl.server_id = si.id)
                AND hl.status = 1
                AND hl.host_id IN $host_arr_txt
            ");

            // database.php代理商連線設定(只寫入setting.lobby_host_arr內的代理商)
            foreach ($host_list as $value) {
                if (!empty($value->server_ip) && !is_null($value->server_ip)) {
                    $agent_txt .= 
"
        '".$value->host_id."_slot' => [
            'driver' => 'mysql',
            'host' => '".$value->server_ip."',
            'port' => env('DB_PORT', '3306'),
            'database' => 'slot-game',
            'username' => env('DB_USERNAME', 'backend'),
            'password' => env('DB_PASSWORD', 'E3HUjFNLj5MYxKMy'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],
";
                }
            }

            $write_txt =
"<?php

return array(

    'fetch' => PDO::FETCH_CLASS,
    'default' => env('DB_CONNECTION', 'mysql'),
    'connections' => [
        'sms' => [
            'driver' => 'mysql',
            'host' => '$sms_ip',
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'backstage'),
            'username' => env('DB_USERNAME', 'backend'),
            'password' => env('DB_PASSWORD', 'E3HUjFNLj5MYxKMy'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ], 
        $agent_txt
    ],
    'migrations' => 'migrations',
);
";
            // 更新DB組態檔
            file_put_contents("../config/database.php", $write_txt);
            return true;
        }
    }
}
