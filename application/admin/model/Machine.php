<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/16
 * Time: 8:56
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;


use think\Model;

class Machine extends Model
{
    public function NickName()
    {
        return $this->belongsTo('User','uid','id');
    }


    public function BrandName()
    {
        return $this->belongsTo('Brand','brand_id','id');
    }

    public function CategoryName()
    {
        return $this->belongsTo('Category','category_id','id');
    }

    public static function getAllMachine()
    {

        $result = self::with(['NickName', 'BrandName', 'CategoryName'])->paginate(10);
        /**
         * 如果是数据集查询的话有两种情况，由于默认的数据集返回结果的类型是一个数组，因此无法调用toArray方法，必须先转成数据集对象然后再使用toArray方法，
         * 系统提供了一个collection助手函数实现数据集对象的转换
         */
//        $data = collection($result)->toArray();
//        p($result);
        return $result;
    }
}