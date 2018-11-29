<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"F:\www\jjj\public/../application/admin\view\message\tianjia.html";i:1536570840;s:47:"F:\www\jjj\application\admin\view\pub\head.html";i:1536664669;s:47:"F:\www\jjj\application\admin\view\pub\foot.html";i:1532090900;s:57:"F:\www\jjj\application\admin\view\message\js_tianjia.html";i:1536718104;}*/ ?>
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

<title>添加比赛 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="add">

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>比赛名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder=""  name="game_name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>比赛日期：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" id="date" name="game_date">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>比赛时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="mobile" name="game_time">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>比赛阶段：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" name="game_stage" id="email">
			</div>
		</div>


		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>运动员A：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select name="user_a"  >
					<option value="请选择">请选择</option>
					<?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $vv['id']; ?>"><?php echo $vv['user_name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>

			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>运动员B：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select name="user_b"  >
					<option value="请选择">请选择</option>
					<?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $vv['id']; ?>"><?php echo $vv['user_name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>

			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>比赛项目：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder=""  name="game_project">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>比赛国家：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder=""  name="state">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>比赛城市：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder=""  name="city">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否是公开赛：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select name="show" id="">
					<option value="1">是</option>
					<option value="0">否</option>
				</select>
			</div>
		</div>


		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>


<script type="text/javascript" src="<?php echo config('admin_lib'); ?>My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo config('admin_lib'); ?>jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="<?php echo config('admin_lib'); ?>jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="<?php echo config('admin_lib'); ?>jquery.validation/1.14.0/messages_zh.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo config('plugin'); ?>/jedate/skin/jedate.css" />
<script type="text/javascript" src="<?php echo config('plugin'); ?>/jedate/src/jedate.js"></script>
<script type="text/javascript">

$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-member-add").validate({
		rules:{
			username:{
				required:true,
				minlength:2,
				maxlength:16
			},
			sex:{
				required:true,
			},
			mobile:{
				required:true,
				isMobile:true,
			},
			email:{
				required:true,
				email:true,
			},
			uploadfile:{
				required:true,
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			//$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			//parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
<script type="text/javascript">

    jeDate("#date",{
        minDate:jeDate.nowDate(),

    });



    $(function(){
        $('#add').submit(function(evt){
            evt.preventDefault();//阻止浏览器提交动作

            //获得添加商品的form表单信息
            //serialize():把form表单域信息组织为请求字符串样子
            //            name=value&name=value&name=value...
            var shuju = $(this).serialize();
            //console.log(shuju);//goods_name=sddddd&goods_price=3333.33&goods_number=2122&goods_weight=55&goods_introduce=%3Cp%3Esdsdsdsdsdds%3C%2Fp%3E

            //ajax传递数据到服务器端存储
            $.ajax({
                //url:'/admin/goods/tianjia',
                //url:'<?php echo url("admin/goods/tianjia"); ?>',    // /admin/users/tianjia.html
                url:'<?php echo url("message/tianjia","",false); ?>',    // admin/users/tianjia
                data:shuju,
                dataType:'json',
                type:'post',
                success:function(msg){

                    if(msg.status=='success'){

                        layer.alert('添加比赛成功',{icon:6},function(){
                            //下述① 和 ②执行执行顺序要求
                            //① 在"父级"页面把新添加商品刷新出来


                            parent.window.location.href=parent.window.location.href;
                            //② 关闭添加商品的弹框表单页面
                            layer_close();
                        });
                    }else{
                        //layer.alert('添加商品失败【'+msg.errorinfo+'】',{icon:5},function(){
                        //② 关闭添加商品的弹框表单页面
                        //layer_close();
                        //});
                        layer.alert('添加比赛失败',{icon:5});
                    }
                }
            });
        });
    });

</script>