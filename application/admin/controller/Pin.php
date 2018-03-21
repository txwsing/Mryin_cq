<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/20
 * Time: 15:54
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;
use app\admin\model\Pin as PinModel;
use think\Request;

class Pin extends Base
{
    public function Pins()
    {
        $data =PinModel::getAllPin();
        return $this->fetch('',[
            'data'=>$data
        ]);
    }

    public function del()
    {
        $id = intval(Request::instance()->param('id'));
        $result = PinModel::where('id','=',$id)->delete();
        if($result)
        {
            return true;
        }else{
            return false;
        }
    }


    public function PinStop()
    {
        $id = intval(Request::instance()->param('id'));
        if(!$id)
        {
            return $msg = [
                'msg' => '非法请求'
            ];
        }
        $res = PinModel::where('id','=',$id)->update(['status'=>0]);
        if($res)
        {
            return ['msg'=>'停用成功','code'=>100];
        }else{
            return ['msg'=>'停失败','code'=>101];
        }
    }


    public function PinStart()
    {
        $id = intval(Request::instance()->param('id'));
        if(!$id)
        {
            return $msg = [
                'msg' => '非法请求'
            ];
        }
        $res = PinModel::where('id','=',$id)->update(['status'=>1]);
        if($res)
        {
            return ['msg'=>'启用成功','code'=>100];
        }else{
            return ['msg'=>'启用失败','code'=>101];
        }
    }
}