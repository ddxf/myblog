<?php
namespace Admin\Controller;
use Think\Controller;
class TalkController extends CommonController{
	public function index(){
		$model=D('Talk');
		$currentPage  = isset($_GET['page']) ? $_GET['page'] : 1;

		$list = $model->where('ia_talk=0')->page($currentPage, 4)
            ->order('pid desc')
            ->select();
		$total = $model->where('ia_talk=0')->count();
 		$page  = page($total, $currentPage, $pnum = 4, $pagenum = 5,
            $currenUrl = '/Admin/talkall?', $pagename = 'page');
		$this->assign('list',$list);
		$this->assign('page',$page);
		$this->display();
	}
	//评论回复页面展示
	public function recover(){
		$model=D('Talk');
		$id=I('get.id');
		// var_dump($id);die;
		$list = $model->where('id='.$id)->find();
		$this->assign('list',$list);
		$this->display();
	}
	//插入评论
	public function insert(){
		// echo 111;
		$model=D('Talk');

		if (false === $date = $model->create()) {
            $this->error($model->getError());
        }
        // $data['recover']=$date['recover'];

        // var_dump($date['id']);die;
        //执行添加操作：
        if(false != $result =$model->where('id='.$date['id'])->field('recover')->filter('strip_tags')->save($date)) {
            //成功提示
            $this->success('新增回复成功', '/Admin/talkall');
        } else {
            //成功提示
            $this->error('新增回复失败');
        }
		// var_dump($_POST);
	}
}