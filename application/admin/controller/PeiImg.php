<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/20
 * Time: 15:10
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;


use think\Request;
use app\admin\model\PeiImg as PeiImgModel;

class PeiImg extends Base
{
    public function peiImg()
    {
        $id = intval(Request::instance()->param('id'));
        $data =PeiImgModel::getPeiImgByID($id);
        return $this->fetch('',[
            'data'=>$data
        ]);
    }
}