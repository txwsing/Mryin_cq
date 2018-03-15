<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/15
 * Time: 9:32
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;


use think\Controller;

class Index extends Controller
{
    /**
     * @return mixed
     * @后台首页
     */
    public function Index()
    {
        return $this->fetch();
    }


}