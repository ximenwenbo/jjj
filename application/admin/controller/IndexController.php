<?php
namespace app\admin\controller;


use think\Controller;
class IndexController extends controller
{
    //后台系统默认请求页面
    public function index()
    {
        return $this ->fetch();
    }

    public function welcome(){
    	return $this->fetch();
    }

 
}
