<?php 
namespace app\index\model;
use think\Model;
class User extends Model
{
    /* public function setSexAttr($value) {
        $sex = ['男' => 1, '女'=>0];
        return $sex[$value];
    } */

    public function changeSex($sex) {
       switch ($sex) {
           case '男':
               return 1;
               break;
           case '女':
               return 0;
               break;
           default:
               # code...
               break;
       }
    }
}