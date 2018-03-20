<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 2018/3/16
 * Time: 14:52
 */

namespace app\api\model;


class MachineImg extends BaseModel
{
    protected $hidden = ['id','from','delete_time','update_time'];

    public function getUrlAttr($value,$data)
    {
        return $this->prefixImgUrl($value,$data);
    }

    public static function addMachineImage($path)
    {
        return  self::insertGetId(['url'  =>  $path]);
    }

    public static function updateImageByMachineId($images_ids, $machine_id)
    {

        self::where('id', 'in', $images_ids)->update(['machine_id'=>$machine_id]);
    }

}