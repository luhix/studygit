<?php
/**
 * @Author: Luhix
 * @Date:   2017-08-26 21:10:37
 * @Last Modified by:   Luhix
 * @Last Modified time: 2017-10-06 22:54:29
 */
namespace app\index\controller;
use think\Controller;
use think\Session;
class Base extends Controller
{
    public function _initialize() {
        parent::_initialize();

        define('USER_ID', Session::get('user_id'));
    }

    //判断用户是否登陆,放在后台的入口:index/index
    protected function isLogin() {
        if(empty(USER_ID)) {
            $this->error('用户未登录', url('user/login'));
        }
    }

    //防止用户重复登陆:user/login
    protected function alreadyLogin() {
         if(!empty(USER_ID)) {
            $this->error('用户未登录', url('index/index'));
        }
    }
}