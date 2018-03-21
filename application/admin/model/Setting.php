<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/21
 * Time: 11:19
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;


use think\Model;

class Setting extends Model
{
    public static function getSetting()
    {
        $setting = self::find();
        return $setting;
    }


    public static function editSettingByID($id)
    {
        $data = input('post.');
        $result = self::where('id','=',$id)->update($data);
        return $result;
    }
}