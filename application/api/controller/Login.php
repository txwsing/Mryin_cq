<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/4
 * Time: 21:01
 */

namespace app\api\controller;

use app\api\model\User as UserModel;
use app\api\service\Token as TokenService;
use app\api\service\UserToken;
use app\api\validate\CodeGet;
use app\api\validate\LoginDo;
use app\lib\exception\ParameterException;
use app\lib\exception\UserException;
use think\Controller;
use app\api\service\UserToken as UserTokenService;


class Login extends Controller
{

    //获取Login
    public function get($code = '')
    {
        (new CodeGet())->goCheck();
        $ut = new UserToken($code);
        $login = $ut->get();
        return [
            'login' => $login
        ];
    }

    //检测login是否有效
    public function verifylogin($login = '')
    {
        if (!$login) {
            throw new ParameterException([
                'login不允许为空'
            ]);
        }

        $valid = loginService::verifylogin($login);
        return [
            'isValid'=> $valid
        ];
    }

    public function doLogin() {

        $validate = new LoginDo();
        $uid = TokenService::getCurrentUid();
        $user = UserModel::get($uid);

//        return $uid;

        $dataArray = $validate->getDataByRule(input('post.'));
        $dataArray['id'] = $uid;

        UserModel::update($dataArray);
//        echo UserModel::getLastsql();

    }
}