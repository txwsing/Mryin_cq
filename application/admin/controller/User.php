<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/15
 * Time: 14:29
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;


use app\admin\model\Level as LevelModel;
use app\admin\model\User as UserModel;
use think\Request;

class User extends Base
{
    public function User()
    {

        $data = UserModel::getAllUser();
        return $this->fetch('',[
            'data'=>$data
        ]);
    }

    public function edit()
    {
        $id = intval(Request::instance()->param('id'));
        $levels = LevelModel::getAllLevel();
        $data = UserModel::getUserById($id);
        return $this->fetch('',[
            'level'=>$levels,
            'data'=>$data
        ]);

    }

    public function doEdit()
    {
        $id = intval(Request::instance()->param('id'));
        $usermodel = new UserModel();
        $result = $usermodel->editUserById($id);

        if($result)
        {
            return $this->success('更新成功');
        }else{
            return $this->error('更新失败');
        }
    }

    public function del()
    {
        $id = intval(Request::instance()->param('id'));
        if (!empty($id)) {
            $usermodel = new UserModel();
            $res = $usermodel->where('id', '=', $id)->delete();
            if ($res) {
                return [
                    'code' => 100,
                    'msg' => '删除成功'
                ];
            } else {
                return [
                    'code' => 101,
                    'msg' => '删除失败'
                ];
            }
        } else {
            return [
                'code' => 102,
                'msg' => '非法请求'
            ];
        }
    }

}