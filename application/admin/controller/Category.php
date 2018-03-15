<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/15
 * Time: 14:29
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;


use app\admin\validate\CategoryValidate;
use think\Controller;
use think\Request;

class Category extends Controller
{
    private $obj;

    public function _initialize()
    {
        $this->obj = model("Category");
    }

    /**
     * 品牌管理
     */
    public function Category()
    {
        $data = $this->obj->select();
        return $this->fetch('', [
            'data' => $data
        ]);
    }

    /**
     * 品牌添加
     */

    public function categoryAdd()
    {
        return $this->fetch();
    }

    /**
     * 执行添加
     */
    public function doAdd()
    {
        $data = input('post.');
        $validate = new CategoryValidate();
        $result = $validate->check($data);
        if (!$result) {
            $this->error($validate->getError());
        }
        $res = $this->obj->insert($data);

        if ($res) {
            $this->success('新增成功');
        } else {
            $this->error('新增失败');
        }
    }


    public function categoryEdit()
    {
        $id = intval(Request::instance()->param('id'));
        if (empty($id)) {
            $this->error('id部存在');
        }
        $data = $this->obj->where('id', '=', $id)->find();

        return $this->fetch('', [
            'data' => $data
        ]);

    }


    /**
     * 执行修改
     */
    public function doCategoryEdit()
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