<?php

function type($type) {
    if($type == 1) {
        $str = "<span>招聘</span>";
    }else {
        $str = "<span>求职</span>";
    }
    return $str;
}


function orStatus($status)
{
    if($status == 1)
    {
        $str = "<span style='color: #A60000'>未支付</span>";
    }
    else{
        $str = "<span style='color: #00B83F'>已支付</span>";
    }
    return $str;
}



function level($level){

    if($level == 2)
    {
        $str = "<span style='color: #00B83F'>会员</span>";
    }elseif ($level == 3)
    {
        $str = "<span style='color: #00B83F'>vip会员</span>";
    }elseif ($level == 4)
    {
        $str = "<span style='color: #00B83F'>银牌会员</span>";
    }elseif ($level == 5)
    {
        $str = "<span style='color: #00B83F'>金牌会员</span>";
    } elseif ($level == 6) {
        $str = "<span style='color: #00B83F'>钻石会员</span>";
    } else {
        $str = "<span style='color: #00B83F'>非会员</span>";
    }
    return $str;
}




function cType($type)
{
    if($type == 1) {
        $str = "<span>设备轮播</span>";
    }elseif($type==2) {
        $str = "<span>配件轮播</span>";
    }else{
        $str = "<span>求职招聘轮播</span>";
    }
    return $str;
}
