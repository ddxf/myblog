<?php
namespace Admin\Controller;

use Think\Controller;

class TypeController extends CommonController
{
    //展示页面
    public function index()
    {
        //获取当前的分页
        //获取当前的分页
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        //取数据  typeModel
        $typeModel = D('Type');
        //判断一下当前是否是通过点击回收站进来
        $map = ['is_delete' => 0];
        if (I('get.isdelete') == 1) {
            $map = ['is_delete' => 1];
            $this->assign('isdelete', 1); //用于页面去判断显示哪一按钮，
        }

        $typelist = $typeModel->getTypelist($currentPage, $map);
        //根据查询出来的结果，处理一下
        //处理 父类的名称
        // var_dump($typelist);die;
        foreach ($typelist as $key => $v) {
            // var_dump($typeModel->getNameById($v['pid']));
            //给2维数组添加一个pname字段
            $typelist[$key]['pname'] = $typeModel->getNameById($v['pid']);
        }
        // var_dump($typelist);
        $total = $typeModel->getTypeTotal($map);
        // var_dump($total);die;
        $page = page($total, $currentPage, $pnum = 4, $pagenum = 5,
            $currenUrl = '/Admin/typelist?', $pagename = 'page');
        $this->assign('list', $typelist);
        $this->assign('page', $page);
        //去除列表数据，并在页面上显示
        $this->display();
    }
    //展示添加页面
    public function add()
    {
        $model    = D('Type');
        $typelist = $model->getAllType();
        $this->assign('list', $typelist);
        $this->display();
    }
    //执行添加操作
    public function insert()
    {
        //穿件数据对象
        $model = D('Type');
        //获取数据   $data
        if (false == $data = $model->create()) {
            $this->error($model->getError());
        }
        if ($data['pid'] == 0) {
            $data['path'] = 0;
        } else {
            $pidpath      = $model->getPidPath($data['pid']);
            $data['path'] = $pidpath . '-' . $data['pid'];
        }
        //往数据库里塞数据
        if ($result = $model->data($data)->add()) {
            //成功提示
            $this->success('新增类别成功', '/Admin/typelist');
        } else {
            //成功提示
            $this->error('新增类别失败' . $model->getLastSql());
        }

    }
    //展示编辑页面
    public function edit()
    {
        $model       = D('Type');
        $currentType = $model->find(I('get.id'));
        //var_dump($currentType);die;
        //取所有的类别数据，发送到木板上。
        $typelist = $model->getAllType();
        $this->assign('list', $typelist);
        $this->assign('currentType', $currentType);
        // $this->display();
        $this->display();

    }
    //执行编辑操作
    public function update()
    {
        $model = D('Type');
        //获取数据   $data
        if (false == $data = $model->create()) {
            $this->error($model->getError());
        }
        // $id=I('post.id');
        // var_dump($id);die;
        //这段就是检验某个字段值特定情况下，可以选择重新选择编辑
        if ($data['pid'] == 0) {
            $data['path'] = 0;
        } else {
            $pidpath      = $model->getPidPath($data['pid']);
            $data['path'] = $pidpath . '-' . $data['pid'];
        }
        //往数据库里塞数据
        if (false != $model->data($data)->save()) {
            //成功提示
            $this->success('编辑成功', '/Admin/typelist');
        } else {
            //成功提示
            $this->error('编辑失败' . $model->getLastSql());
        }
    }
    //执行单个删除操作
    public function delete()
    {
        $model = D('Type');
        $id    = I('get.id');
        // var_dump($id);die;
        if (false == $model->where('id=' . $id)->setField('is_delete', 1)) {
            $this->error("删除失败");
        } else {
            $this->success("删除成功");
        };
    }
    //执行多个删除操作
    public function deletes()
    {
        // var_dump($_POST);
        $model = D('Type');
        $idArr = I('post.id');
        // var_dump($idArr);
        $map['id'] = array('in', $idArr);
        if (false != $model->where($map)->setField('is_delete', 1)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
    public function recovery()
    {
        $model = D('Type');
        $id    = I('get.id');
        if (false != $model->where(['id' => $id])->setField('is_delete', 0)) {
            $this->success('恢复成功');
        } else {
            $this->error('恢复失败');
        }
    }

}
