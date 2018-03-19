<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/19
 * Time: 15:21
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;


use think\Model;

class Report extends Model
{

    public function uName()
    {
        return $this->belongsTo('User','uid','id');
    }

    public function machineName()
    {
        return $this->belongsTo('Machine','machine_id','id');
    }

    public static function getAllReports()
    {
        $datas = self::with('uName,machineName')->paginate(10);
//        $datas = $datas->toArray();
        return $datas;
    }
}