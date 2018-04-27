<?php
namespace Home\Controller;
use Think\Controller;
class FiledController extends Controller{
	public function index(){
		if($nowdata=session('adminuser')){
			$this->assign('adminuser',$nowdata);
			$this->display();
		}else{
			$this->error('没有登录，不能修改');
		}
	}
	public function update(){
		// echo 111;
	

		$modeluser=D('User');
		$data=$_POST;
		$file               = A('Photo');
        $savePath           = $file->upphoto('avatar');
        $data['avatar']      = './Public/home/images/' . $savePath;
  //       echo "<pre>";
		// var_dump($data);die;
		$nowdata=session('adminuser');
		if ($result = $modeluser->where('id='.$nowdata['id'])->data($data)->save()){
            //成功提示
            session('adminuser',null);
            $this->success('修改成功请重新登陆','/login');
        } else {
            //成功提示
            $this->error('修改失败');
        }


	}
}