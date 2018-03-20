<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/5
 * Time: 17:04
 */

namespace app\api\validate;


class MachineVa extends BaseValidate
{
    protected $rule = [
        'contacts' => 'require|isNotEmpty',
        'tel'      => 'require',
        'address'  => 'require|isNotEmpty',
        'model'    => 'require|isNotEmpty',
        'desc'     => 'require|isNotEmpty',
        'price'    => 'require|isNotEmpty',
    ];

    protected $message = [
        'contacts.require'    => '请填写联系人',
        'contacts.isNotEmpty' => '请填写联系人',
        'tel.require'         => '请填写手机号',
        'address.require'     => '请填写设备地址',
        'address.isNotEmpty'  => '请填写设备地址',
        'model.require'       => '请填写设备型号',
        'model.isNotEmpty'    => '请填写设备型号',
        'desc.require'        => '请填写设备介绍',
        'desc.isNotEmpty'     => '请填写设备介绍',
        'price.require'       => '请填写转让价格',
        'price.isNotEmpty'    => '请填写转让价格',

    ];

    protected $scene = [
        'edit'  =>  [],
    ];


}