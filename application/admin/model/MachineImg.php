<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/20
 * Time: 11:48
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;


use think\Model;

class MachineImg extends Model
{
    public static function getMachineImg($id)
    {
        $data = self::where('machine_id','=',$id)->select();
        $data = $data->toArray();
        return $data;
    }
}