<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 2017/11/4
 * Time: 10:42
 */

namespace app\api\controller;


use app\api\validate\Count;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\MachineException;
use think\Controller;
use app\api\model\Machine as MachineModel;
use app\api\validate\PagingParameter;

class Machine extends Controller
{
    public function getMachineRecent($province_id, $category_id, $brand_id, $page=1, $size=15)
    {
        (new PagingParameter())->goCheck();
        $pagingMachines = MachineModel::getMostRecent($province_id, $category_id, $brand_id, $page, $size);
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


    public function getAllInCategory($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $Machines = MachineModel::getMachinesByCategoryID($id);
        if($Machines->isEmpty()){
            throw new MachineException();
        }
        $Machines = $Machines->hidden(['summary']);
        return $Machines;
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


    public function deleteOne($id)
    {

    }

}