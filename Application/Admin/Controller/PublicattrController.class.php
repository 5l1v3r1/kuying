<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\TableTree;
use Org\Util\CategoryTree;
class PublicattrController extends CommonController
{
	public function index()
	{
		//显示全部商品分类名称
		$category = M('Category');
		$categorylist = $category->order('cat_sort')->select();

		$categoryTree=new CategoryTree;
		$categoryTree->tree($categorylist);
		$this->categorylist=$categoryTree->getArray();
		
		if(IS_POST)
		{
			$publicattr = M('Publicattr');
			$where['cat_id'] = I('cat_id');
			$list = $publicattr->where($where)->order('sort asc')->select();
			
			$tableTree=new TableTree;
			$tableTree->tree($list);
			$this->list=$tableTree->getArray();
			
			$this->cat_id = I('cat_id');
		}
		
		$this->display();
	}
	
	public function add()
	{
		//显示全部商品分类名称
		$category = M('Category');
		$categorylist = $category->order('cat_sort')->select();

		$categoryTree=new CategoryTree;
		$categoryTree->tree($categorylist);
		$this->categorylist=$categoryTree->getArray();
		
		$this->display();
	}
	
	public function edit()
	{
		//显示全部商品分类名称
		$category = M('Category');
		$categorylist = $category->order('cat_sort')->select();

		$categoryTree=new CategoryTree;
		$categoryTree->tree($categorylist);
		$this->categorylist=$categoryTree->getArray();
		
		$publicattr = M('Publicattr');
		$attr = $publicattr->where('id='.I('id'))->find();
		$this->cat_id = $attr['cat_id'];
		
		//初始化加载父类属性名
		$where['cat_id'] = $attr['cat_id'];
		$where['pid'] = 0;
		$attrlist = $publicattr->where($where)->field('id,title')->select();
		
		$result = Array();
		$result[] = array('0','顶层');
		foreach($attrlist as $v)
		{
			$result[] = array($v['id'],$v['title']);
		}
		$this->attrlist = $result;
		$this->pid = $attr['pid'];
		
		$this->attr = $attr;
		
		$this->display();
	}
	
	public function returnAttr()
	{
		$publicattr = M('Publicattr');
		$where['cat_id'] = $_REQUEST['cat_id'];
		$where['pid'] = 0;
		$list = $publicattr->where($where)->field('id,title')->select();
		
		$result = Array();
		$result[] = array('0','顶层');
		foreach($list as $v)
		{
			$result[] = array($v['id'],$v['title']);
		}
		
		//$result = array(array('0','顶层'),array('1','品牌'),array('7','价格'),array('15','尺寸'),array('24','处理器'));
		echo json_encode($result);
	}
	
	public function insert()
	{
		$publicattr = M('Publicattr');
		if($publicattr->create())
		{
			if($publicattr->add())
			{
				$this->success('公共属性添加成功！');
			}
			else 
			{
				$this->error('公共属性添加失败！');
			}
		}
		else 
		{
			$this->error($publicattr->getError());
		}
	}
	
	public function update()
	{
		$publicattr = M('Publicattr');
		if($publicattr->create())
		{
			if($publicattr->save())
			{
				$this->success('公共属性编辑成功！');
			}
			else 
			{
				$this->error('公共属性编辑失败！');
			}
		}
		else 
		{
			$this->error($publicattr->getError());
		}
	}
}

?>