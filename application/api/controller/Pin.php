<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/4
 * Time: 10:42
 */

namespace app\api\controller;


use app\api\validate\Count;
use app\api\validate\PinVa;
use app\api\validate\IDMustBePositiveInt;
use think\Controller;
use think\Request;
use app\api\model\Pin as PinModel;
use app\api\validate\PagingParameter;
use app\api\service\Token as TokenService;

class Pin extends BaseController
{
    public function getPinRecent($page=1, $size=15)
    {
        (new PagingParameter())->goCheck();
        $pagingPins = PinModel::getMostRecent($page, $size);

        if($pagingPins->isEmpty()){
            return [
                'code' => 0,
                'data' => [],
                'current_page' => $pagingPins->getCurrentPage()
            ];
        }

        return [
            'code' => 100,
            'data' => $pagingPins->toArray(),
            'current_page' => $pagingPins->getCurrentPage()
        ];
    }

    public function addPin() {
        $data = Request::instance()->param();

        $data['create_time'] = date('Y-m-d H:i:s');
        $data['uid'] = TokenService::getCurrentUid();
//        return $data;
        $res =  PinModel::addPin($data);
        if ($res) {
            return [
                'code' => '100',
                'msg' => '添加成功'
            ];
        }
    }

    public function countPinViewNum()
    {
        return PinModel::countPinViewNum();
    }


    public function getOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $Pin = PinModel::getPinDetail($id);
        if(!$Pin){
            throw new PinException();
        }
        return $Pin;
    }


}