<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/3
 * Time: 15:46
 */

namespace app\api\model;


class Machine extends BaseModel
{
    public $hidden = ['delete_time','category_id',
        'create_time','update_time',
    ];



    public function imgs()
    {
        return $this->hasMany('MachineImg','machine_id','id');
    }


    public static function getMostRecent($province_id, $category_id, $brand_id, $page=1, $size=15)
    {
        $map = [];
        if ($province_id > 0) $map['province_id'] = $province_id;
        if ($category_id > 0) $map['category_id'] = $category_id;
        if ($brand_id > 0) $map['brand_id'] = $brand_id;
        $machines = self::with('imgs')->where($map)->order('create_time desc')->paginate($size, true, ['page' => $page]);
        return $machines;
    }

    public static function getMachinesByCategoryID($categoryID)
    {
        $Machines = self::where('category_id','=',$categoryID)->select();
        return $Machines;
    }

    public static function getMachineDetail($id)
    {
        //$query查询构造器
        $Machine = self::with([
            'imgs' => function($query){
                $query->with(['imgUrl'])
                ->order('order','asc');
            }
        ])
            ->with(['properties'])
            ->find($id);
        return $Machine;
    }
}