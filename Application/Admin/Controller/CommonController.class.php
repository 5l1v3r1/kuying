<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Org\Util\Auth;
class CommonController extends Controller
{
	public $map; //查询条件
	public $model; //实例化对象
	
	public function _initialize()
	{
		//如果I('uid')等于0，说明不是uploadify上传，不适合每次新增session都要改上传页模板
		//故作如下调整
		
		//判断是否超管
		if(!in_array(session('u_UID'),explode(',',C('AUTH_SUPERADMIN'))))
		{
			//import('ORG.Util.Auth');//加载类库
			$auth =new Auth();
			if(!$auth->check("admin-index",session('u_UID')))
			{
				$this->error('您没有进入后台的权限!');
			}
		}
	}
	
	public function index()
	{
		//判断是否超管
		$uu_uid = session('u_UID');
		$uu_username = session('u_username');
		if(!((session('u_UID') != null||!empty($uu_uid))&& (session('u_username') != null||!empty($uu_username))))
    	{
    		$this->error('您没有进入后台的权限!');
    	}
		if(!in_array(session('u_UID'),explode(',',C('AUTH_SUPERADMIN'))))
		{
			//import('ORG.Util.Auth');//加载类库
			$auth =new Auth();
			if(!$auth->check(strtolower(MODULE_NAME.'-'.CONTROLLER_NAME.'-'.ACTION_NAME),session('u_UID')))
			{
				$this->error('您没有相关权限!');
			}
		}

		$name = CONTROLLER_NAME; //获取模块名，通用
		$notAuth = in_array($name,explode(',',C('NOT_M_MODULE')));
		if(!$notAuth)
		{
			if($name == "User")
			{
				$name = "userinfo";
			}else if($name == "Hdbd")
			{
				$name = "hdbd";
			}else if($name == "Hdfilm")
			{
				$name = "hdfilm";
			}else if($name == "Hdzy")
			{
				$name = "hdzy";
			}else if($name == "Hdju")
			{
				$name = "hdju";
			}
			$this->model = M($name);
			$this->map=$this->_search($name); //生成Map查询对象
			$this->_list();
		}
		//echo $name;
		$this->display();
	}
	
	public function _search($name)
	{
		$fields = $this->model->getDbFields();
		//dump($fields);
		//此处用于单个文本框搜索 user列表中用不到，通用方法
		foreach ($fields as $key => $val)
		{
			if(I($val) != '')
			{
				$map[$val]=I($val);
			}
		}
		//适用下拉选择
		if(I('keytype')!='')
		{
			$map[I('keytype')]=I('keyword');
		}
		return $map;
	}
	
	//数据显示及分页
	public function _list()
	{
		//排序字段，默认为主键名
		$order = I('_order') !='' ? I('_order') : $this->model->getPk();
		//排序方式，默认倒序排列，首次显示时因为不会接收到提交数据，所以都是显示的默认值
		$sort = I('_sort') == 'asc' ? 'asc' : 'desc';
		//取得记录数
		$count=$this->model->where($this->map)->count();
		if($count>0)
		{
			import('ORG.Util.Page');// 导入分页类
			//创建分页对象 $listRows为每页显示的行数 numPerPage现在还没有定义
			$listRows=I('numPerPage') !='' ? I('numPerPage') : C('PAGE_LISTROWS');
			$page= new Page($count,$listRows);// 实例化分页类 传入总记录数和每页显示的记录数
			//当前页数
			$currentPage=I('pageNum') !='' ? I('pageNum') :1;
			// 进行分页数据查询
			$list = $this->model->where($this->map)->order($order.' '.$sort)->page($currentPage.','.$listRows)->select();
			$show = $page->show();// 分页显示输出
			
			//列表排序显示
			$sortImg = $sort; //排序图标
			$sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列'; //排序提示
			$sort = $sort =='desc' ? 1 : 0;//排序方式
			//模板赋值
			$this->assign('list',$list);
			$this->assign('sort',$sort);
			$this->assign('order',$order);
			$this->assign('sortImg',$sortImg);
			$this->assign('sortType',$sortAlt);
			$this->assign('page',$show); //分页输出
			$this->assign('totalCount',$count);
			$this->assign('numPerPage',$listRows);
			$this->assign('currentPage',$currentPage);
		}
		//import("ORG.Util.Cookie");
		//Cookie::set('_currentUrl_',__SELF__);
		return;
	}
	
	public function add()
	{
		$this->display();
	}
	
	public function foreverdelete()
	{
		//批量删除
		$name=CONTROLLER_NAME;
		if($name == "User")
		{
			$this->model = M("userinfo");
		}else if($name == "Hdfilm")
		{
			$this->model=M("hdfilm");
		}
		else if($name == "Hdzy")
		{
			$this->model=M("hdzy");
		}else if($name == "Hdju")
		{
			$name = "hdju";
		}else if($name == "Hdbd")
		{
			$name = "hdbd";
		}
		if(!empty($this->model))
		{
			$pk=$this->model->getPk();
			$id=$_REQUEST[$pk];  //存放要删除的ID，可以多个
			
			if(isset($id))
			{
				$condition = array($pk=>array('in',explode(',',$id))); //删除条件，形如 id in 1,2,5,6....
				if($this->model->where($condition)->delete())
				{
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
	
	//编辑
	public function edit()
	{
		$name=CONTROLLER_NAME;
		if($name == "User")
		{
			$this->model = M("userinfo");
		}else
		{
			$this->model=M($name);
		}
		$vo=$this->model->find(I('id'));
		$this->assign('vo',$vo);
		$this->display();
	}
	
	//更新
	public function update()
	{
		$name=CONTROLLER_NAME;
		if($name == "User")
		{
			$this->model = M("userinfo");
		}else
		{
			$this->model=M($name);
		}
		if(!$this->model->create())
		{
			$this->error($this->model->getError());
		}
		else 
		{
			if($this->model->save())
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