<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Request;
use app\index\model\Student as StudentModel;
use app\index\model\Grade as GradeModel;
use think\Session;
use think\Db;
class Student extends Base
{
    public function index() {

       $data = StudentModel::all();
      /* if($data) {
            $data = collection($data) -> toArray();  //将对象转成数组
       }
*/
      foreach ($data as $key => $value) {
         $value -> grade = $value->showGrade->name;
      }

      $this->assign('studentList', $data);
      return $this-> fetch('student-list');

    }

}