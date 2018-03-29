<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/15
 * Time: 14:29
 * Company :郑州云客汇网络科技有限公司
 */

    namespace app\admin\controller;
    use app\admin\model\Order as OrderModel;
    use think\Request;

    class Order extends Base
    {
        public function order()
        {
            $data = OrderModel::getAllOrders();
            return $this->fetch('',[
                'data'=>$data
            ]);
        }


        public function del()
        {
            $id = intval(Request::instance()->param('id'));
            $result = OrderModel::where('id','=',$id)->delete();
            if($result)
            {
                return true;
            }else{
                return false;
            }
        }
    }