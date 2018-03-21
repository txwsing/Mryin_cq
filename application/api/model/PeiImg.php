<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 2018/3/16
 * Time: 14:52
 */

namespace app\api\model;


class PeiImg extends BaseModel
{
    protected $hidden = ['id','from','delete_time','update_time'];

    public function getUrlAttr($value,$data)
    {
        return $this->prefixImgUrl($value,$data);
    }

    public static function addPeiImage($path)
    {
        return  self::insertGetId(['url'  =>  $path]);
    }

    public static function updateImageByPeiId($images_ids, $pei_id)
    {

        self::where('id', 'in', $images_ids)->update(['pei_id'=>$pei_id]);
    }

}