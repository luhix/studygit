<?php
namespace app\index\controller;
use think\Controller;
use think\Log;
use think\Db;
class Map extends Controller
{
    public function showMap(){
         return $this->fetch('index/map');
    }

    public function testLog() {

        $count = Db::table('think_user_info')->count();

        echo $count;

        Log::record('测试调试错误信息');
        Log::record('调试的SQL：');
        Log::save();
    }
}   