<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/19
 * Time: 10:00
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;


use think\Model;

class AdminUser extends Model
{

    public static function getAdminUser()
    {
        $data = self::select();
        $data = $data->toArray();
        return $data;
    }

    public function editAdminUser($id)
    {
        $data = $this->find($id);
        $data = $data->toArray();
        return $data;
    }

    public function editAdminUserByID($id)
    {
        $data =array();
        $data['name'] = input('post.name');
        $data['password'] = md5(input('post.password'));
        $result = $this->where('id','=',$id)->update($data);
        return $result;
    }

}