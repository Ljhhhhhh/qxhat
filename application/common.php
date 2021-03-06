<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function status($status)
{
    if ($status == 1) {
        $str = "<span class='label label-success radius'>已发布</span>";
    } elseif ($status == 0) {
        $str = "<span class='label label-danger radius'>已隐藏</span>";
    }
    return $str;
}
function styleStatus($status){
    if ($status==1){
        $str = "<span class='label label-success radius'>是</span>";
    } elseif ($status == 0) {
        $str = "<span class='label label-danger radius'>否</span>";
    }
    return $str;
}
function productStatus($status){
    if ($status==0){
        $str = "<span class='label label-danger radius'>下架</span>";
    } elseif ($status == 1) {
        $str = "<span class='label label-success radius'>正常</span>";
    }elseif ($status==2){
        $str = "<span class='label label-secondary radius'>推荐</span>";
    }
    return $str;
}