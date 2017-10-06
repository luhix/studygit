<?php
/**
 * @Author: Luhix
 * @Date:   2017-10-06 22:57:56
 * @Last Modified by:   Luhix
 * @Last Modified time: 2017-10-06 23:25:05
 */
namespace app\index\model;
use think\Model;

class Grade extends Model
{
    public function showStudent() {
        return $this->hasMany('Student','grade_id', 'gid');
    }
}