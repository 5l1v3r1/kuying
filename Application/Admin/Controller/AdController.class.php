<?php
namespace Admin\Controller;
use Think\Cache\Driver;
use Think\Controller;
use Org\Util\TableTree;
use Think\Upload;
use Think\Image;
use Think\Storage\Driver\File;
class AdController extends CommonController
{
	public function index()
	{
		//显示商品分类名称
		$category = M('Category');
		$this->categorylist = $category->where("cat_pid=0")->order('cat_sort')->select();
		
		//显示楼层分类名称
		$floor = M('Floor');
		$list = $floor->where("position=0 OR position=2")->order('sort')->select();
		$tableTree=new TableTree;
		$tableTree->tree($list,'id','pid','name');
		$this->floorlist=$tableTree->getArray();
		
		if(IS_POST)
		{
			$ad = M('Ad');
			$this->adlist = $ad->where("cat_id=".I('cat_id')." and floor_id=".I('floor_id')." and ad_position=".I('ad_position'))->order('ad_sort')->select();
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
		$list = $floor->where("position=0 OR position=2")->order('sort')->select();
		$tableTree=new TableTree;
		$tableTree->tree($list,'id','pid','name');
		$this->floorlist=$tableTree->getArray();
		
		$this->display();
	}
	
	public function insert()
	{
		$ad = M('Ad');
		if($_FILES)
		{
			//广告图片上传
			$config = array(
			    'savePath'   =>    '/ad/',
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
				//实例化图像类
				$image = new Image(); 
				// 上传成功 获取上传文件信息
				foreach($info as $file)
				{
		        	$_POST['ad_img'] =  $file['savepath'].$file['savename'];
		        	//生成缩略图
		        	$image->open('./Uploads'.$file['savepath'].$file['savename']);
		        	//缩略图大小设定
		        	if(I('ad_position')==5)
		        	{
		        		$width = 209;
		        		$height =155;
		        	}
		        	else if(I('ad_position')==6)
		        	{
		        		$width = 473;
		        		$height =180;
		        	}
					else if(I('ad_position')==7)
		        	{
		        		$width = 100;
		        		$height =100;
		        	}
					else if(I('ad_position')==8)
		        	{
		        		$width = 209;
		        		$height =180;
		        	}
		        	$image->thumb($width, $height,Image::IMAGE_THUMB_FILLED)->save('./Uploads'.$file['savepath'].$file['savename']);
		    	}
		    }
		}
		
		$ad->create();
		if($ad->add())
		{
			$this->success('广告添加成功！');
		}
		else
		{
			$this->error('广告添加失败！');
		}
	}
	
	public function edit()
	{
		//显示商品分类名称
		$category = M('Category');
		$this->categorylist = $category->where("cat_pid=0")->order('cat_sort')->select();
		
		//显示楼层分类名称
		$floor = M('Floor');
		$list = $floor->where("position=0 OR position=2")->order('sort')->select();
		$tableTree=new TableTree;
		$tableTree->tree($list,'id','pid','name');
		$this->floorlist=$tableTree->getArray();
		
		$this->adinf = M('Ad')->where("id=".I('id'))->find();
		
		$this->display();
	}
	
	public function update()
	{
		$ad = M('Ad');
		if(!empty($_FILES['ad_img']['name']))
		{
			//广告图片上传
			$config = array(
			    'savePath'   =>    '/ad/',
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
				//实例化图像类
				$image = new Image(); 
				// 上传成功 获取上传文件信息
				foreach($info as $file)
				{
		        	$_POST['ad_img'] =  $file['savepath'].$file['savename'];
		        	//生成缩略图
		        	$image->open('./Uploads'.$file['savepath'].$file['savename']);
		        	//缩略图大小设定
		        	if(I('ad_position')==5)
		        	{
		        		$width = 209;
		        		$height =155;
		        	}
		        	else if(I('ad_position')==6)
		        	{
		        		$width = 473;
		        		$height =180;
		        	}
					else if(I('ad_position')==7)
		        	{
		        		$width = 100;
		        		$height =100;
		        	}
					else if(I('ad_position')==8)
		        	{
		        		$width = 209;
		        		$height =180;
		        	}
		        	$image->thumb($width, $height,Image::IMAGE_THUMB_FILLED)->save('./Uploads'.$file['savepath'].$file['savename']);
		    	}
		    	//删除原广告图片
		    	$old_img = $ad->where("id=".I('id'))->getField('ad_img');
		    	$old_img_path = '.'.__ROOT__.'/Uploads'.$old_img;
		    	$file = new File();
		    	$file.unlink($old_img_path);
		    }
		}
		
		$ad->create();
		if($ad->save())
		{
			$this->success('广告修改成功！');
		}
		else
		{
			$this->error('广告修改失败！');
		}
	}
}

?>
