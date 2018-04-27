<?php
namespace Home\Controller;
use Think\Controller;
class PersonController extends Controller{
	public function index(){
		// $this->assign('adminUser',session('adminuser'));
		$this->display();
	}
}