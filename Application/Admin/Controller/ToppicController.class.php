<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\CategoryTree;
use Think\Page;
use Think\Upload;
use Think\Image;
use Think\Storage\Driver\File;
class ToppicController extends CommonController
{
	public function index()
	{
		//判断是否超管
		$this->display();
	}	
	
	public function uploadify()
	{
		//图片上传处理
		$id = I('id','','htmlspecialchars');
		//$Model = M("lunbo");
		//$map['FID'] = $id;
    //$list = $User->field('FNAME,SORT,TYPE,MES_SHOW_DIV,UPTIME,DOWN_NO,SCAN_NUM,SCORE')->where($map)->cache(true)->find();
    //$list = $User->field('MODEL,FID,FNAME')->where($map)->find();
		if(!empty($_FILES))
		{
			
			$config = array(
						'key' =>'file_upload',
            'maxSize' => 3145728, 
            'rootPath'  =>'./Public/',   
            'savePath'  =>'img/BTzone/',    
            'saveName' => $id,    
            'exts' => array('gif'),    
            'autoSub' => false, 
            'replace' => true,   
            //'subName' => array('date','Ymd'),
        );
			$upload = new Upload($config);// 实例化上传类
			if($id == 5)
			{
				$upload->savePath ='img/index/enter/';
				$upload->saveName = 'bg';
			}
			$info   =   $upload->upload();
			if(!$info) 
			{
		    	echo $upload->getError(); // 上传错误提示错误信息
			}
			else
			{
				//echo  $info['savename'];
				foreach($info as $file)
				{
        	echo $file['savepath'].$file['savename'];
    		}
				//dump ($info);
				//
				//实例化商品图片表
				
				// 上传成功 获取上传文件信息
			}
		}
	}
	
	public function delimg()
	{
		//删除图片
    	$img_path ='./Public/'.I('name');
    	$file = new File();
    	if($file.unlink($img_path))
    	{
    		//同时删除数据库信息
    		//$goodsimg = M('Goodsimg');
    		//$goodsimg->where("goods_img='".I('name')."'")->delete();
    		
    		$this->success("图片删除成功!");
    	}
    	else
    	{
    		$this->success("图片删除失败!");
    	}
	}
	
	
	public function foreverdelete()
	{
		//批量删除
		$id = I('id','','htmlspecialchars');
		$img_path ='./Public/img/BTzone/'.$id.'.gif';
    $file = new File();
    if($file.unlink($img_path))
  	{
  		//同时删除数据库信息
  		//$goodsimg = M('Goodsimg');
  		//$goodsimg->where("goods_img='".I('name')."'")->delete();
  		
  		$this->success("图片删除成功!");
  	}
  	else
  	{
  		$this->success("图片删除失败!");
  	}
	}
	public function uploadifymusic()
	{
		//图片上传处理
		//$Model = M("lunbo");
		//$map['FID'] = $id;
    //$list = $User->field('FNAME,SORT,TYPE,MES_SHOW_DIV,UPTIME,DOWN_NO,SCAN_NUM,SCORE')->where($map)->cache(true)->find();
    //$list = $User->field('MODEL,FID,FNAME')->where($map)->find();
		
		if(!empty($_FILES))
		{
			$config = array(
						'key' =>'file_uploads',
            'rootPath'  =>'./Public/',   
            'savePath'  =>'music/',    
            'saveName' => 'enter',    
            'exts' => array('mp3'),    
            'autoSub' => false, 
            'replace' => true,   
            //'subName' => array('date','Ymd'),
        );
			$upload = new Upload($config);// 实例化上传类
			$info   =   $upload->upload();
			if(!$info) 
			{
		    	echo $upload->getError(); // 上传错误提示错误信息
			}
			else
			{
				//echo  $info['savename'];
				foreach($info as $file)
				{
					echo "背景音乐上传成功";
        	//echo $file['savePath'].$file['saveName'];
    		}
				//dump ($info);
				//
				//实例化商品图片表
				
				// 上传成功 获取上传文件信息
			}
		}
	}
}

?>