<?php
namespace Admin\Controller;
use Think\Controller;
class FileController extends \Think\Controller
{
    //上传一张图片
    public function uploadOneImage($inputName)
    {
          
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      './Public/Uploads/'; // 设置附件上传根目录
    // 上传单个文件 
        $info   =   $upload->uploadOne($_FILES[$inputName]);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
             return  $info['savepath'].$info['savename'];
        }
    }
    
    public function uploadEditorImage()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      './Public/Uploads/editor/'; // 设置附件上传根目录
    // 上传文件 
       $info   =   $upload->upload();
       if(!$info) {// 上传错误提示错误信息
           exit(json_encode(array('error' => 1, 'message' => $upload->getError())));
          // $this->error($upload->getError());
       }else{// 上传成功
            $file_url = '/Public/Uploads/editor/'. $info["imgFile"]["savepath"].$info["imgFile"]["savename"];
            //var_dump($file_url);die;
            echo json_encode(array('error' => 0, 'url' => $file_url));
           exit;
      //$this->success('上传成功！');
       }
    }
}

