<?php

namespace Home\Model;
use Think\Model;
class TalkModel extends Model{
	protected $_validate = array(
         array('name','require','姓名(name)必须填写'),  // 对name字段在新增必须填写         
       	array('email','require','邮箱必须填！'), // 对update_time字段在更新的时候写入当前时间戳
    );
    public function getId($pid){
    	return $pid;
    }
    public function returnlist($id){
     return $this->where('pid='.$id)->select();
    }
}