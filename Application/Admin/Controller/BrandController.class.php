<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
use Think\Storage\Driver\File;
class BrandController extends CommonController
{
	public function index()
	{
		//显示商品分类名称
		$category = M('Category');
		$this->categorylist = $category->where("cat_pid=0")->order('cat_sort')->select();
		
		//显示楼层分类名称
		$floor = M('Floor');
		$this->floorlist = $floor->where("pid=0")->order('sort')->select();
		
		if(IS_POST)
		{
			$brand = M('Brand');
			$this->list = $brand->where("cat_id=".I('cat_id')." and floor_id=".I('floor_id'))->order('brand_sort')->select();
			$this->cat_id = I('cat_id');
			$this->floor_id = I('floor_id');
		}
		
		$this->display();
	}
	
	public function add()
	{
		//显示商品分类名称
		$category = M('Category');
		$this->categorylist = $category->where("cat_pid=0")->order('cat_sort')->select();
		
		//显示楼层分类名称
		$floor = M('Floor');
		$this->floorlist = $floor->where("pid=0")->order('sort')->select();
		
		$this->display();
	}
	
	public function edit()
	{
		//显示商品分类名称
		$category = M('Category');
		$this->categorylist = $category->where("cat_pid=0")->order('cat_sort')->select();
		
		//显示楼层分类名称
		$floor = M('Floor');
		$this->floorlist = $floor->where("pid=0")->order('sort')->select();
		
		$this->brandinf = M('Brand')->where("id=".I('id'))->find();
		
		$this->display();
	}
	
	public function insert()
	{
		$brand = M('Brand');
		if($_FILES)
		{
			//品牌LOGO上传
			$config = array(
			    'savePath'   =>    '/brand/',
			    'saveName'   =>    array('date','YmdHis'),
			    'exts'       =>    array('jpg', 'gif', 'png'),
			    'autoSub'    =>    true,
			    'subName'    =>    array('date','Y-m'),
			);
			$upload = new Upload($config);// 实例化上传类
			$info   =   $upload->upload();
			if(!$info) 
			{
				// 上传错误提示错误信息
		    	$this->error($upload->getError());
			}
			else
			{
				// 上传成功 获取上传文件信息
				foreach($info as $file)
				{
		        	$_POST['brand_logo'] =  $file['savepath'].$file['savename'];
		    	}
		    }
		}
		
		$brand->create();
		if($brand->add())
		{
			$this->success('品牌添加成功！');
		}
		else
		{
			$this->error('品牌添加失败！');
		}
	}
	
	public function update()
	{
		$brand = M('Brand');
		if(!empty($_FILES['brand_logo']['name']))
		{
			//品牌LOGO上传
			$config = array(
			    'savePath'   =>    '/brand/',
			    'saveName'   =>    array('date','YmdHis'),
			    'exts'       =>    array('jpg', 'gif', 'png'),
			    'autoSub'    =>    true,
			    'subName'    =>    array('date','Y-m'),
			);
			$upload = new Upload($config);// 实例化上传类
			$info   =   $upload->upload();
			if(!$info) 
			{
				// 上传错误提示错误信息
		    	$this->error($upload->getError());
			}
			else
			{
				// 上传成功 获取上传文件信息
				foreach($info as $file)
				{
		        	$_POST['brand_logo'] =  $file['savepath'].$file['savename'];
		    	}
		    	//删除原品牌LOGO
		    	$old_logo = $brand->where("id=".I('id'))->getField('brand_logo');
		    	$old_logo_path = '.'.__ROOT__.'/Uploads'.$old_logo;
		    	$file = new File();
		    	$file.unlink($old_logo_path);
		    }
		}
		
		$brand->create();
		if($brand->save())
		{
			$this->success('品牌修改成功！');
		}
		else
		{
			$this->error('品牌修改失败！');
		}
	}
}

?>