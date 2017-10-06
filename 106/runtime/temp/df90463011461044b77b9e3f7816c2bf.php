<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:72:"D:\xampp\htdocs\106\public/../application/index\view\user\admin-add.html";i:1507301415;s:69:"D:\xampp\htdocs\106\public/../application/index\view\Common\base.html";i:1507303069;s:69:"D:\xampp\htdocs\106\public/../application/index\view\Common\meta.html";i:1503754366;s:71:"D:\xampp\htdocs\106\public/../application/index\view\Common\footer.html";i:1507303895;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="favicon.ico" >
<link rel="Shortcut Icon" href="favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui.admin/skin/default/skin.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->


<!--/meta 作为公共模版分离出去-->


<title><?php echo (isset($title) && ($title !== '')?$title:"标题"); ?></title>
<meta name="keywords" content="<?php echo (isset($keywords) && ($keywords !== '')?$keywords:'关键字'); ?>">
<meta name="description" content="<?php echo (isset($desc) && ($desc !== '')?$desc:'描述'); ?>">

<!--_header 作为公共模版分离出去-->

<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->

<!--/_menu 作为公共模版分离出去-->

<article class="cl pd-20">

    <form action="" method="post" class="form form-horizontal" id="form-admin-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input  type="text" class="input-text" value="" placeholder="" id="name" name="name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户密码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="password" class="input-text" autocomplete="off" value=""  placeholder="密码为6位" id="password" name="password">
            </div>
        </div>



        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">启用状态：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="status" size="1">
					<option value="1" selected>启用</option>
                    <option value="0">不启用</option>
				</select>
				</span>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="email" class="input-text" placeholder="@" name="email" id="email" value="">
            </div>
        </div>


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">角色：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">

				<select class="select" name="role" size="1">
					<option value="0" selected>请选择</option>
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['role']; ?>"><?php echo $vo['role']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span>
            </div>
        </div>



        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius disabled" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" id="submit" >
            </div>
        </div>
    </form>


</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__STATIC__/static/h-ui.admin/js/H-ui.admin.page.js"></script>

<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->

<!--请在下方写此页面业务相关的脚本-->

<script>

    $(function(){

        //防止用户无更新提交,只有表中数据有变化时才允许提交
        $("form").children().change(function(){
            $("#submit").removeClass('disabled');
        });

        //失去焦点时,检查用户名是否重复
        $("#name").blur(function(){
            $.ajax({
                type: 'GET',
                url: "checkUserName",
               data:{name:$(this).val()},
                dataType: 'json',
                success: function(data){
                    if (data.status == 0) {
                       layer.msg(data.message)
                    }
                }
            });
        });

        //失去焦点时,检查邮箱是否重复
        $("#email").blur(function(){
            $.ajax({
                type: 'GET',
                url: "checkUserEmail",
                data:{email:$(this).val()},
                dataType: 'json',
                success: function(data){
                    if (data.status == 0) {
                       layer.msg(data.message)
                    }
                }
            });
        });

        $("#submit").on("click", function(event){
            $.ajax({
                type: "POST",
                url: "<?php echo url('user/addUser'); ?>",
                data: $("#form-admin-add").serialize(),
                dataType: "json",
                success: function(data){
                    if (data.status == 1) {
                        layer.msg(data.message);
                    } else {
                        layer.msg(data.message);
                    }
                }
            });

        })
    })
</script>

<!--/请在上方写此页面业务相关的脚本-->

