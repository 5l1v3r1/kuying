<?php
namespace Admin\Controller;
use Think\Controller;
class AuthGroupController extends CommonController
{
	//添加用户组
	public function insert()
	{
		$authrule=M('AuthGroup');
		$where['title']=array('eq',I('title')); //不受模糊查询字段名限制
		if($authrule->where($where)->count())
		{
			$this->error('此用户组已存在!');
		}
		else 
		{
			if($authrule->create())
			{
				if($authrule->add())
				{
					//添加成功
					$this->success('新用户组添加成功！');
				}
				else 
				{
					$this->error('新用户组添加失败！');
				}
			}
			else 
			{
				//创建数据对象失败
				$this->error($authrule->getError());
			}
		}
	}
	
	public function setRule()
	{
		$authrule=M('AuthRule');
		$list=$authrule->order('sort')->select();
		//将数组以树型排列，分三层
		$this->node = $this->list_to_tree($list);
		
		//加载时勾选
		$id=I('id');
		$authgroup=M('AuthGroup');
		$this->selectdnode=$authgroup->where('id='.$id)->select();
		
		
		$this->display();
	}
	
	public function list_to_tree($list)
	{
		//创建基于主键的数组引用
		foreach ($list as $key => $data)
		{
			$refer[$data['id']]=& $list[$key]; //& 为引用，取出list[$key]的内存地址
		}
		//构建三层树 数组
		foreach  ($list as $key => $data)
		{
			$pid=$data['pid'];
			if($pid==0)
			{
				$tree[]=& $list[$key]; //没有父节点的情况，取出第一层，放入$tree
			}
			else 
			{
				if(isset($refer[$pid]))
				{
					//重点难点。有父节点为二三层，实现的效果就是将其加入父节点之下
					$parent = & $refer[$pid]; //将其父节点内存地址赋予一个变量名称
					$parent['_child'][]=& $list[$key]; //在刚刚赋予的变量名称里加入子数组_child
				}
			}
		}
		
		return $tree;
	}
	
	public function updateGroup()
	{
		//将数据合并成字符串
		$rules = implode(',',I('rule_id'));
		
		$authgroup=M('AuthGroup');
		$data['id']=I('ruleid');
		$data['rules']=$rules;
		$authgroup->save($data);
		$this->success('规则分配成功.');
	}
}

?>