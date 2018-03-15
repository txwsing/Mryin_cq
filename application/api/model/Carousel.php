<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/10/31
 * Time: 13:50
 */

namespace app\api\model;


use think\Db;
use think\Exception;
use think\Model;

class Carousel extends BaseModel
{
    protected $hidden = ['update_time','delete_time'];



    public static function getCarousel()
    {
        $carousel = Carousel::where('del', 0)->field('id, url')->select();
        foreach ($carousel as $k => $v) {
            $carousel[$k]['url'] = self::getImgUrlAttr($v['url']);
        }
        return $carousel;
    }
}
