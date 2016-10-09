<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\TableTree;
use Org\Util\Auth;
class AuthRuleController extends CommonController
{
	public function index()
	{
		//判断是否超管
		if(!in_array(session('uid'),explode(',',C('AUTH_SUPERADMIN'))))
		{
			//import('ORG.Util.Auth');//加载类库
			$auth =new Auth();
			if(!$auth->check(strtolower(MODULE_NAME.'-'.CONTROLLER_NAME.'-'.ACTION_NAME),session('uid')))
			{
				$this->error('您没有相关权限!');
			}
		}

		$authrule=M('AuthRule');
		$list=$authrule->order('sort')->select();
		
		import('ORG.Util.TableTree');
		$tableTree=new TableTree;
		$tableTree->tree($list);
		$this->list=$tableTree->getArray();
		
		//dump($list);
		
		$this->display();
	}
	
	//添加规则
	public function insert()
	{
		$authrule=M('AuthRule');
		$where['name']=I('name');
		if($authrule->where($where)->count())
		{
			$this->error('此规则已存在!');
		}
		else 
		{
			if($authrule->create())
			{
				$data['name']=I('name');
				$data['title']=I('title');
				$data['status']=I('status');
				$data['condition']=I('condition');
				$data['pid']=I('pid');
				$data['isnavshow']=I('isnavshow');
				$data['sort']=I('sort');
				
				//求出新增规则的level，为其上一层level+1
				$id=I('pid');
				if($id==0)
				{
					$data['level']=1;
				}
				else 
				{
					$data['level']=$authrule->where('id='.$id)->getField('level')+1;
				}
				
				if($authrule->add($data))
				{
					//添加成功
					$this->success('新规则添加成功！');
				}
				else 
				{
					$this->error('新规则添加失败！');
				}
			}
			else 
			{
				//创建数据对象失败
				$this->error($authrule->getError());
			}
		}
	}
	
	//添加新规则
	public function add()
	{
		$authrule=M('AuthRule');
		$list=$authrule->order('sort')->select();
		
		import('ORG.Util.TableTree');
		$tableTree=new TableTree;
		$tableTree->tree($list);
		$this->list=$tableTree->getArray();
		
		$this->display();
	}
	
	//编辑
	public function edit()
	{
		$authrule=M('AuthRule');
		$list=$authrule->order('sort')->select();
		
		import('ORG.Util.TableTree');
		$tableTree=new TableTree;
		$tableTree->tree($list);
		$this->list=$tableTree->getArray();
		
		$vo=$authrule->find(I('id'));
		$this->assign('vo',$vo);
		$this->display();
	}
	
	//更新
	public function update()
	{
		$authrule=M('AuthRule');
		if(!$authrule->create())
		{
			$this->error($authrule->getError());
		}
		else 
		{
			$data['id']=I('id');
			$data['name']=I('name');
			$data['title']=I('title');
			$data['status']=I('status');
			$data['condition']=I('condition');
			$data['pid']=I('pid');
			$data['isnavshow']=I('isnavshow');
			$data['sort']=I('sort');
			
			//求出新增规则的level，为其上一层level+1
			$id=I('pid');
			if($id==0)
			{
				$data['level']=1;
			}
			else 
			{
				$data['level']=$authrule->where('id='.$id)->getField('level')+1;
			}
			if($authrule->save($data))
			{
				$this->success('编辑成功！');
			}
			else 
			{
				$this->error('编辑失败！');
			}
		}
	}
}

?>