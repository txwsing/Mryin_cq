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
    //获取用户名
    public function uName()
    {
        return $this->belongsTo('User','user_id','id');
    }
    //获取用户等级

    public function level()
    {
        return $this->belongsTo('Level','level_id','id');
    }
    //获取所有订单
    public static function getAllOrders()
    {
        $keywords = trim(input('get.keyword'));
        if($keywords){
            $map['order_no']=array('like',"%$keywords%");
        }else{
            $map = [];
        }
        if(!empty($map))
        {
            $result = self::with('uName','level')->where($map)->paginate(10);
        }else{
            $result = self::with('uName','level')->paginate(10);
        }
        return $result;
    }
}