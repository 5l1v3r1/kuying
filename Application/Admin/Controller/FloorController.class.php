<?php
namespace Admin\Controller;
use Think\Controller;
class FloorController extends CommonController
{
	public function index()
	{
		//显示楼层分类名称
		$floor = M('Floor');
		$this->floorlist = $floor->where("pid=0")->order('sort')->select();
		
		if(IS_POST)
		{
			$this->list = $floor->where("pid=".I('id'))->order('sort')->select();
			$this->floor_id = I('id');
		}
		
		$this->display();
	}
	
	public function add()
	{
		//显示楼层分类名称
		$floor = M('Floor');
		$this->floorlist = $floor->where("pid=0")->order('sort')->select();
		$this->display();
	}
	
	public function searchCategory()
	{
		$category = M('Category');
		$this->categorylist = $category->where("cat_pid=0")->order('cat_sort')->select();
		
		if(IS_POST)
		{
			$category = D('Category');
			$this->node = $category->where("cat_pid=".I('id'))->order('cat_sort')->relation(true)->select();
			$this->id = I('id');
		}
		
		$this->display();
	}
	
	public function insert()
	{
		$floor = M('Floor');
		$_POST['name'] = I('group_groupName');
		$_POST['url'] = I('group_attrId');
		$floor->create();
		if($floor->add())
		{
			$this->success('楼层分类添加成功！');
		}
		else
		{
			$this->error('楼层分类添加失败！');
		}
	}
	
	public function edit()
	{
		//显示楼层分类名称
		$floor = M('Floor');
		$this->floorlist = $floor->where("pid=0")->order('sort')->select();
		
		$this->floorinf= $floor->where("id=".I('id'))->find();
		
		$this->display();
	}
	
	public function update()
	{
		$floor = M('Floor');
		$_POST['name'] = I('group_groupName');
		$_POST['url'] = I('group_attrId');
		$floor->create();
		if($floor->save())
		{
			$this->success('楼层分类编辑成功！');
		}
		else
		{
			$this->error('楼层分类编辑失败！');
		}
	}
}

?>