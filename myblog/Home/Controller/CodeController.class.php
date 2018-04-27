<?php
namespace Home\Controller;
use Think\Controller;
class CodeController extends Controller {
   //显示验证码
    public function showCode()
   {
        $Verify =     new \Think\Verify();
        ob_clean();//防止验证码不显示
        $Verify->fontSize = 90;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->entry();
       
   }
}