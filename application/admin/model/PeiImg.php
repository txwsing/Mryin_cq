<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/20
 * Time: 15:11
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;


use think\Model;

class PeiImg extends Model
{
    public static function getPeiImgByID($id)
    {
        $result =self::where('pei_id','=',$id)->select();
        $result = $result->toArray();
        return $result;
    }
}