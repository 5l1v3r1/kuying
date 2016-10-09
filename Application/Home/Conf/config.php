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
	//邮箱配置
	'MAIL_HOST' =>'smtp.126.com',
	'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
	'MAIL_USERNAME' =>'xxxxx@126.com',
	'MAIL_FROM' =>'xxxxx@126.com',
	'MAIL_FROMNAME' =>'酷影HD',
	'MAIL_PASSWORD' =>'123456',
	'MAIL_CHARSET' =>'utf-8',
	'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件
	'DEFAULT_FILTER'        =>  'htmlspecialchars', // 默认参数过滤方法 用于I函数...
);