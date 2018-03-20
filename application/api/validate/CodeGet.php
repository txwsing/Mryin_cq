<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/4
 * Time: 21:21
 */

namespace app\api\validate;


class CodeGet extends BaseValidate
{
    protected $rule = [
        'code' => 'require|isNotEmpty',
    ];

    protected $message = [
        'code' => '没有code无法获取信息！'
    ];
}