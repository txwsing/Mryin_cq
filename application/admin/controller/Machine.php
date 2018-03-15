<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/15
 * Time: 14:28
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;


use think\Controller;

class Machine extends Controller
{
    public function Machine()
    {
        return $this->fetch();
    }
}