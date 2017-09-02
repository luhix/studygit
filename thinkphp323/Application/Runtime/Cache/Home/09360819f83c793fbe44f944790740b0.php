<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/thinkphp323_auth/Public/home/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/thinkphp323_auth/Public/home/js/jquery.js"></script>

    <script type="text/javascript">
        $(function(){
	//导航切换
	$(".menuson li").click(function(){
		$(".menuson li.active").removeClass("active")
		$(this).addClass("active");
	});

	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
		}else{
			$(this).next('ul').slideDown();
		}
	});
})
</script>


</head>

<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>通讯录</div>

    <dl class="leftmenu">

        <dd>
            <div class="title">
                <span><img src="/thinkphp323_auth/Public/home/images/leftico01.png" /></span>权限
            </div>
            <ul class="menuson">
                <li <?php echo CONTROLLER_NAME=='Auth' && ACTION_NAME=='ruleadd' ? 'class="active"' : ''?>><cite></cite><a href="../Auth/ruleadd.html" target="rightFrame">权限</a><i></i></li>
                <li <?php echo CONTROLLER_NAME=='Auth' && ACTION_NAME=='groupadd' ? 'class="active"' : ''?>><cite></cite><a href="../Auth/groupadd.html" target="rightFrame">角色</a><i></i></li>
            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="/thinkphp323_auth/Public/home/images/leftico01.png" /></span>管理员
            </div>
            <ul class="menuson">
              <li <?php echo CONTROLLER_NAME=='Admin' && ACTION_NAME=='add' ? 'class="active"' : ''?>><cite></cite><a href="../Admin/add.html" target="rightFrame">管理员</a><i></i></li>
          </ul>
      </dd>

  </dl>

</body>
</html>