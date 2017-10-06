<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Request;
use app\index\model\Student as StudentModel;
use app\index\model\Grade as GradeModel;
use think\Session;
use think\Db;
class Grade extends Base
{
    public function index() {
        $data = GradeModel::all();
        foreach ($data as $key => $value) {
           echo $value->showStudent -> name . "<br>";
        }
    }

}