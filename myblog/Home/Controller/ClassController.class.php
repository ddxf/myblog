<?php
namespace Home\Controller;
use Think\Controller;
// 
class ClassController extends Controller{
	public function index(){
		$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
		if(empty($pid=I('get.id'))){
			$model=D('Article');
			$data=$_POST['name'];
			$list=$model->where("title like '%$data%'")->page($currentPage, 4)->order('created_at desc')->select();
			$count=$model->where("title like '%$data%'")->count();
			if(empty($list)){
				$this->error('没有找到所查询的内容');
			}
		}else{
			$pid=I('get.id');
		//获取当前分页
			// var_dump($pid);die;
			$model=D('Article');
			$typemodel=D('Type');
			$typelist=$typemodel->where(['id' =>$pid])->find();
			if(!empty(strpos($typelist['path'],'-'))){
				$pid=$typelist['pid'];
			}
			$list=$model->where('typeid='.$pid)->page($currentPage, 4)->order('created_at desc')->select();
			$map = 'deleted_at=0';
			$count=$model->where(['typeid'=>$pid,$map])->count();
		}

		
		$page = page($count, $currentPage, $pnum = 4, $pagenum = 5,
	    			$currenUrl = '/class?', $pagename = 'page');
        $this->assign('page', $page);
		$this->assign('list',$list);
		// $this->assign('adminUser',session('adminuser'));
		$this->display();
	} 
	// public function _initialize()
 //    {
 //        $this->assign('adminUser',session('adminuser'));
 //    }
}