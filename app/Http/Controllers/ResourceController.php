<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

/*
    接口Controller
*/
class ResourceController extends Controller
{
    // 取得潑水節累積紅包金額
    public function get_songkran_info($host_ext_id)
    {
        // 預設參數
        $json     = []; // 回傳變數
        $ad_start = ""; // 廣告開始時間
        $ad_end   = ""; // 廣告結束時間
        $host_id  = $this->host_id_change($host_ext_id); //取回正確 host_id

        if(empty($host_id)) { // 如果 host_id 不存在返回空 json
            return response()->json($json);
        }
        // 取得當前時間
        $current_time = date("Y-m-d H:i:s", strtotime("+8 hours", time()));
        // 取得代理時區
        $timezone = $this->host_timezone($host_id);
        // 取得代理帳務
        $accounting_unit = $this->accounting_unit($host_id);
        
        // 取得後台setting廣告參數
        $ad_info = DB::connection('sms')->select("
            SELECT value
            FROM setting
            WHERE `key` = 'lobby_ad_info'
        ");
        $ad_info = (!empty($ad_info)) ? unserialize($ad_info[0]->value) : []; // 反序列化廣告參數

        for ($i = 0; $i < count($ad_info); $i++) {
            // 取得目前正在執行的活動，event參數=2(潑水節活動)
            if ($ad_info[$i]['start_time'] <= $current_time && $ad_info[$i]['end_time'] >= $current_time && ($ad_info[$i]['event'] == 2 || $ad_info[$i]['event'] == 4)) {
                $ad_start = $ad_info[$i]['start_time'];
                $ad_end = $ad_info[$i]['end_time'];
            }
        }
        $jp_win = DB::connection($host_id . '_slot')->select("
            SELECT IFNULL(SUM(jackpot_win), 0) AS jackpot_win 
            FROM accounting_jackpot 
            WHERE host_id = '{$host_id}'
            AND jackpot_type = '3' 
            AND jackpot_win > 0 
            AND hit_time BETWEEN convert_tz('$ad_start', '$timezone', '+00:00') AND convert_tz('$ad_end', '$timezone', '+00:00')
        ");
        $jp_win = ($jp_win[0]->jackpot_win > 0) ? $jp_win[0]->jackpot_win / $accounting_unit : 0;
        $json['jp_win'] = $jp_win;

        return response()->json($json);
    }

    // 取得host_id
    private function host_id_change($host_ext_id)
    {
        // 找查 host_id
        $query = DB::connection("sms")->select(
            "SELECT * FROM host_list WHERE host_ext_id = '$host_ext_id'"
        );

        // 判斷host_id 是否存在
        if(empty($query)) {
            return '';
        }

        return $query[0]->host_id;
    }

    // 取得代理時區
    private function host_timezone($host_id)
    {
        try {
            $timezone = DB::connection($host_id . '_slot')->select("
                SELECT timezone
                FROM host_id
                WHERE host_id = '{$host_id}'
            ");
        } catch (\Exception $e) {
            $timezone = [];
        }

        return (!empty($timezone)) ? $timezone[0]->timezone : '+08:00';
    }
}
