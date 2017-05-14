<?php
namespace Home\Controller;

use Think\Controller;

class UserController extends Controller{
	public function index(){
		$this->display();	
	}

	public function login(){
		$this->display("User:dologin");
	}

	public function dologin(){
		$name = I("post.username");
        if (empty($name)){
            $this->error("未输入用户名");
        }

        $password = I("post.password");

        if (empty($password)){
            $this->error("未输入密码");
        }

        $user = M("user");

        $where['user_name'] = $name;

        $result = $user->where($where)->find();

        if (!empty($result)){
            if (md5($password) == $result['user_password']){
                session('USER_ID', $result['uid']);
                session('type', $result['user_type']);
                session('name', $result['user_name']);
                $user->save($result);
                cookie("user_name", $name, 3600*24*30);
                $this->success("登录成功", U("Home/index"));
            }else{
                $this->error("密码不正确", U("User/login"));
            }
        }else{
            $this->error("用户名不存在", U("User/login"));
        }
	}

	public function register(){
        $user_model = M("user");

        $rules = array(
            //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
            array('username', 'require', '用户名不能为空！', 1 ),
            array('user_name','','用户名已被注册！！',0,'unique',3),
            array('password','require','密码不能为空！',1),
            array('password','5,20',"密码长度至少5位，最多20位！",1,'length',3),
            array('repassword','require','重复密码不能为空！',1),
            array('repassword','5,20',"重复密码长度至少5位，最多20位！",1,'length',3),
         );

        if ($user_model->validate($rules)->create() === false){
            $this->error($user_model->getError());
        }

        $repassword = I('post.repassword');
        $password = I('post.password');
        $username = I('post.username');

        if ($repassword != $password){
            $this->error("两次密码不同!");
        }

        $data = array(
            'user_name' => $username,
            'user_password' => md5($password),
            'user_type' => 0,
        );

        $result = $user_model->add($data);

        if ($result){
            $data['id'] = $result['uid'];
            session('user', $data['id']);
            $this->success("注册成功", U('User/login'));
        }else{
            $this->error("注册失败", U('User/index'));
        }

    }

    public function logout(){
        session('USER_ID', null);
        $this->display('User:dologin');
    }
}