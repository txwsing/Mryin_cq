<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/15
 * Time: 16:44
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\validate;


class CategoryValidate extends BaseValidate
{
    protected $rule = [
        'title' =>'require',
    ];

    protected $message = [
        'title' => '分类名必须填写',
    ];
}