<?php
namespace Admin\Model;

use Think\Model;

class TypeModel extends Model
{
    public function getTypelist($currentPage, $map = [])
    {
        $list = $this->where($map)->page($currentPage, 4)
            ->order('concat(path,"-",id) asc')
            ->select();
        foreach ($list as $k => &$v) {
            //计算下-的个数
            $countG    = substr_count($v['path'], '-') + 1;
            $v['name'] = str_repeat('&nbsp', ($countG - 1) * 4) . '|--' . $v['name'];
        }

        return $list;
    }
    //根据id 拿name 值
    public function getNameById($id)
    {
        return $this->where(['id' => $id])->getField('name');
    }
    public function getTypeTotal($map = [])
    {
        return $this->where($map)->count();
    }
    public function getAllType()
    {
        $list = $this->where(['is_delete' => 0])
            ->order('concat(path,"-",id) asc')
            ->select();
        foreach ($list as $k => &$v) {
            //计算下-的个数
            $countG    = substr_count($v['path'], '-') + 1;
            $v['name'] = str_repeat('&nbsp', ($countG - 1) * 4) . '|--' . $v['name'];
        }

        return $list;
    }
    public function getPidPath($pid)
    {
        return $this->where('id=' . $pid)->getField('path');
    }
}
