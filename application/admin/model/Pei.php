<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/20
 * Time: 11:16
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;

use think\Model;

class Pei extends Model
{
    public function uName()
    {
        return $this->belongsTo('User','uid','id');
    }

    public static function getAllPei()
    {
        $result = self::with('uName')->paginate(10);
        return $result;
    }
}