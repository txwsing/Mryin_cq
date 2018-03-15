<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/15
 * Time: 16:24
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\validate;


class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'isPositiveInteger',
    ];
}