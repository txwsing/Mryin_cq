<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/3
 * Time: 15:46
 */

namespace app\api\model;


class PeiView extends BaseModel
{

    public static function addView($pei_id, $uid)
    {
        return self::insertGetId(['pei_id' => $pei_id, 'uid' => $uid]);
    }


    public static function getCurrentDayViewNum($pei_id, $uid)
    {
        $current_day_time = date('Y-m-d H:i:s');
        $map['uid'] = $uid;
        $map['pei_id'] = $pei_id;
        $map['view_date'] = ['EGT', $current_day_time];
        return self::where($map)->count();
    }

    public static function getCurrentViewNum($pei_id, $uid)
    {
        $map['uid'] = $uid;
        $map['pei_id'] = $pei_id;
        return self::where($map)->count();
    }


}