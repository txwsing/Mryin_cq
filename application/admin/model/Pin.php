<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/20
 * Time: 15:54
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;


use think\Model;

class Pin extends Model
{

    public function uName()
    {
        return $this->belongsTo('User','uid','id');
    }

    public static function getAllPin()
    {
        $pins = self::with('uName')->paginate(10);
        return $pins;
    }
}