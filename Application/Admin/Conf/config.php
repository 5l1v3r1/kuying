<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'kuying_db', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '123456', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'kuying_', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集
	'URL_CASE_INSENSITIVE' => true, //URL不区分大小写
	'URL_HTML_SUFFIX' => '', //设置伪静态后缀名
	'TMPL_PARSE_STRING' =>array(
	'StudyFoxShop_VERSION' => '1.1.1_20140112', //StudyFoxShop版本
	'DWZ_VERSION' => '1.4.6', //DWZ版本
	'PAGE_LISTROWS' => 15, //每页显示的记录数，初始显示
	'VAR_PAGE' => 'pageNum',
	'DB_LIKE_FIELDS'=>'USERNAME|EMAIL|title|goods_name', //支持模糊查询的字段
	'NOT_M_MODULE' => 'Index,Exit', //无需执行实例化的模块

	'AUTH_SUPERADMIN' => '9', //Auth权限认证超级管理员
	),
);
?>