<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Request;
use app\index\model\User as UserModel;
use think\Session;
use think\Db;

class User extends Base
{
    public function login()
    {
        $this->alreadyLogin(); //防止重复登陆
        return $this->fetch();
    }

    /**
     * 验证登陆
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function checkLogin(Request $request) {

        //初始返回参数
        $status = 0;
        $result = '';
        $data   = $request->param();
        // var_dump($data);
        //创建验证规则
        $rule = [
            'name|用户名' => 'require',
            'password|密码' => 'require',
            'verify|验证码' => 'require|captcha',
        ];
        //自定义验证信息
        $msg = [
            'name.require' => '名称必须',
            'password.require'   => '密码必须',
            'verify.require'        => '验证码必须填写',
            'verify.captcha'    => '验证码错误',
        ];
        $result = $this->validate($data,$rule,$msg);


        //数据中的验证
       if($result === true) {
            $map = [

                'name' => $data['name'],
                // 'password' => md5($data['password'])
                'password' => $data['password']
            ];

            $user  = UserModel::get($map);

            if($user == null) {
                $result = '用户名或者，密码错误';
            } else {
                $status = 1;
                $result = '验证通过';

                Session::set('user_id', $user->id);
                Session::set('user_info', $user->getData());//获取用户所有信息
            }
       }
        return ['status'=>$status, 'message'=>$result, 'data' => $data];
    }

    /**
     * 退出系统
     * @return [type] [description]
     */
    public function loginOut() {
        //注销session
        Session::delete('user_id');
        Session::delete('user_info');
        $this->success('退出成功', 'user/login');
    }

    /**
     * 管理员列表
     * @return [type] [description]
     */
    public function adminList() {

        $this -> view -> assign('title', '管理员列表');

        //统计有多少数据
        $this-> view -> count = UserModel::count();

        /*
            判断当前是不是admin用户,如果是，则统计出所有用户；如果不是，则只列出自己
         */
        $userName = Session::get('user_info.name');
        if($userName == 'admin') {
            $list = UserModel::all(['is_delete' => 0]);

        } else {
            $list = UserModel::all(['name' => $userName, 'is_delete' => 0]);
        }

        $this-> view -> assign('list', $list);
        return $this-> fetch('admin-list');
    }

    /**
     * 设置用户状态
     * @param Request $request [description]
     */
    public function setStatus(Request $request) {

        $user_id = $request -> param('id');

        $info = UserModel::get($user_id);

        if($info->getData('status') == 1) {
            UserModel::where('id',$user_id) -> update(['status' => 0]);
        } else {
            UserModel::where('id',$user_id) -> update(['status' => 1]);
        }

    }


    public function adminAdd() {

        //查询处所有角色
        $list = UserModel::all();
        $this->view->assign('list', $list);
        $this->view->assign('title','添加管理员');
        return $this -> fetch('admin-add');
    }

    public function checkUserName(Request $request) {
        $name = $request -> param('name');
        $status = 1;
        $message = '用户名可以用';
        if(UserModel::get(['name' => $name])) {
            //如果用户名存在
            $status  = 0;
            $message = '用户名已经存在';
        }
        return ['status'=> $status, 'message'=>$message];
    }

    /**
     * 检查邮箱
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function checkUserEmail(Request $request) {
        $email = $request -> param('eamil');
        $status = 1;
        $message = '邮箱可以用';
        if(UserModel::get(['email' => $eamil])) {
            //如果用户名存在
            $status  = 0;
            $message = '邮箱已经存在';
        }
        return ['status'=> $status, 'message'=>$message];
    }

    /**
     * 添加数据
     * @param Request $request [description]
     */
    public function addUser(Request $request) {
        $data = $request -> param();
        $status= 1;
        $rule = [

            'name|名称'=> "require|min:3|max:10",
            'password|密码'=>"require|min:6",
            'email|邮箱' =>"require|email"
        ];

        $result = $this->validate($data,$rule);

        // var_dump($data);exit;

        if($result === true) {
            $arr  = $request->param();
            $arr['password'] = md5($arr['password']);
            $arr['create_time'] = time();
            switch ($arr['role']) {
                case '超级管理员':
                    $arr['role'] = 1;
                    break;
                case '管理员':
                    $arr['role'] = 0;
                    break;
                default:
                    # code...
                    break;
            }

            //判断是否已经添加，防止重复添加
            $res = UserModel::get(['name' => $arr['name']]);
            if($res === null) {
                $user = UserModel::create($arr);
                if($user === null) {
                    $status= 0;
                    $result = '添加失败';
                }
                 $result = '添加成功';
            } else {
                 $status= 0;
                 $result = '请勿重复添加';
            }

        }
        return ['status'=> $status, 'message'=>$result];
    }

    /**
     * 删除数据
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function deleteUser(Request $request) {
        $user_id = $request -> param('id');
        UserModel::update(['is_delete' => 1, 'delete_time' => time()], ['id' => $user_id]); //软删除
        // UserModel::destroy($user_id);   //真删除
    }

    /**
     * 数据恢复
     * @return [type] [description]
     */
    public function unDelete() {
        $user = new UserModel;
        $user -> where('is_delete', 1)->update(['is_delete'=>0,'delete_time' => 0]);
    }


    //渲染编辑管理员界面
     public function adminEdit(Request $request)
    {
        $user_id = $request -> param('id');
        $data = Db::table('user')->where('id',$user_id)->find();
        $res  = Db::table('user')->select();
        $this->view->assign('list',$data);
        $this->view->assign('res',$res);
        return $this->fetch('admin-edit');
    }

    public function updateUser(Request $request) {
        $data = $request -> param();
        UserModel::update($data);

        return ['status' => 1, 'message'=>'更新成功'];

    }
}
