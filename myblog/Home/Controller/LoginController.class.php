<?php
namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{

//展示登录页面
    public function index()
    {
        $this->display();
    }
    //执行登录
    public function dealLogin()
    {
        //比对验证码
        $verifycode = I('post.verifycode');
        $verify     = new \Think\Verify();
        $result     = $verify->check($verifycode);
        if (!$result) {
            $this->error('验证码错误');
        }
        // var_dump($result);

        //判断三个是否为空

        $model = D('User');
        $data=$_POST;
        //判断用户名和密码是否一致
        //去数据库里面根据用户名先查找到用户信息
        $userInfo = $model->getUserInfo(['username' => $data['username']]);
        if (!$userInfo) {
            $this->error('用户或者密码错');
        }
        // var_dump($data['password']);die;
        //存在该用户则比对密码：
        $requirePasswod = md5($data['password']);
        // var_dump($requirePasswod);die;
        if ($requirePasswod == $userInfo['password']) {
            //记录session
            session('adminuser', $userInfo);
            //跳转到qian台首页
            $this->redirect('/home');
            // $this->success('登录成功','/Home');
            //echo "登录成功";
        }else{
            $this->error('用户或者密码错wu');

        }

    }
    //注销退出
    public function out()
    {
        //清除session
        session('adminuser', null);
        //跳转到登录页面
        $this->redirect('/Home');
    }
}