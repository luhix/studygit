<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/thinkphp323_auth/Public/home/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/thinkphp323_auth/Public/home/js/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>


</head>

<body style="background:url(/thinkphp323_auth/Public/home/images/topbg.gif) repeat-x;">

    <div class="topleft">
    <a href="main.html" target="_parent"><img src="/thinkphp323_auth/Public/home/images/logo.png" title="系统首页" /></a>
    </div>            
    <div class="topright">    
    <ul>
    <li><a href="<?php echo U('Common/logout')?>" target="_parent">退出</a></li>
    </ul>
     
    <div class="user">
    <span><?php echo $_SESSION['username']?></span>
    <i>消息</i>
    <b>5</b>
    </div>    
    
    </div>

</body>
</html>