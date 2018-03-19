<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/15
 * Time: 14:28
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;
use app\admin\model\Machine as MachineModel;
use think\Request;

class Machine extends Base
{
    private $obj;
    public function _initialize()
    {
        $this->obj = model("Machine");
    }

    public function Machine()
    {
        $machine = new MachineModel();
        $data = $machine->getAllMachine();
        return $this->fetch('',[
            'data' => $data
        ]);
    }

    public function machineStop()
    {
        $id = intval(Request::instance()->param('id'));
        if(empty($id))
        {
            return $msg = [
                'msg' => '非法请求'
            ];
        }
        $res = $this->obj->where('id','=',$id)->update(['status'=>0]);
            if($res)
            {
                return ['msg'=>'停用成功','code'=>100];
            }else{
                return ['msg'=>'停失败','code'=>101];
            }
        }

        public function machineStart()
        {
            $id = intval(Request::instance()->param('id'));
            if(empty($id))
            {
                return $msg = [
                    'msg' => '非法请求'
                ];
            }
            $res = $this->obj->where('id','=',$id)->update(['status'=>1]);
            if($res)
            {
                return ['msg'=>'启用成功','code'=>100];
            }else{
                return ['msg'=>'启用失败','code'=>101];
            }
        }


        public function del()
        {
            $id = intval(Request::instance()->param('id'));
            $res = $this->obj->where('id','=',$id)->delete();
            if($res)
            {
                return true;
            }else{
                return false;
            }
        }
}