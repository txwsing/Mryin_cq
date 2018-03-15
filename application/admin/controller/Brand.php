<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/15
 * Time: 10:14
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;


use think\Controller;

class Brand extends Controller
{

    /**
     * 品牌管理
     */
    public function Brand()
    {
        return $this->fetch();
    }

    /**
     * 品牌添加
     */

    public function brandAdd()
    {
        return $this->fetch();
    }

}