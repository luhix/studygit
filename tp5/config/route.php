<?php

/**
 * 路由配置的两种方法
 */

 //动态配置
use think\Route;
// Route::rule('new','index/index/test1');
// Route::rule('new/:id','index/Index/test1');


//第二种 静态配置
 return [
    
//     // 'blog' =>'index/index/test1',
    'new/:id' =>'index/index/test1',

    'blog/:id' => 'blog/get',
    // 定义了局部变量规则
    'blog/:name' => ['blog/read', ['method' => 'get'], ['name' => '\w{5,}']],
    'blog-<year>-<month>' => 'blog/archive',
    
];