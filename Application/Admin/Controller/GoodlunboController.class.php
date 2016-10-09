<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\CategoryTree;
use Think\Page;
use Think\Upload;
use Think\Image;
use Think\Storage\Driver\File;
use Org\Util\Auth;
class GoodlunboController extends CommonController
{
	public function index()
	{
		//判断是否超管
		//判断是否超管
		if(!in_array(session('u_UID'),explode(',',C('AUTH_SUPERADMIN'))))
		{
			//import('ORG.Util.Auth');//加载类库
			$auth =new Auth();
			if(!$auth->check(strtolower(MODULE_NAME.'-'.CONTROLLER_NAME.'-'.ACTION_NAME),session('u_UID')))
			{
				$this->error('您没有相关权限!');
			}
		}
		//判断是否超管
		
		$Model = M("goodlunbo");
		$order = 'TIME';
		$sort = 'desc';
		$count = $Model->count();
		if($count>0)
		{
			//$listRows=I('numPerPage') !='' ? I('numPerPage') : C('PAGE_LISTROWS');
			//$listRows = 5;
			//$page= new Page($count,$listRows);
			//$currentPage=I(C('VAR_PAGE')) !='' ? I(C('VAR_PAGE')) :1;
			//$currentPage=I('pageNum') !='' ? I('pageNum') :1;
			//$currentPage = 2;
			$list = $Model ->order($order.' '.$sort)->select();
			//$show = $page->show();
			//列表排序显示
			//$sortImg = $sort; //排序图标
			//$sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列'; //排序提示
			//$sort = $sort =='desc' ? 1 : 0;//排序方式
			//模板赋值
			$this->assign('list',$list);
		}
		$this->display();
	}	
	
	public function uploadify()
	{
		//图片上传处理
		$id = I('id','','htmlspecialchars');
		//$Model = M("goodlunbo");
    //$list = $User->field('FNAME,SORT,TYPE,MES_SHOW_DIV,UPTIME,DOWN_NO,SCAN_NUM,SCORE')->where($map)->cache(true)->find();
    //$list = $User->field('MODEL,FID,FNAME')->where($map)->find();
		if(!empty($_FILES))
		{
			
			$config = array(
						'key' =>'file_upload',
            'maxSize' => 3145728, 
            'rootPath'  =>'./Public/',   
            'savePath'  =>'img/loveshop/lunbo/',    
            'saveName' => $id,    
            'exts' => array('gif'),    
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
	
	//添加新的轮播信息
	public function insert()
	{
		$user=M('goodlunbo');
		$where['GOOD_ID'] = I('GOOD_ID','','htmlspecialchars');
		$where['ZONE'] =I('ZONE','','htmlspecialchars');
		$where['TIME'] = time();
			if($user->create($where))
			{
				$newuserid=$user->add();
				if($newuserid)
				{				
					$this->success('添加成功！');
				}
				else 
				{
					$this->error('添加失败！');
				}
			}
			else 
			{
				//创建数据对象失败
				$this->error($user->getError());
			}
	}
	
	public function update()
	{
		$user = M('goodlunbo');
		$data['id'] = I('id','','htmlspecialchars');
		$where['GOOD_ID'] = I('GOOD_ID','','htmlspecialchars');
		$where['ZONE'] =I('ZONE','','htmlspecialchars');
		$user->where($data)->save($where);
		//删除用户组明细表中某会员所有记录
		$this->success('编辑成功！');
	}
	
	public function foreverdelete()
	{
		//批量删除
		$Model = M("goodlunbo");
		if(!empty($Model))
		{
			$pk=$Model->getPk();
			$id=$_REQUEST[$pk];  //存放要删除的ID，可以多个
			//dump($id);
			//echo $id;
			if(isset($id))
			{
				$condition = array($pk=>array('in',explode(',',$id))); //删除条件，形如 id in 1,2,5,6....
				if($Model->where($condition)->delete())
				{
					$name = explode(',',$id);
					foreach ($name as & $value) 
					{
					    $img_path ='./Public/img/loveshop/lunbo/'.$value.'.gif';
					    $file = new File();
					    $file.unlink($img_path);
					}
					$this->success('删除成功！');
				}
				else 
				{
					$this->error('删除失败！');
				}
			}
		}
		else 
		{
			$this->error('非法操作');
		}
	}
}

?>