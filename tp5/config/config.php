<?php
    return [

            // 应用调试模式
        'app_debug'              => true,
        // 应用Trace
        // 'app_trace'              => true,
        // 应用模式状态

        'database' => [
             // 数据库调试模式
            'debug'           => true,
        ],

        'log'   => [
            'type'          => 'file', 
            // error和sql日志单独记录
            'apart_level'   =>  ['error','sql'],
        ],


    ];