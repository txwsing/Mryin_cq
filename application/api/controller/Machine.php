<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/4
 * Time: 10:42
 */

namespace app\api\controller;


use app\api\validate\Count;
use app\api\validate\MachineVa;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\MachineException;
use think\Controller;
use think\Request;
use app\api\model\Machine as MachineModel;
use app\api\model\MachineImg as MachineImgModel;
use app\api\validate\PagingParameter;
use app\api\service\Token as TokenService;

class Machine extends BaseController
{
    public function getMachineRecent($province_id = '', $category_id = '', $brand_id = '', $page=1, $size=15)
    {
        (new PagingParameter())->goCheck();
        $uid = TokenService::getCurrentUid();
        $pagingMachines = MachineModel::getMostRecent($province_id, $category_id, $brand_id, $page, $size, $uid);

        if($pagingMachines->isEmpty()){
            return [
                'data' => [],
                'current_page' => $pagingMachines->getCurrentPage()
            ];
        }

        return [
            'data' => $pagingMachines->toArray(),
            'current_page' => $pagingMachines->getCurrentPage()
        ];
    }


    //上传设备图片
    public function uploadImage() {
        $up_result = $this->uploadOne('machine', 'image');
        if ($up_result['code'] == 1) {

            return MachineImgModel::addMachineImage($up_result['path']);
        } else {
            return '';
        }

    }

    public function addMachine() {
        $data = Request::instance()->param();
        $img_ids = $data['img_ids'];
        unset($data['img_ids']);
        $data['create_time'] = date('Y-m-d H:i:s');
        $data['uid'] = TokenService::getCurrentUid();
        $res =  MachineModel::addMachine($data);
        if ($res) {
            MachineImgModel::updateImageByMachineId($img_ids, $res);
            return [
                'code' => '100',
                'msg' => '添加成功'
            ];
        }
    }

    public function countMachineViewNum()
    {
        return MachineModel::countMachineViewNum();
    }


    public function getOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $Machine = MachineModel::getMachineDetail($id);
        if(!$Machine){
            throw new MachineException();
        }
        return $Machine;
    }


}