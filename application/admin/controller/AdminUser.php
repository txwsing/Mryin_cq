<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/19
 * Time: 10:00
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;
use app\admin\model\AdminUser as AdminUserModel;
use think\Request;

class AdminUser extends Base
{
    public function adminUser()
    {
        $data = AdminUserModel::getAdminUser();
        return $this->fetch('',[
            'data'=>$data
        ]);
    }

    public function edit()
    {
        $id = intval(Request::instance()->param('id'));
        $AdminUser = new AdminUserModel();
        $data = $AdminUser->editAdminUser($id);
        return $this->fetch('',[
            'data'=>$data
        ]);
    }

    public function doEdit()
    {
        $id = intval(Request::instance()->param('id'));
       $AdminUser = new AdminUserModel();
       $result = $AdminUser->editAdminUserByID($id);
       if($result)
       {
           $this->success('更新成功');
       }else{
           $this->error('更新失败');
       }

    }
}