<?php
namespace Home\Model;

use Think\Model;

class TypeModel extends Model{
	public function getlists($map){
		return $this->where($map)->select();
		// foreach ($listss as $key => $value) {

		// }
	}
}