<?php
/**
 * Created by 飞刀又见飞刀.
 * User: MrYin
 * Date: 2018/3/15
 * Time: 10:14
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;
use app\admin\validate\BrandValidate;
use think\Request;

class Brand extends Base
{
    private $obj;
    public function _initialize()
    {
        $this->obj = model("Brand");
    }
    /**
     * 品牌管理
     */
    public function Brand ()
    {
        $data = $this->obj->getNormalBrand();
        return $this->fetch('', [
            'data' => $data
        ]);
    }

    /**
     * 品牌添加
     */

    public function brandAdd()
    {
        return $this->fetch();
    }

    /**
     * 执行添加
     */
    public function doAdd()
    {
        $data = input('post.');
        $validate = new BrandValidate();
        $result = $validate->check($data);
        if (!$result) {
            $this->error($validate->getError());
        }
        $res = $this->obj->addBrand($data);

        if ($res) {
            $this->success('新增成功');
        } else {
            $this->error('新增失败');
        }
    }

    /**
     * @param $id
     * @return mixed
     * @品牌修改
     */
    public function brandEdit()
    {
        $id = intval(Request::instance()->param('id'));
        if (empty($id)) {
            $this->error('id不存在');
        }
        $data = $this->obj->where('id', '=', $id)->find();

        return $this->fetch('', [
            'data' => $data
        ]);

    }

    /**
     * 执行修改
     */
    public function doBrandEdit()
    {
        $id = intval(Request::instance()->param('id'));
        $data = input('post.');
        $res = $this->obj->where('id', '=', $id)->update($data);
        if ($res) {
            $this->success('更新成功');
        } else {
            $this->error('更新失败');
        }

    }

    /**
     * @执行删除
     */
    public function del()
    {
        $id = intval(Request::instance()->param('id'));
        if (!empty($id)) {
            $res = $this->obj->where('id', '=', $id)->delete();
            if ($res) {
                return [
                    'code' => 100,
                    'msg' => '删除成功'
                ];
            } else {
                return [
                    'code' => 101,
                    'msg' => '删除失败'
                ];
            }
        } else {
            return [
                'code' => 102,
                'msg' => '非法请求'
            ];
        }
    }



}