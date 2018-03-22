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

        $keywords = trim(input('get.keyword'));
        if($keywords){
            $map['name|number']=array('like',"%$keywords%");
        }else{
            $map = [];
        }

        if(!empty($map))
        {
            $result = self::with(['NickName', 'BrandName', 'CategoryName'])->where($map)->paginate(10);
        }
        else{
            $result = self::with(['NickName', 'BrandName', 'CategoryName'])->paginate(10);
        }
        return $result;
    }

}