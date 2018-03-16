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

}