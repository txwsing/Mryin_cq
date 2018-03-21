<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/4
 * Time: 10:42
 */

namespace app\api\controller;

use app\api\validate\Count;
use app\api\validate\PeiVa;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\PeiException;
use think\Controller;
use think\Request;
use app\api\model\Pei as PeiModel;
use app\api\model\PeiImg as PeiImgModel;
use app\api\model\View as PeiViewModel;
use app\api\validate\PagingParameter;
use app\api\service\Token as TokenService;

class Pei extends BaseController
{
    public function getPeiRecent($page=1, $size=15)
    {
        (new PagingParameter())->goCheck();
        $pagingPeis = PeiModel::getMostRecent($page, $size);

        if($pagingPeis->isEmpty()){
            return [
                'code' => 0,
                'data' => [],
                'current_page' => $pagingPeis->getCurrentPage()
            ];
        }

        return [
            'code' => 100,
            'data' => $pagingPeis->toArray(),
            'current_page' => $pagingPeis->getCurrentPage()
        ];
    }


    //上传设备图片
    public function uploadImage() {
        $up_result = $this->uploadOne('pei', 'image');
        if ($up_result['code'] == 1) {

            return PeiImgModel::addPeiImage($up_result['path']);
        } else {
            return '';
        }

    }

    public function addPei() {
        $data = Request::instance()->param();
        $img_ids = $data['img_ids'];
        unset($data['img_ids']);
        $data['create_time'] = date('Y-m-d H:i:s');
        $data['uid'] = TokenService::getCurrentUid();
        $data['number'] = 'P'. time();
        $res =  PeiModel::addPei($data);
        if ($res) {
            PeiImgModel::updateImageByPeiId($img_ids, $res);
            return [
                'code' => '100',
                'msg' => '添加成功'
            ];
        }
    }

    public function countPeiViewNum()
    {
        return PeiModel::countPeiViewNum();
    }


    public function getOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $Pei = PeiModel::getPeiDetail($id);
        if(!$Pei){
            throw new PeiException();
        }
        return $Pei;
    }

}