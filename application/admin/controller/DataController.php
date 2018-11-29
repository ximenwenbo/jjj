<?php
namespace app\admin\controller;

use app\admin\model\CountScore;
use app\admin\model\User;
use app\admin\model\Message;
use app\admin\model\Data;
use think\Loader;
use think\Db;

use think\Controller;
use think\Request;
class DataController extends controller
{
    public static $class = 1;



    //后台系统默认请求页面
    public function index(Request $request)
    {
        if($request->post()){
            $user_id = $request->post('user_id');
            $mess_id = $request->post('mess_id');

            $data = new Data();

            $infos = $data->where(['user_id'=>$user_id,'mess_id'=>$mess_id])->order('id desc')->paginate(10);

            $shuju = $data->where(['user_id'=>$user_id,'mess_id'=>$mess_id])->select();


            if(!$shuju){

                $this->assign('error','瞎几把查 没信息~~~~');

            }
            $pagelist = $infos->render();
            $this->assign('pagelist',$pagelist);

            $this->assign('infos', $infos);
            $info= Message::select();
            $this->assign('info', $info);

            $infoss = User::select();
            $this->assign('infoss', $infoss);





            return $this->fetch();


        }else{

        $data = new Data();
        $infos = Data::order('id desc')->paginate(10);

            //获得页码列表
            $pagelist = $infos->render();
            $this->assign('pagelist',$pagelist);

        $this->assign('infos', $infos);
        $info= Message::select();
        $this->assign('info', $info);

        $infoss = User::select();
        $this->assign('infoss', $infoss);





        return $this->fetch();
        }
    }

    public function tianjia(Request $request)
    {

        if ($request->post()) {
            $infos = $request->post();


            $data = new Data();
            $result = $data->save($infos);
            if ($result) {
                return ['status' => 'success'];

            } else {
                return ['status' => 'failure'];
            }
        } else {
            $infos = Message::select();
            $this->assign('infos', $infos);

            $info = User::select();
            $this->assign('info', $info);


            return $this->fetch();
        }

    }


    public function shanchu(Request $request, Data $data)
    {
//var_dump($users);die;
        $rst = $data->delete();


        if ($rst) {
            return ['status' => 'success'];
        } else {
            return ['status' => 'failure'];
        }
    }

    public function xiugai(Request $request, Data $data)
    {
        if ($request->post()) {
            $shuju = $request->post();
            $rst = $data->update($shuju);
            if ($rst) {
                return ['status' => 'success'];
            } else {
                return ['status' => 'failure'];
            }


        } else {
            $infos = Message::select();
            $this->assign('infos', $infos);

            $info = User::select();
            $this->assign('info', $info);

            $this->assign('data', $data);

            return $this->fetch();

        }

    }

    public function down()
    {
        $infos = Message::select();
        $this->assign('infos', $infos);

        $info = User::select();
        $this->assign('info', $info);
        return $this->fetch();
    }

    function insertExcel(Request $request)
    {
        $mess_id = $request->post('mess_id');
        $user_id = $request->post('user_id');


        Loader::import('PHPExcel.Classes.PHPExcel');
        Loader::import('PHPExcel.Classes.PHPExcel.IOFactory.PHPExcel_IOFactory');
        Loader::import('PHPExcel.Classes.PHPExcel.Reader.Excel5');
        //获取表单上传文件
        $file = request()->file('excel');
        $info = $file->validate(['ext' => 'xlsx,xls'])->move(ROOT_PATH . 'public' . DS . 'uploads');

        if ($info) {
            if (empty($info)) {
                return error('导入失败!');
            }


            $exclePath = $info->getSaveName();  //获取文件名
            //上传文件的地址
            $filename = ROOT_PATH . 'public' . DS . 'uploads' . DS . $exclePath;
            //判断版本，这里有的网上的版本没有进行判断，导致会报大概这样的错误：
            //Warning: ZipArchive::getFromName() [ziparchive.getfromname]: Invalid or unitialized ，这里加上这个判断就可以了
            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if ($extension == 'xlsx') {
                $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
                //加载文件内容,编码utf-8
                $objPHPExcel = $objReader->load($filename, $encode = 'utf-8');
            } else if ($extension == 'xls') {
                $objReader = \PHPExcel_IOFactory::createReader('Excel5');
                $objPHPExcel = $objReader->load($filename, $encode = 'utf-8');
            } else {
                return error('请上传excel格式的文件!');
            }
            $excel_array = $objPHPExcel->getsheet(0)->toArray();   //转换为数组格式

            array_shift($excel_array);  //删除第一个数组(标题);
            array_shift($excel_array);  //删除第二个数组(标题);




            $data = [];
            foreach ($excel_array as $k => $v) {
                //data数组根据你表字段自行修改，这里Excel文件里的字段要跟表一致
                $data[$k]['class'] = $v[0];
                $data[$k]['get'] = $v[1];
                $data[$k]['lose'] = $v[2];
                $data[$k]['send'] = $v[3];
                $data[$k]['bat_number'] = $v[4];
                $data[$k]['tool'] = $v[5];
                $data[$k]['get_lose'] = $v[6];
                $data[$k]['mess_id'] = $mess_id;
                $data[$k]['user_id'] = $user_id;

            }



            if (Db::name('data')->insertAll($data)) {


            //创建 model类对象
                $count = new CountScore();



                //遍历上传到data表中的比赛数据
                foreach ($data as $key => $v){
                    //获取比赛编号
                    $mess_id = $v['mess_id'];
                    $user_id = $v['user_id'];

                    //获取data表中的已经存在的比赛编号 已有的比赛在countscore表做更新操作 没有的做添加
                    $hh = CountScore::column("mess_id","id");
                    $gg = CountScore::column("user_id","id");

                    if(!in_array($mess_id,$hh)){
                        //获得当前总得分
                        $get = $v['get'];
                        //获得当前总失分
                        $lose = $v['lose'];
                        //获得差值
                        $cha1 = $get - $lose;
                        $cha2  = $lose - $get;

                        $left = 0;
                        $right = 0;





                        while ($get>9 && $cha1>0 && $v['get_lose'] == '得' || $lose >9 && $cha2 >0 &&$v['get_lose']=='失'){
                            if($get>9 && $cha1>0 && $v['get_lose'] == '得'){

                                //获得大比分小比分
                                $arr['small'] = ($get+1).'-'.$lose;
                                $arr['big'] = ($left+1).'-'.$right;
                                $arr['mess_id'] = $mess_id;

                                //添加入库
                                $count->save($arr);
                                break;

                            }else{
                                //获得大比分小比分
                                $arr['small'] = $get.'-'.($lose+1);
                                $arr['big'] = $left.'-'.($right+1);
                                $arr['mess_id'] = $mess_id;

                                //添加入库
                                $count->save($arr);
                                break;


                            }

                        }


                    }else{


                            //数据库已有比赛做更新操作
                            $ff = $count->where('mess_id',$mess_id)->find();

                            $id = $ff->id;
                            $big = $ff->big;
                            $small = $ff->small;
                            $get = $v['get'];
                            $lose = $v['lose'];

                            $cha1 = $get - $lose;
                            $cha2 = $lose - $get;

                            while ($get > 9 && $cha1 > 0 && $v['get_lose'] == '得' || $lose > 9 && $cha2 > 0 && $v['get_lose'] == '失') {
                                if ($get > 9 && $cha1 > 0 && $v['get_lose'] == '得') {


                                    $shu = substr($big, 0);
                                    $shu += 1;
                                    $shu2 = substr($big, 1, 2);
                                    $arr['big'] = $shu . $shu2;


                                    $small2 = ($get + 1) . '-' . $lose;
                                    $small3 = $small . "&nbsp;&nbsp;" . $small2;


                                    $arr['small'] = $small3;
                                    $arr['id'] = $id;

                                    $count->update($arr);


                                    break;



                                }else{
                                    $shu = substr($big,2,1);


                                    $shu += 1;
                                    $shu2 = substr($big, 0, 2);

                                    $arr['big'] = $shu2 . $shu;


                                    $small2 = $get . '-' . ($lose+1);
                                    $small3 = $small . "&nbsp;&nbsp;" . $small2;


                                    $arr['small'] = $small3;
                                    $arr['id'] = $id;

                                    $count->update($arr);

                                    break;


                                }

                            }



                    }







                }


                return  ('导入数据成功');





            } else {
                return  ('导入数据失败');
            }

        } else {
            return ('导入失败');
        }
    }

    public function downExcel()
    {
        Loader::import('PHPExcel.Classes.PHPExcel');
        $phpexcel = new \PHPExcel();
        $phpexcel->setActiveSheetIndex(0);
        $sheet = $phpexcel->getActiveSheet();
        $res = db('data')->field("class,get,lose,send,bat_number,tool,get_lose")->where('id', '<', '10')->select();
        $arr = [
            'class' => '局数',
            'get' => '总得分',
            'lose' => '总失分',
            'send' => '发接轮次',
            'bat_number' => '拍数',
            'tool' => '手段',
            'get_lose' => '得失分',
        ]; //设置标题信息
        array_unshift($res, $arr);//将我们上面手动设置的标题信息放到数组中，作为第一行写入数据表
        
        
           
            $sheet->setCellValue('A' . 1, $arr['class'])
                ->setCellValue('B' . 1, $arr['get'])
                ->setCellValue('C' . 1, $arr['lose'])
                ->setCellValue('D' . 1, $arr['send'])
                ->setCellValue('E' . 1, $arr['bat_number'])
                ->setCellValue('F' . 1, $arr['tool'])
                ->setCellValue('G' . 1, $arr['get_lose']);
        
        header('Content-Type: application/vnd.ms-excel');//设置下载前的头信息
        header('Content-Disposition: attachment;filename="ceshi.xlsx"');
        header('Cache-Control: max-age=0');
        $phpwriter = new \PHPExcel_Writer_Excel2007($phpexcel);//此处的2007代表的是高版本的excel表格
        $phpwriter->save('php://output');//生成并下载excel表格

    }




    public function score(){
      $info =  Message::alias('m')
            ->join('Count_Score c','m.id=c.mess_id')
          ->field('m.*,c.big,c.small')
            ->select()
        ;
        $this->assign('infos',$info);
        $userinfo = User::column('user_name','id');
        $this->assign('userinfo',$userinfo);

        return $this->fetch();



    }
    public function shangxian(Request $request){
      $arr = $request->post();

        if($arr['xian'] == '上线'){
        $arr['states'] = 1;
            unset($arr['xian']);
        }else{
            $arr['states'] = 2;
            unset($arr['xian']);
        }


       $m =  new Message();
        $rst  = $m->Update($arr);
        if ($rst) {
            if ($arr['states'] == 1) {
                return ['status' => 'success'];
            }else {
                return ['status' => 'failure'];
            }

        }



    }



}
