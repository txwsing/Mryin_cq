<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/3
 * Time: 15:46
 */

namespace app\api\model;


class View extends BaseModel
{

    public static function getMostRecent($province_id, $category_id, $brand_id, $page=1, $size=15)
    {
        $map = [];
        if ($province_id > 0) $map['province_id'] = $province_id;
        if ($category_id > 0) $map['category_id'] = $category_id;
        if ($brand_id > 0) $map['brand_id'] = $brand_id;
        $machines = self::with(['imgs', 'user'])->where($map)->order('create_time desc')->paginate($size, true, ['page' => $page]);
        return $machines;
    }

    public static function addMachine($data) {

        return  self::insertGetId($data);

    }


}