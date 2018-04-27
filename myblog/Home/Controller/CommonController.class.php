<?php
namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller
{

    public function _initialize()
    {
        if (!session('adminuser')) {
            $this->redirect('/Home/login');
        }else{
        	$this->assign('adminUser',session('adminuser'));
        }
    }

}
