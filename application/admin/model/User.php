<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/16
 * Time: 9:01
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;

use think\Model;

class User extends Model
{
    protected $hidden = ['openid','extend','delete_time','update_time'];

    public function level()
    {
        return $this->belongsTo('Level','level_id','id');
    }

    public  function getAllLevel()
    {
        return  $this->hasMany('Level');

    }
    public static function getAllUser()
    {
       $result =  self::with('level')->paginate(10);
//        $result = $result->toArray();
       return $result;
    }

    public static function getUserById($id)
    {
        $data = self::find($id);
        $data = $data->toArray();
        return $data;
    }

    public function editUserById($id)
    {
        $data = input('post.');
        $result = $this->where('id','=',$id)->update($data);
        return $result;

    }



}