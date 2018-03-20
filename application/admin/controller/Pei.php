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
}