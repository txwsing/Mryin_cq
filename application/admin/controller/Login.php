<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/19
 * Time: 12:33
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;


use think\Controller;
use app\admin\model\AdminUser as AdminUserModel;
use think\Session;

class Login extends Controller
{
    public function login()
    {
        return $this->fetch();
    }
    public function doLogin()
    {
        $data = input('post.');
        $user = AdminUserModel::getAdminUser();
        $name = $user[0]['name'];
        if($data['name'] == $name && md5($data['password']) == $user[0]['password'])
        {
            Session::set('id',$user[0]['id']);
            return [
                'code'=>100,
                'msg'=>"登陆成功"
            ];
        }
        else{
            return [
                'code'=>101,
                'msg'=>"登陆失败"
            ];
        }
    }
}