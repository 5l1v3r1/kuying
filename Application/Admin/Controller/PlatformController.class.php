<?php
namespace Admin\Controller;
use Think\Controller;
class PlatformController extends CommonController
{
	public function index()
	{
		//支付平台首页
		$platform = M('Platform');
		$this->list = $platform->select();
		
		$this->display();
	}
	
	public function add()
	{
		$this->display();
	}
	
	public function insert()
	{
		if(IS_POST)
		{
			$platform = M('Platform');
			if(I('status') == 1)
			{
				//如果是默认支付平台，先将其它平台设为非默认
				$platform->where('status=1')->setField('status',0);
			}
			$platform->create();
			if($platform->add())
			{
				$this->success('支付平台添加成功！');
			}
			else
			{
				$this->error('支付平台添加失败！');
			}
		}
	}
	
	public function edit()
	{
		$platform = M('Platform');
		$this->vo = $platform->where("id=".I('id'))->find();
		
		$this->display();
	}
	
	public function update()
	{
		if(IS_POST)
		{
			$platform = M('Platform');
			if(I('status') == 1)
			{
				//如果是默认支付平台，先将其它平台设为非默认
				$platform->where('status=1')->setField('status',0);
			}
			else 
			{
				//检查其它支付平台中有无默认
				$num = $platform->where("status=1 and id!=".I('id'))->count();
				if($num != 1)
				{
					$this->error('请选确定默认支付平台！');
				}
			}
			$platform->create();
			if($platform->save())
			{
				$this->success('支付平台编辑成功！');
			}
			else
			{
				$this->error('支付平台编辑失败！');
			}
		}
	}
	
	public function changeDefault()
	{
		if(IS_POST)
		{
			$platform = M('Platform');
			//将当前支付平台设为默认
			$platform->where("id=".I('id'))->setField('status',1);
			//将其它支付平台设为非默认
			$platform->where("id!=".I('id'))->setField('status',0);
			$data['result'] = 1;
			
			$this->ajaxReturn($data);
		}
	}
	
}

?>