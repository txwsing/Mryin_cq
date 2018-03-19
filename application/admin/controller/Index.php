<?php
/**
 * Created by 飞刀又见飞刀.
 * User: MrYin
 * Date: 2018/3/15
 * Time: 9:32
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;

class Index extends Base
{
    public function __construct ()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     * @后台首页
     */
    public function Index()
    {
        return $this->fetch();
    }
    public function welcome(){
        return "欢迎来来到铲车圈后台系统，祝你生活愉快";
    }

}