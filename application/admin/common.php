<?php

function type($type) {
    if($type == 1) {
        $str = "<span>招聘</span>";
    }else {
        $str = "<span>求职</span>";
    }
    return $str;
}


function status($status) {
    if($status == 1) {
        $str = "<span style='color: #00B83F'>已启用</span>";
    }else {
        $str = "<span style='color: #A60000'>已停用</span>";
    }
    return $str;
}
