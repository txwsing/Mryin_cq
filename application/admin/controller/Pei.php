<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/20
 * Time: 11:15
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;
use app\admin\model\Pei as PeiModel;
use think\Request;

class Pei extends Base
{
    //配件列表
    public function pei()
    {
        $data = PeiModel::getAllPei();
        return $this->fetch('',[
            'data'=>$data
        ]);
    }

    //配件删除
    public function del()
    {
        $id = intval(Request::instance()->param('id'));
        $result = PeiModel::where('id','=',$id)->delete();
        if($result)
        {
            return true;
        }else{
            return false;
        }
    }

    //配件停用
    public function PeiStop()
    {
        $id = intval(Request::instance()->param('id'));
        if(!$id)
        {
            return $msg = [
                'msg' => '非法请求'
            ];
        }
        $res = PeiModel::where('id','=',$id)->update(['status'=>0]);
        if($res)
        {
            return ['msg'=>'停用成功','code'=>100];
        }else{
            return ['msg'=>'停失败','code'=>101];
        }
    }


    public function PeiStart()
    {
        $id = intval(Request::instance()->param('id'));
        if(!$id)
        {
            return $msg = [
                'msg' => '非法请求'
            ];
        }
        $res = PeiModel::where('id','=',$id)->update(['status'=>1]);
        if($res)
        {
            return ['msg'=>'启用成功','code'=>100];
        }else{
            return ['msg'=>'启用失败','code'=>101];
        }
    }

}