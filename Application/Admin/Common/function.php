<?php

function getKey($key)
{
	$str1=substr($key,0,3);
	$str2=substr($key,-3,3);
	return $str1.'******'.$str2;
}

//根据会员ID获取会员名
function getUserName($uid)
{
	return M('User')->where("id=".$uid)->getField('username');
}

//获取收货地址信息，此外亦可用弹出框显示
function getAddress($id)
{
	$address = M("Address");
	$info = $address->where("id=".$id)->find();
	//获取地区名
	$area = M('Area');
	$info['province']=$area->where("id=".$info['province'])->getField("areaname");
	$info['city']=$area->where("id=".$info['city'])->getField("areaname");
	$info['county']=$area->where("id=".$info['county'])->getField("areaname");
	return $info['realname'].' '.$info['province'].$info['city'].$info['county'].$info['address'].' '.$info['mobile'];
}

//获取订单商品
function getOrdergoods($id)
{
	$ordergoods = M('ordergoods');
	$goodslist = $ordergoods->where("order_id=".$id)->select();
	
	$goods = M('goods');
	$test = ''; //返回信息
	foreach ($goodslist as $value)
	{
		$goods_name = $goods->where('id='.$value['goods_id'])->getField('goods_name');
		if($test == '')
		{
			//首条数据
			$test = $goods_name.' '.$value['goods_price'].'元  * '.$value['goods_number'];
		}
		else 
		{
			$test = $test . '<br/>'.$goods_name.' '.$value['goods_price'].'元  * '.$value['goods_number'];
		}
	}
	return $test;
}

?>