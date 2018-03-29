<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/15
 * Time: 16:39
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;


use think\Model;

class Category extends Model
{
    protected $hidden = [
        'create_time'
    ];


    public static function getAllCategorys()
    {
        $data = self::select();
        return $data;
    }
}