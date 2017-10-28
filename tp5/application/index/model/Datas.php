<?php
namespace app\index\model;
use think\Model;
use traits\model\SoftDelete;
class Datas extends Model
{

    use SoftDelete;

    public function getStatusAttr($value) {
        $status = [0 => '女', 1 => '男'];

        return $status[$value];
    }


}