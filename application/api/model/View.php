<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/3
 * Time: 15:46
 */

namespace app\api\model;


class View extends BaseModel
{

    public static function addView($machine_id, $uid)
    {
        return self::insertGetId(['machine_id' => $machine_id, 'uid' => $uid]);
    }


    public static function getCurrentDayViewNum($machine_id, $uid)
    {
        $current_day_time = date('Y-m-d H:i:s');
        $map['uid'] = $uid;
        $map['machine_id'] = $machine_id;
        $map['view_date'] = ['EGT', $current_day_time];
        return self::where($map)->count();
    }

    public static function getCurrentViewNum($machine_id, $uid)
    {
        $map['uid'] = $uid;
        $map['machine_id'] = $machine_id;
        return self::where($map)->count();
    }


}