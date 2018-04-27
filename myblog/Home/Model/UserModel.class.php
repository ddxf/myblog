<?php
namespace Home\Model;

use Think\Model;

class UserModel extends Model
{
    protected $_validate = array(     
        array('verifycode','require','验证码必须！'),//默认情况下用正则进行验证     
        // 在新增的时候验证name字段是否唯一    
        array('username','','帐号名称已经存在！',0,'unique',1), 
        array('password',"require",'密码应为大于8位数'),
          // 验证确认密码是否和密码一致    
        array('repassword','password','重复密码与密码不相同',0,'confirm'),
          // 自定义函数验证密码格式  
        array('password','checkPwd','密码格式不正确',0,'function'),
    );
    protected $_auto = array ( 
        array('deleted_at','0'),  // 新增的时候把status字段设置为0
        array('updated_at','0'),  // 新增的时候把status字段设置为0'update_time','time',2,'function'
        array('password','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
          //设置password 字段
        array('name','getName',1,'callback'), // 对name字段在新增的时候回调getName方法
        array('created_at','time',1,'function'), // 对create_at字段在更新的时候写入当前时间戳
 );
    public function getUserInfo($map = [])
    {
        return $this->where($map)->find();
    }
    public function getinfoline($line){
    	return $this->limit($line)->select();
    }
    public function getName($name){
        return $name;
    }
    public function getinfo($mp,$str){
    	return $this->where($mp)->limit($str)->select();
    }
}