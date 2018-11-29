<?php
namespace app\home\controller;


use think\Controller;
use app\home\model\Message;
use app\home\model\User;
use app\home\model\countScore;
use think\Request;


class IndexController extends Controller
{
    public function index()
    {

        $info = Message::select();
        $userinfo = User::column('user_name', 'id');
        $this->assign('user', $userinfo);
        $user = User::select();
        $this->assign('use', $user);
        $this->assign('info', $info);
        return $this->fetch();


    }

    public function ap(Request $request)
    {
        $userinfo = User::column('user_name', 'id');

        $shuju = $request->get();

        if (!empty($shuju['key'])) {
            $info = $shuju['key'];

            if (!empty($info['game_name'])) {
                $name = $info['game_name'];
                $data = Message::where('game_name', $name)->select();


                $data = id_name($data, $userinfo);
                return json(["code" => 0, "msg" => "", "count" => 1, "data" => $data]);

            }


        } else {


            $data = Message::alias('m')
                ->join('Count_Score c', 'm.id=c.mess_id')
                ->field('m.*,c.big,c.small')
                ->select();


            $count = Message::count();


            $data = id_name($data, $userinfo);

            $res['count'] = $count;
            $res['data'] = $data;
            $this->assign('userinfo', $userinfo);


            return json(["code" => 0, "msg" => "", "count" => $count, "data" => $data]);


        }


    }


    public function api(Request $request)

    {
        $userinfo = User::column('user_name', 'id');

        $bb = CountScore::alias('a')
            ->join('__MESSAGE__ t', 'a.mess_id=t.id')
            ->field('a.big,a.small,a.mess_id as mid,t.*');



        $back = $request->param('key/a');



        if ($back) {
            $arr = [];
            foreach ($back as $k => $v) {
                //dump($v);

                if (!empty($v)) {
                    if ($k == 'game_date') {

                        $arr['game_data'] = ['like', "$v%"];
                    } else {
                        $arr[$k] = $v;
                    }
                }
            }





            $bb = $bb->where($arr)->select();
//            dump($bb);
//
//            exit;

            if($bb){
                $bb = id_name($bb,$userinfo);
                $count = 0;
                foreach ($bb as $v){

                    $count++;

                }


            }else{
                die('查无数据');
            }



            return json(["code" => 0, "msg" => "", "count" => $count, "data" => $bb]);


        }else {


            $data = Message::alias('m')
                ->join('Count_Score c', 'm.id=c.mess_id')
                ->field('m.*,c.big,c.small')
                ->select();


            $count = Message::count();



            $data = id_name($data, $userinfo);


            $res['count'] = $count;
            $res['data'] = $data;
            $this->assign('userinfo', $userinfo);



            return json(["code" => 0, "msg" => "", "count" => $count, "data" => $data]);


        }




    }
}


















