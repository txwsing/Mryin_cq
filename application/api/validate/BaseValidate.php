<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/15
 * Time: 8:36
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\api\validate;


use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        $request = Request::instance();
        $params = $request->param();
        if(!$this->check($params))
        {

        }
    }
}