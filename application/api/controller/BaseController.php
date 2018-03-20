<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/6
 * Time: 17:40
 */

namespace app\api\controller;

use app\api\service\Token as TokenService;

use think\Controller;
use think\Request;
use think\Validate;

class BaseController extends Controller
{
    //验证scope权限的方法
    protected function checkPrimaryScope()
    {
        TokenService::needPrimaryScope();
    }

    protected function checkElusiveScope()
    {
        TokenService::needExclusiveScope();
    }

    /**
     * 单文件上传
     */
    public function uploadOne($path, $name = 'image'){
        $pic_info = [];
        // 获取表单上传文件
        $file = request()->file($name);

        if ($file) {
            // 移动到框架应用根目录/public/uploads/ 目录下
            $validate = [
                'size'=>3145728,
                'ext'=>'jpg,jpeg,png,gif'
            ];
            $info = $file->validate($validate)->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . $path);
            if($info){
                $pic_info['code'] = 1;
                $pic_info['path'] = DS . 'uploads' . DS . $path . DS . $info->getSaveName();
                return $pic_info;
            }else{
                $pic_info['code'] = 0;
                $pic_info['msg'] = $file->getError();
                return $pic_info;
            }
        } else {
            $pic_info['code'] = 0;
            $pic_info['msg'] = '文件不存在';
            return $pic_info;
        }
    }
}