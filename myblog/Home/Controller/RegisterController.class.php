<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller{
	public function index(){
		$this->display();
	}
	public function register(){
		 //比对验证码
        $verifycode = I('post.verifycode');
        $verify     = new \Think\Verify();
        $result     = $verify->check($verifycode);
        if (!$result) {
            $this->error('验证码错误');
        }
        
        //自动创建,
		  $userModel = D('User');
		  //在usermodel中 进行自动验证，以及自动完成
        if(false === $userModel->create())
        {
            $this->error($userModel->getError());
        }
        $id =$userModel->add();
        $this->success("注册成功！您是第{$id}个会员",'/login');

	}
}