<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/thinkphp323_auth/Public/home/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/thinkphp323_auth/Public/home/js/jquery.js"></script>

</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    </ul>
    </div>

    <div class="mainindex">

    <div class="welinfo">
        <span><img src="/thinkphp323_auth/Public/home/images/sun.png" alt="天气" /></span>
        <strong><?php echo $_SESSION['username'];?>你好，欢迎使用信息管理系统</strong>
    </div>

    </div>
</body>

</html>