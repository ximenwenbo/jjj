<?php
namespace app\admin\controller;

use app\admin\model\User;

use think\Controller;
use think\Request;
class UserController extends controller
{
    //后台系统默认请求页面
    public function index()
    {
$infos = User::select();
       $this->assign('infos',$infos);



       return $this ->fetch();
    }

    public function tianjia(Request $request){

       if($request->post()){
           $infos = $request->post();

           $user = new User();
           $result =  $user->save($infos);
           if($result){
               return ['status'=>'success'];

           }else{
               return ['status'=>'failure'];
           }
       }
        else{
            $info = User::select();
            $this->assign('info', $info);
            return $this->fetch();
        }

    }

    public function image_up(Request $request)
    {
        //接收客户端传递过来的附件，并存储到服务器上
        //$request调用file()方法就可以获得被上传附件
        //以"think\File"类对象形式返回
        $file = $request -> file('myimage');
        //dump($file);  //think\File类对象

        $path = "./uploads/goodstmp/";  //图片存储目录

        //图片上传,move()方法执行成功会返回think\File类对象
        //       上传失败会返回false信息
        //think\File 内部通过算法会给每个上传图片定义一个唯一名字
        $result = $file -> move($path);
        if($result){

            //获得上传好的图片信息
            //获得上传好图片路径名信息
            $filename = $result->getSaveName(); //20160820\42a79759f284b767dfcb2a0197904287.jpg

            $pathfilename = $path.$filename; //拼装图片完整路径名
            $pathfilename = str_replace('\\','/',$pathfilename);//"\"替换为"/"

            return ['status'=>'success','pathfilename'=>$pathfilename];
        }else{
            //上传图片失败
            $errorinfo = $file -> getError();
            return ['status'=>'failure','errorinfo'=>$errorinfo];
        }
    }
public function shanchu(Request $request,User $user){
//var_dump($users);die;
   $rst = $user->delete();



    if($rst){
        return ['status'=>'success'];
    }else{
        return ['status'=>'failure'];
    }
}

public function xiugai(Request $request,User $user){
    if($request->post()){
        $shuju = $request->post();
if(strpos($shuju['image'],'goodstmp')&&file_exists($user->image)){
    unlink($user->image);

$dir = "./uploads/goods/".date('Ymd');
        if(!file_exists($dir)){
            mkdir($dir,0777,true);
        }
        $truepath = str_replace('goodstmp', 'goods',$shuju['image']);
        rename($shuju['image'],$truepath);
        $shuju['image'] = $truepath;
}else{
    unset($shuju['image']);
}



       $rst = $user->update($shuju);
        if($rst){
            return ['status'=>'success'];
        }else{
            return ['status'=>'failure'];
        }


    }else{
        $this->assign('info',$user);
       return  $this->fetch();
    }


}

}
