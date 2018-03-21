<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/3
 * Time: 15:46
 */

namespace app\api\model;


class Pei extends BaseModel
{
    public $hidden = ['delete_time', 'create_time', 'update_time',
    ];

    public function imgs()
    {
        return $this->hasMany('PeiImg', 'pei_id', 'id');
    }

    public function view()
    {
        return $this->hasMany('PeiView', 'pei_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('User', 'uid', 'id');
    }

    public static function getMostRecent( $page = 1, $size = 15)
    {

        $peis = self::with([
            'imgs'  => function ($query) {
                $query->Field("pei_id,url");
            },
            'user' => function ($query) {
                $query->withField("id,avatarUrl,nickName");
            }
        ])
            ->withCount('view')
            ->where('status', 1)
            ->order('create_time desc')
            ->paginate($size, true, ['page' => $page]);
        return $peis;
    }

    public static function addPei($data)
    {

        return self::insertGetId($data);

    }


    public static function getPeiDetail($id)
    {
        //$query查询构造器
        $Pei = self::with([
            'imgs' => function ($query) {
                $query->with(['imgUrl'])
                    ->order('order', 'asc');
            }
        ])
            ->with(['properties'])
            ->find($id);
        return $Pei;
    }


}