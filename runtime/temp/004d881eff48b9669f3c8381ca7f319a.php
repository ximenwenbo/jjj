<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:59:"F:\www\jjj\public/../application/admin\view\data\score.html";i:1536752768;s:47:"F:\www\jjj\application\admin\view\pub\head.html";i:1536664669;s:52:"F:\www\jjj\application\admin\view\data\js_score.html";i:1536753717;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--_footer 作为公共模版分离出去-->
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>layer/2.4/layer.js"></script>
    <script type="text/javascript" src="<?php echo config('admin_static'); ?>h-ui/js/H-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo config('admin_static'); ?>h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->



    <!--请在下方写此页面业务相关的脚本-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>html5shiv.js"></script>
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_lib'); ?>Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>h-ui.admin/skin/green/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>h-ui.admin/css/style.css" />


    <!--[if IE 6]>
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>DD_belatedPNG_0.0.8a-min.js" ></script>
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>jquery/1.9.1.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
        

        <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
        
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加比赛','<?php echo url('tianjia'); ?>','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加比赛信息</a></span> <span class="r">共有数据：<strong>88</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">


                <th width="80">编号</th>


				<th width="100">比赛时间</th>
				<th width="80">比赛名称</th>
				<th width="130">比赛项目</th>
				<th width="90">比赛阶段</th>
				<th width="60">a运动员</th>
				<th width="60">b运动员</th>
				<th width="60">大比分</th>
				<th width="60">小比分</th>


				<th width="100">状态</th>
				<th width="160">操作</th>
			</tr>
		</thead>
		<tbody>
        <?php if(is_array($infos) || $infos instanceof \think\Collection || $infos instanceof \think\Paginator): $i = 0; $__LIST__ = $infos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">

				<td><?php echo $v['id']; ?></td>
				<td><?php echo $v['game_date']; ?></td>
				<td><?php echo $v['game_name']; ?></td>
				<td ><?php echo $v['game_project']; ?></td>
				<td><?php echo $v['game_stage']; ?></td>
				<td><?php echo $userinfo[$v['user_a']]; ?></td>
				<td><?php echo $userinfo[$v['user_b']]; ?></td>
				<td><?php echo $v['big']; ?></td>
				<td><?php echo $v['small']; ?></td>







				<td  id="<?php echo $v['id']; ?>">
					<?php if($v['states']==1): ?>
					已上线
					<?php else: ?>
					已下线
					<?php endif; ?>
				</td>


				<td class="td-manage">

					<input type="button" class="btn btn-success" value="上线" onclick="on(this,'<?php echo $v['id']; ?>')" />
					<input type="button" class="btn btn-danger"   value="下线" onclick="on(this,'<?php echo $v['id']; ?>')" />

				</td>
			</tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	</div>
</div>



<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--_footer 作为公共模版分离出去-->
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>layer/2.4/layer.js"></script>
    <script type="text/javascript" src="<?php echo config('admin_static'); ?>h-ui/js/H-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo config('admin_static'); ?>h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->



    <!--请在下方写此页面业务相关的脚本-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>html5shiv.js"></script>
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_lib'); ?>Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>h-ui.admin/skin/green/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>h-ui.admin/css/style.css" />


    <!--[if IE 6]>
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>DD_belatedPNG_0.0.8a-min.js" ></script>
    <script type="text/javascript" src="<?php echo config('admin_lib'); ?>jquery/1.9.1.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
<script type="text/javascript">

      function on(obj,id){
//          console.log($(obj).val());
//          return;

          var xian = $(obj).val();
          if(xian == '上线'){
              $("#"+id).html('已上线');
          }else{
              $("#"+id).html('已下线');
          }


          $.ajax({

              url:'<?php echo url("data/shangxian","",false); ?>',
              data:{id:id,xian:xian},
              dataType:'json',
              type:'post',
              success:function(msg){

                  if(msg.status=='success'){

                      layer.alert('上线成功',{icon:6,time:1000}



                      );
                  }else{
                      layer.alert('下线成功',{icon:6,time:1000}



                      );

                  }
              }
          });
    }
      function off(obj,id){
          $("#"+id).html('已下线');
      }






</script>