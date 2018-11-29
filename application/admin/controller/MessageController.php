<?php
namespace app\admin\controller;

use app\home\model\Manager;
use think\Request;
use think\Controller;
use app\admin\model\Message;
use app\admin\model\User;

class MessageController extends controller
{
    //后台系统默认请求页面
    public function index()
    {
        $infos = Message::select();

        //column(key1,key2):把数据表字段key2和key1获得出来，并变为一个一维数组,元素下标就是key2,值就是key1
        $users = User::column('user_name','id');






        $this->assign('userinfo',$users);
        $this->assign('infos',$infos);
        return $this ->fetch();

    }
    public function tianjia(Request $request){
        if($request->post()){
       $infos  = $request->post();

           $m =  new Message();
           $rst = $m->save($infos);
            if($rst){
                return ['status' => 'success'];
            }else{
                return ['status' => 'failure'];
            }

        }else{
            $info = User::select();
            $this->assign('info', $info);

            return $this->fetch();
        }

    }

    public function welcome(){
    	return $this->fetch();
    }

    public function shanchu(Message $message){
        $rst = $message->delete();



        if($rst){
            return ['status'=>'success'];
        }else{
            return ['status'=>'failure'];
        }
    }

    public function xiugai(Request $request,Message $message){
        if($request->post()){
            $info = $request->post();
          $rst = $message->isUpdate($info);
            if($rst){
                return ['status'=>'success'];
            }else{
                return ['status'=>'failure'];
            }

        }else{
            $this->assign('info',$message);
            return $this->fetch();
        }


    }
 
}
