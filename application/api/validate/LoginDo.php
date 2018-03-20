<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/5
 * Time: 17:04
 */

namespace app\api\validate;


class LoginDo extends BaseValidate
{
    protected $rule = [
        'avatarUrl' => 'require|isNotEmpty',
        'nickName' => 'require|isMobile',
    ];
}