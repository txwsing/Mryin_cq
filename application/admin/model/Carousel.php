<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/19
 * Time: 16:04
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;


use think\Model;

class Carousel extends Model
{
    public static function getAllCarousel()
    {
        $result = self::select();
        $result = $result->toArray();
        return $result;
    }

}