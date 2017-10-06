<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Request;
use app\index\model\Student as StudentModel;
use app\index\model\Grade as GradeModel;
use think\Session;
use think\Db;
// use think\Config;
class Test extends Base
{
    public function info() {
      echo url('index/Test/info', ['id' => 10]);
    }

}