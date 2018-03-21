<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/20
 * Time: 11:16
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;

use think\Model;

class Pei extends Model
{
    public function uName()
    {
        return $this->belongsTo('User','uid','id');
    }

    public static function getAllPei()
    {

        $keywords = trim(input('get.keyword'));
        if($keywords){
            $map['name|number']=array('like',"%$keywords%");
        }else{
            $map = [];
        }
        if(!empty($map))
        {
            $result = self::with('uName')->where($map)->paginate(10);
        }
        else{
            $result = self::with('uName')->paginate(10);
        }
        return $result;
    }
}