<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/15
 * Time: 14:32
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;
use app\admin\model\Carousel as CarouselModel;
use think\Request;


class Carousel extends Base
{
    public function carousel ()
    {
        $data = CarouselModel::getAllCarousel();
        return $this->fetch('', [
            'data' => $data
        ]);
    }


    public function add ()
    {
        return $this->fetch();
    }

    public  function doAdd()
    {
        $data = [];
        $data = input('post.');
        $file = request()->file('url');
        if (empty($file)) {
            $this->error('请选择上传文件');
        }
        $info = $file->move('uploads/lunbo');
        $data['url']= $info->getPathname();
        $data['url'] = '/'. preg_replace('/\\\\/', '/', $data['url']);
        if ($data) {
            $carousel = new CarouselModel();
            $result = $carousel->insert($data);
            if($result)
            {
                $this->success('新增成功');
            }
            else{
                $this->error('新增失败');
            }
        }

    }


    public function del()
    {
        $id = intval(Request::instance()->param('id'));
        $carousel  = new CarouselModel();
        $res = $carousel->where('id','=',$id)->delete();
        if($res)
        {
            return true;
        }else{
            return false;
        }
    }

}