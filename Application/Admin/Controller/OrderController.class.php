<?php

namespace Admin\Controller;
use Think\Controller;
class OrderController extends CommonController
{
	public function sendout()
	{
		$this->display();
	}
	
	public function update()
	{
		$order = M('order');
		$_POST['order_status'] = 2; //已发货
		$order->create();
		$order->save();
		
		$this->success('快递单号录入成功!');
	}
}

?>