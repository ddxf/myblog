<?php
namespace Home\Controller;
use Think\Controller;
class ListController extends Controller {
    public function new_list(){
    	$model=D('Article');
    	$id=I('get.id');
    	// var_dump($id);die;
    	$dlist=$model->where('id='.$id)->find();
        $model->where('id='.$id)->setInc('hits');
        $talkmodel=D('talk');
        $datalist=$talkmodel->returnlist($id);
        $count['id']=$talkmodel->where('pid='.$id)->count();
        // var_dump($count);die;
        $this->assign('list',$datalist);
    	// var_dump($dlist);die;
        
    	$this->assign('dlist',$dlist);
        $this->assign('count',$count);
        // $this->assign('adminUser',session('adminuser'));
        $this->display();
    }
    //插入评论
    public function insert(){
        //提取文章的id号
         $pid=I('get.id');
         //调用talk表
         $model=D('Talk');
         if (false == $data = $model->create()) {
            $this->error($model->getError());
        } 
         // echo 1;die;
        //给talk表添加pid
         $data['pid']=$model->getId($pid);
         $data['datetime']=time();     
        


        //判断是否登录，不登录不能够评论
        if (!session('adminuser')) {
               // echo $pid;die;
            $this->redirect('/Home/login');
        }

       if ($result = $model->data($data)->add()) {
        //成功提示
        // session('adminuser',$userInfo);
            $this->success('评论成功');
        } else {
        //成功提示s
             $this->error('评论失败' . $articleModel->getLastSql());
        }
       
    }
}