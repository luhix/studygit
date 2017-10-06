<?php
/**
 * @Author: Luhix
 * @Date:   2017-10-06 22:47:07
 * @Last Modified by:   Luhix
 * @Last Modified time: 2017-10-06 23:22:46
 */
namespace app\index\model;
use think\Model;

class User extends Model
{


    //数据表中角色字段:role返回值处理
    public function getRoleAttr($value)
    {
        $role = [0=>'管理员',1=>'超级管理员'];
        return $role[$value];
    }

   //状态字段:status返回值处理
   public function getStatusAttr($value)
   {
      $status = [0=>'已停用', 1=>'已启用'];
      return $status[$value];
   }
}