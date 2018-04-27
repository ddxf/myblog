<?php
namespace Home\Controller;
use Think\Controller;
// use Home\Controller\CommonController;
class IndexController extends Controller {
    public function index(){
    	$model=D('Article');
        $typemodel=D('Type');
        $data=$typemodel->getlists('pid=0');
        // $modeluser=D('User');
        // $data
        $user=session('adminuser');
    	// $data=$model->where("hits>=10")->limit('1,6')->select();
        //limit显示的是限制条件。从0开始到第六条数据
    	$list=$model->where("deleted_at=0")->order("id desc")->limit('0,6')->select();
    	// var_dump($list);die;
        $this->assign('user',$user);
    	$this->assign('typelist',$data);
    	$this->assign('list',$list);
        // $this->assign('adminUser',session('adminuser'));
        $this->display();
    }
}