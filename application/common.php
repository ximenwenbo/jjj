<?php
use app\home\model\User;







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





// function get_catinfo_one(){
//     return \app\home\model\Category::where('cat_level','0')->select();
// }
// //获得2级别分类信息
// function get_catinfo_two(){
//     return \app\home\model\Category::where('cat_level','1')->select();
// }
// //获得3级别分类信息
// function get_catinfo_three(){
//     return \app\home\model\Category::where('cat_level','2')->select();
// }




/***
 * 发送邮件
 * @param $to
 * @param $title
 * @param $cpmt
 */
function id_name($data,$userinfo=""){



//利用地址传递把运动员的编号换成姓名
foreach ($data as $k => &$v ){
    $v['user_a'] = $userinfo[$v['user_a']];
    $v['user_b'] = $userinfo[$v['user_b']];
}
return $data;
}





