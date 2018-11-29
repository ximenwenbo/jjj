<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

/*home前台*/
Route::rule('/','home/index/index','GET');  //首页路由注册
//前台-路由分组设置

Route::rule('admin/user/shanchu','admin/user/shanchu','POST');
Route::rule('admin/index/index','admin/index/index','GET');
//后台运动员展示列表
Route::any('admin/user/index','admin/user/index',['methed'=>'get|post']);
//后台运动员信息修改
Route::any('admin/user/xiugai','admin/user/xiugai',['methed'=>'get|post']);
//后台运动员添加列表
Route::any('admin/user/tianjia','admin/user/tianjia',['methed'=>'get|post']);
//后台运动员图片上传
Route::post('admin/user/image_up','admin/user/image_up');
Route::rule('admin/index/welcome','admin/index/welcome','GET');

//后台比赛信息展示列表
Route::any('admin/message/index','admin/message/index',['methed'=>'get|post']);
//后台添加比赛
Route::any('admin/message/tianjia','admin/message/tianjia',['methed'=>'get|post']);
//后台比赛删除
Route::rule('admin/message/shanchu','admin/message/shanchu','POST');
//后台比赛信息修改
Route::any('admin/message/xiugai','admin/message/xiugai',['methed'=>'get|post']);

//后台比赛数据展示列表
Route::any('admin/data/index','admin/data/index',['methed'=>'get|post']);
//后台比赛数据添加
Route::any('admin/data/tianjia','admin/data/tianjia',['methed'=>'get|post']);
//后台比赛数据添加
Route::any('admin/data/xiugai','admin/data/xiugai',['methed'=>'get|post']);

//后台比赛数据删除
Route::rule('admin/data/shanchu','admin/data/shanchu','POST');

//后台比赛上传与下载
Route::rule('admin/data/down','admin/data/down','GET');
//后台比赛数据筛选
Route::rule('admin/data/select','admin/data/select','POST');

//后台批量上传比赛数据
Route::any('admin/data/insertexcel','admin/data/insertexcel',['methed'=>'get|post']);
//后台批量上传比赛数据
Route::any('admin/data/downExcel','admin/data/downExcel',['methed'=>'get|post']);
//后台比赛成绩列表
Route::rule('admin/data/score','admin/data/score','GET');

//后台比赛成绩列表
Route::rule('admin/data/score','admin/data/score','GET');
//后台比赛成绩上下线
Route::rule('admin/data/shangxian','admin/data/shangxian','post');


//前台首页列表
Route::rule('home/index/index','home/index/index','GET');
//前台首页获取借口数据
Route::any('home/index/api','home/index/api',['methed'=>'post|get']);

//前台首页筛选比赛
Route::rule('home/index/search','home/index/search','GET');






























