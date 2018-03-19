<?php
    /**
     * Created by 飞刀又见飞刀.
     * User: Mryin
     * Date: 2018/3/19
     * Time: 11:44
     * Company :郑州云客汇网络科技有限公司
     */

namespace app\admin\controller;
use think\Controller;
use think\Session;

class Base extends Controller
{
    public function __construct ()
    {
        parent::__construct();
        $uid = Session::get('id');
        if(empty($uid))
        {
            $this->redirect('Login/login');
        }
    }
}