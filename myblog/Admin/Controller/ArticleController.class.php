<?php
namespace Admin\Controller;

use Think\Controller;

class ArticleController extends CommonController
{
    //展示列表页
    public function index()
    {
        $currentPage  = isset($_GET['page']) ? $_GET['page'] : 1;
        $articleModel = D('Article');

        $map  = ['deleted_at' => 0];
        if (I('get.isdelete') == 1) {
            $map = ['deleted_at' => 1];
            $this->assign('isdelete', 1); //用于页面去判断显示哪一按钮，
        }

        $list = $articleModel->getArticlelist($currentPage, $map);

        $total = $articleModel->getArticleTotal($map);
        $page  = page($total, $currentPage, $pnum = 4, $pagenum = 5,
            $currenUrl = '/Admin/articlelist?', $pagename = 'page');

        //获取文章数据，并在页面上显示
        $this->assign('list', $list);
        $this->assign('page', $page);
        $this->display();
    }
    //展示添加页面
    public function add()
    {

        $typeModel = D('Type');
        $typelist  = $typeModel->getAllType();

        $this->assign('typelist', $typelist);
        $this->display();
    }
    //执行添加操作
    public function insert()
    {
        $articleModel = D('Article');
        //创建数据对象
        if (false === $data = $articleModel->create()) {
            $this->error($articleModel->getError());
        }
        //加一步文件上传操作处理
        $file               = A('File');
        $savePath           = $file->uploadOneImage('cover');
        $data['cover']      = '/Public/uploads/' . $savePath;
        $data['created_at'] = time();
        //执行添加操作：
        if ($result = $articleModel->data($data)->add()) {
            //成功提示
            $this->success('新增文章成功', '/Admin/articlelist');
        } else {
            //成功提示
            $this->error('新增文章失败' . $articleModel->getLastSql());
        }

    }

    //展示编辑页面
    public function edit()
    {
        // var_dump($_GET);
        $id = I('get.id');
        // var_dump($id);
        $model = D('Article');
//echo 111;die;
        //获取文章信息
        $currentArticle = $model->find($id);
        //获取类别信息
        $typeModel = D('Type');
        $typelist  = $typeModel->getAllType();
        //展示到页面上
        $this->assign('currentArticle', $currentArticle);
        $this->assign('typelist', $typelist);
        $this->display();
    }

    //执行编辑操作
    public function update()
    {
        // echo 1111;
        $articleModel = D('Article');
        //创建数据对象
        if (false === $data = $articleModel->create()) {
            $this->error($articleModel->getError());
        }
        // var_dump($data);die;
        // var_dump($_FILES['cover']['error']);die;
        if ($_FILES['cover']['error'] != 4) {
            //加一步文件上传操作处理()
            $file          = A('File');
            $savePath      = $file->uploadOneImage('cover');
            $data['cover'] = '/Public/Uploads/' . $savePath;
        }
        $data['updated_at'] = time();
        // $result = $articleModel->data($data)->save();
        // var_dump($articleModel->getLastSql());
        //执行添加操作：
        // var_dump($data);die;
        if ($result = $articleModel->data($data)->save()) {
            //成功提示
            $this->success('编辑文章成功', '/Admin/articlelist');
        } else {
            //成功提示
            $this->error('编辑文章失败' . $articleModel->getLastSql());
        }
    }
    //执行删除操作
    public function delete()
    {
        $id = I('get.id');
        // var_dump($id);
        $model = D('Article');
         if (false == $model->where('id=' . $id)->setField('deleted_at', 1)) {
            $this->error("删除失败");
        } else {
            $this->success("删除成功");
        };

    }
    //执行批量操作
    public function deletes()
    {
        $model = D('Article');
        $idArr = I('post.id');
        // var_dump($idArr);die;
        $mp['id']  = array('in',$idArr);
        if (false == $model->where($mp)->setField('deleted_at', 1)) {
            $this->error("删除失败");
        } else {
            $this->success("删除成功");
        };
    }
    //恢复删除的类别
    public function recovery()
    {
        $model = D('Article');
        $id    = I('get.id');
        var_dump($id);die;
        if (false != $model->where(['id' => $id])->setField('deleted_at', 0)) {
            $this->success('恢复成功');
        } else {
            $this->error('恢复失败');
        }

    }

}
