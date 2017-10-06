<?php
namespace app\index\controller;
use app\index\controller\Base;

class Indexs extends Base
{
    public function index()
    {
        $this->isLogin();     //判断用户是否登陆

        $this->view->assign('title', 'tp5后台首页');
        return $this->fetch();
    }
}
