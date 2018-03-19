<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/15
 * Time: 14:36
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;


use think\Model;

class Brand extends Model
{
    protected $hidden = ['note','create_time'];
    public function addBrand($data)
    {
        $result = $this->save($data);
        return $result;
    }

    public function getNormalBrand()
    {
       return $this->select();
    }


}