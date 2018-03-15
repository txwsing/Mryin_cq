<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/10/31
 * Time: 15:22
 */

namespace app\lib\exception;


class CarouselMissException extends BaseException
{
    public $code = 404;
    public $msg = "请求的图片不存在";
    public $errorCode = 40000;
}