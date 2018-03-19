<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/17
 * Time: 9:55
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\model;


use think\Model;

class Level extends Model
{
    public static function getAllLevel()
    {
        $result =  self::select();
        $result = $result->toArray();
        return $result;
    }

    public function getLevelByID($id)
    {
        $data = self::find($id);
        $data = $data->toArray();
        return $data;
    }

    public function editLevelById($id)
    {
        $data = input('post.');
        $result = $this->where('id','=',$id)->update($data);
        return $result;

    }
}