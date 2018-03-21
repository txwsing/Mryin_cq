<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/21
 * Time: 11:17
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;

use app\admin\model\Setting as SettingModel;
use think\Request;

class Setting extends Base
{
    public function setting()
    {
        $data = SettingModel::getSetting();
        return $this->fetch('',[
            'data'=>$data
        ]);
    }


    public function edit()
    {
        if(request()->isPost())
        {
            $id = intval(Request::instance()->param('id'));
            $result = SettingModel::editSettingByID($id);
            if($result)
            {
                $this->success('更新成功');
            }else{
                $this->error('更新失败');
            }

        }else{
            return false;
        }
    }
}