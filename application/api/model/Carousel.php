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

    public function getUrlAttr($value,$data)
    {
        return $this->prefixImgUrl($value,$data);
    }


    public static function getCarousel($type)
    {
        $carousel = Carousel::where(['type' => $type, 'del' => 0])->field('id, url')->select();
        return $carousel;
    }
}
