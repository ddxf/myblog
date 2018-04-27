<?php
namespace Admin\Model;
use Think\Model;
use Admin\Model\TypeModel;
class ArticleModel extends Model{
	public function getArticlelist($currentPage,$map=[]){
		//获取当前分页
		 $typeModel = new TypeModel;
        $list = $this->where($map)->page($currentPage,4)
                ->order('id desc')
                ->select();
       foreach($list as $key=>$value)
       {
            $list[$key]['typename'] = $typeModel->getNameById($value['typeid']);
       }  
        return $list;
	}
	 //获取文章总数
    public function getArticleTotal($map=[])
    {
         return $this->where($map)->count();
    }
}
