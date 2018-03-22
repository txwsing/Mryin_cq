<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/21
 * Time: 16:25
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;


use think\Model;

class Order extends Model
{
    //获取所有订单
    public static function getAllOrders()
    {
        $keywords = trim(input('get.keyword'));
        if($keywords){
            $map['name|number']=array('like',"%$keywords%");
        }else{
            $map = [];
        }
        if(!empty($map))
        {
            $result = self::where($map)->select();
        }else{
            $result = self::select();
        }
        return $result;
    }
}