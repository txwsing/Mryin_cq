<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/16
 * Time: 9:01
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;

use think\Model;

class User extends Model
{
    protected $hidden = ['openid','extend','delete_time','create_time','update_time'];
}