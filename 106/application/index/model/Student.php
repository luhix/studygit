<?php
/**
 * @Author: Luhix
 * @Date:   2017-10-06 22:58:03
 * @Last Modified by:   Luhix
 * @Last Modified time: 2017-10-06 23:41:05
 */
namespace app\index\model;
use think\Model;

class Student extends Model
{
    public function showGrade() {
        return $this->belongsTo('Grade','grade_id', 'gid'); //第一个参数关联模型,第二个参数中间关联参数，第三个本表id
    }
}