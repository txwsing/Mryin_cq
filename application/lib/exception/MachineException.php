<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/6
 * Time: 20:52
 */

namespace app\lib\exception;


class MachineException extends BaseException
{
    public $rule = 404;
    public $msg = '指定的设备不存在';
    public $code = 80000;
}