<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/3
 * Time: 15:46
 */

namespace app\api\model;


class Pin extends BaseModel
{
    public $hidden = ['create_time', 'update_time',
    ];

    public function user()
    {
        return $this->belongsTo('User', 'uid', 'id');
    }

    public static function getMostRecent( $page = 1, $size = 15)
    {

        $pins = self::with([
            'user' => function ($query) {
                $query->withField("id,avatarUrl,nickName");
            }
        ])
            ->where('status', 1)
            ->order('create_time desc')
            ->paginate($size, true, ['page' => $page]);
        return $pins;
    }

    public static function addPin($data)
    {
        return self::insertGetId($data);
    }

    public static function getPinDetail($id)
    {
        //$query查询构造器
        $Pin = self::with([
            'imgs' => function ($query) {
                $query->with(['imgUrl'])
                    ->order('order', 'asc');
            }
        ])
            ->with(['properties'])
            ->find($id);
        return $Pin;
    }


}