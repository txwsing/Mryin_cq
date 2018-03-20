<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/20
 * Time: 11:47
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;

use app\admin\model\MachineImg as MachineImgModel;
use think\Request;

class MachineImg extends Base
{
    public function machineImg()
    {
        $id = intval(Request::instance()->param('id'));
        $data = MachineImgModel::getMachineImg($id);
        return $this->fetch('',[
            'data'=>$data
        ]);
    }
}