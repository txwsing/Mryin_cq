<?php
/**
 * Created by 飞刀又见飞刀.
 * User: Mryin
 * Date: 2018/3/15
 * Time: 18:10
 * Company :郑州云客汇网络科技有限公司
 */

namespace app\admin\controller;
use app\admin\model\Report as ReportModel;
use think\Request;

class Report extends Base
{
    public function report()
    {
        $data = ReportModel::getAllReports();
        return $this->fetch('',[
            'data'=>$data
        ]);
    }

    public function del()
    {
        $id = intval(Request::instance()->param('id'));
        $report = new ReportModel();
        $result = $report->delete($id);
        if($result)
        {
            return [
                'code'=>100,
                'msg'=>'删除成功'
            ];
        }else{
            return [
                'code'=>101,
                'msg'=>'删除失败'
            ];
        }
    }
}