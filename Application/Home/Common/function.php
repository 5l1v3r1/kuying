<?php
function p($array)
{
	dump($array,1,'<pre>',0);
}
/*
*全局函数，进行验证码验证工作
*/
function check_verify($code, $id = '')
{   
	 $verify = new \Think\Verify();
	 return $verify->check($code, $id);
}
/**
 * 邮件发送函数
 */
function sendMail($to, $subject, $content) {
		Vendor('PHPMailer.PHPMailerAutoload');	 
		$mail = new PHPMailer(); //实例化
		 $mail->IsSMTP(); // 启用SMTP
		 $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以126邮箱为例）
		 $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
		 $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
		 $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
		 $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
		 $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
		 $mail->AddAddress($to,"name");
		 $mail->WordWrap = 50; //设置每行字符长度
		 $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
		 $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
		 $mail->Subject =$subject; //邮件主题
		 $mail->Body = $content; //邮件内容
		 $mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //邮件正文不支持HTML的备用显示
		 if(!$mail->Send()) {
		 return 0;
		 } else{
		 return 1;
		 }
	}
	/**
	**加密解密算法
	**/
	/** 
 * @param string $string 原文或者密文 
 * @param string $operation 操作(ENCODE | DECODE), 默认为 DECODE 
 * @param string $key 密钥 
 * @param int $expiry 密文有效期, 加密时候有效， 单位 秒，0 为永久有效 
 * @return string 处理后的 原文或者 经过 base64_encode 处理后的密文 
 * 
 * @example 
 * 
 * $a = authcode('abc', 'ENCODE', 'key'); 
 * $b = authcode($a, 'DECODE', 'key');  // $b(abc) 
 * 
 * $a = authcode('abc', 'ENCODE', 'key', 3600); 
 * $b = authcode('abc', 'DECODE', 'key'); // 在一个小时内，$b(abc)，否则 $b 为空 
 */  
function authcode($string, $operation = 'DECODE', $key = '', $expiry = 86400) {  
      
    $ckey_length = 4;  
    // 随机密钥长度 取值 0-32;  
    // 加入随机密钥，可以令密文无任何规律，即便是原文和密钥完全相同，加密结果也会每次不同，增大破解难度。  
    // 取值越大，密文变动规律越大，密文变化 = 16 的 $ckey_length 次方  
    // 当此值为 0 时，则不产生随机密钥  
      
  
    $key = md5 ( $key ? $key : 'key' ); //这里可以填写默认key值  
    $keya = md5 ( substr ( $key, 0, 16 ) );  
    $keyb = md5 ( substr ( $key, 16, 16 ) );  
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr ( $string, 0, $ckey_length ) : substr ( md5 ( microtime () ), - $ckey_length )) : '';  
      
    $cryptkey = $keya . md5 ( $keya . $keyc );  
    $key_length = strlen ( $cryptkey );  
      
    $string = $operation == 'DECODE' ? base64_decode ( substr ( $string, $ckey_length ) ) : sprintf ( '%010d', $expiry ? $expiry + time () : 0 ) . substr ( md5 ( $string . $keyb ), 0, 16 ) . $string;  
    $string_length = strlen ( $string );  
      
    $result = '';  
    $box = range ( 0, 255 );  
      
    $rndkey = array ();  
    for($i = 0; $i <= 255; $i ++) {  
        $rndkey [$i] = ord ( $cryptkey [$i % $key_length] );  
    }  
      
    for($j = $i = 0; $i < 256; $i ++) {  
        $j = ($j + $box [$i] + $rndkey [$i]) % 256;  
        $tmp = $box [$i];  
        $box [$i] = $box [$j];  
        $box [$j] = $tmp;  
    }  
      
    for($a = $j = $i = 0; $i < $string_length; $i ++) {  
        $a = ($a + 1) % 256;  
        $j = ($j + $box [$a]) % 256;  
        $tmp = $box [$a];  
        $box [$a] = $box [$j];  
        $box [$j] = $tmp;  
        $result .= chr ( ord ( $string [$i] ) ^ ($box [($box [$a] + $box [$j]) % 256]) );  
    }  
      
    if ($operation == 'DECODE') {  
        if ((substr ( $result, 0, 10 ) == 0 || substr ( $result, 0, 10 ) - time () > 0) && substr ( $result, 10, 16 ) == substr ( md5 ( substr ( $result, 26 ) . $keyb ), 0, 16 )) {  
            return substr ( $result, 26 );  
        } else {  
            return '';  
        }  
    } else {  
        return $keyc . str_replace ( '=', '', base64_encode ( $result ) );  
    }  
  
}
	/**
 * 匹配TYPE HD区域
 */
 function getCharType($list)
 {
 	foreach($list as &$val){
    		switch($val['TYPE'])
    		{
    			case 1501:
    				$val['TYPE']="冒险";
    				//print( $val['TYPE']);
    			break;
    			case 1502:
    				$val['TYPE']="动作";
    				//print( $val['TYPE']);
    			break;
    			case 1503:
    				$val['TYPE']="犯罪";
    				//print( $val['TYPE']);
    			break;
    			case 1504:
    				$val['TYPE']="动画";
    				//print( $val['TYPE']);
    			break;
    			case 1505:
    				$val['TYPE']="家庭";
    				//print( $val['TYPE']);
    			break;
    			case 1506:
    				$val['TYPE']="爱情";
    				//print( $val['TYPE']);
    			break;
    			case 1507:
    				$val['TYPE']="奇幻";
    				//print( $val['TYPE']);
    			break;
    			case 1508:
    				$val['TYPE']="恐怖";
    				//print( $val['TYPE']);
    			break;
    			case 1509:
    				$val['TYPE']="剧情";
    				//print( $val['TYPE']);
    			break;
    			case 1510:
    				$val['TYPE']="科幻";
    				//print( $val['TYPE']);
    			break;
    			case 1511:
    				$val['TYPE']="悬疑";
    				//print( $val['TYPE']);
    			break;
    			case 1512:
    				$val['TYPE']="战争";
    				//print( $val['TYPE']);
    			break;
    			case 1513:
    				$val['TYPE']="悬念";
    				//print( $val['TYPE']);
    			break;
    			case 1514:
    				$val['TYPE']="喜剧";
    				//print( $val['TYPE']);
    			break;
    			case 1515:
    				$val['TYPE']="惊悚";
    				//print( $val['TYPE']);
    			break;
    			case 1516:
    				$val['TYPE']="传记";
    				//print( $val['TYPE']);
    			break;
    			case 1517:
    				$val['TYPE']="合集";
    				//print( $val['TYPE']);
    			break;
    			case 1518:
    				$val['TYPE']="综艺";
    				//print( $val['TYPE']);
    			break;
    			case 1519:
    				$val['TYPE']="电视剧";
    				//print( $val['TYPE']);
    			break;
    			case 1521:
    				$val['TYPE']="左右格式";
    				//print( $val['TYPE']);
    			break;
    			case 1522:
    				$val['TYPE']="上下格式";
    				//print( $val['TYPE']);
    			break;
    			case 1523:
    				$val['TYPE']="红蓝格式";
    				//print( $val['TYPE']);
    			break;
    			case 1524:
    				$val['TYPE']="交错格式";
    				//print( $val['TYPE']);
    			break;
    			case 1525:
    				$val['TYPE']="红绿格式";
    				//print( $val['TYPE']);
    			break;
    			case 1526:
    				$val['TYPE']="绿红格式";
    				//print( $val['TYPE']);
    			break;
    			case 1527:
    				$val['TYPE']="3D原盘";
    				//print( $val['TYPE']);
    			break;
    			case 1528:
    				$val['TYPE']="未知原盘";
    				//print( $val['TYPE']);
    			break;
    			case 1529:
    				$val['TYPE']="蓝光原盘";
    				//print( $val['TYPE']);
    			break;
    			case 1530:
    				$val['TYPE']="REMUX";
    				//print( $val['TYPE']);
    			break;
    			case 1531:
    				$val['TYPE']="1080P";
    				//print( $val['TYPE']);
    			break;
    			case 1532:
    				$val['TYPE']="720P";
    				//print( $val['TYPE']);
    			break;
    			/**
    			**综艺type
    			**/
    			case 1:
    				$val['TYPE']="1080P";
    				//print( $val['TYPE']);
    			break;
    			case 2:
    				$val['TYPE']="720P";
    				//print( $val['TYPE']);
    			break;
    			case 3:
    				$val['TYPE']="480P";
    				//print( $val['TYPE']);
    			break;
    			case 4:
    				$val['TYPE']="漫画";
    				//print( $val['TYPE']);
    			break;
    			case 5:
    				$val['TYPE']="MV";
    				//print( $val['TYPE']);
    			break;
    			case 6:
    				$val['TYPE']="体育";
    				//print( $val['TYPE']);
    			break;
    			case 7:
    				$val['TYPE']="综艺";
    				//print( $val['TYPE']);
    			break;
    			case 8:
    				$val['TYPE']="MTV";
    				//print( $val['TYPE']);
    			break;
    			case 9:
    				$val['TYPE']="演唱会";
    				//print( $val['TYPE']);
    			break;
    			case 10:
    				$val['TYPE']="音乐";
    				//print( $val['TYPE']);
    			break;
    			default:
    			$val['TYPE']="其它";
    			
    		}
   			//print( $val['SORT'].$val['FID'].$val['TYPE']."<br>");
			}
			return $list;
 	}
 	function getSingleCharType($val)
 	{
 		switch($val['TYPE'])
    		{
    			case 1501:
    				$val['TYPE']="冒险";
    				//print( $val['TYPE']);
    			break;
    			case 1502:
    				$val['TYPE']="动作";
    				//print( $val['TYPE']);
    			break;
    			case 1503:
    				$val['TYPE']="犯罪";
    				//print( $val['TYPE']);
    			break;
    			case 1504:
    				$val['TYPE']="动画";
    				//print( $val['TYPE']);
    			break;
    			case 1505:
    				$val['TYPE']="家庭";
    				//print( $val['TYPE']);
    			break;
    			case 1506:
    				$val['TYPE']="爱情";
    				//print( $val['TYPE']);
    			break;
    			case 1507:
    				$val['TYPE']="奇幻";
    				//print( $val['TYPE']);
    			break;
    			case 1508:
    				$val['TYPE']="恐怖";
    				//print( $val['TYPE']);
    			break;
    			case 1509:
    				$val['TYPE']="剧情";
    				//print( $val['TYPE']);
    			break;
    			case 1510:
    				$val['TYPE']="科幻";
    				//print( $val['TYPE']);
    			break;
    			case 1511:
    				$val['TYPE']="悬疑";
    				//print( $val['TYPE']);
    			break;
    			case 1512:
    				$val['TYPE']="战争";
    				//print( $val['TYPE']);
    			break;
    			case 1513:
    				$val['TYPE']="悬念";
    				//print( $val['TYPE']);
    			break;
    			case 1514:
    				$val['TYPE']="喜剧";
    				//print( $val['TYPE']);
    			break;
    			case 1515:
    				$val['TYPE']="惊悚";
    				//print( $val['TYPE']);
    			break;
    			case 1516:
    				$val['TYPE']="传记";
    				//print( $val['TYPE']);
    			break;
    			case 1517:
    				$val['TYPE']="合集";
    				//print( $val['TYPE']);
    			break;
    			case 1518:
    				$val['TYPE']="综艺";
    				//print( $val['TYPE']);
    			break;
    			case 1519:
    				$val['TYPE']="电视剧";
    				//print( $val['TYPE']);
    			break;
    			case 1521:
    				$val['TYPE']="左右格式";
    				//print( $val['TYPE']);
    			break;
    			case 1522:
    				$val['TYPE']="上下格式";
    				//print( $val['TYPE']);
    			break;
    			case 1523:
    				$val['TYPE']="红蓝格式";
    				//print( $val['TYPE']);
    			break;
    			case 1524:
    				$val['TYPE']="交错格式";
    				//print( $val['TYPE']);
    			break;
    			case 1525:
    				$val['TYPE']="红绿格式";
    				//print( $val['TYPE']);
    			break;
    			case 1526:
    				$val['TYPE']="绿红格式";
    				//print( $val['TYPE']);
    			break;
    			case 1527:
    				$val['TYPE']="3D原盘";
    				//print( $val['TYPE']);
    			break;
    			case 1528:
    				$val['TYPE']="未知原盘";
    				//print( $val['TYPE']);
    			break;
    			case 1529:
    				$val['TYPE']="蓝光原盘";
    				//print( $val['TYPE']);
    			break;
    			case 1530:
    				$val['TYPE']="REMUX";
    				//print( $val['TYPE']);
    			break;
    			case 1531:
    				$val['TYPE']="1080P";
    				//print( $val['TYPE']);
    			break;
    			case 1532:
    				$val['TYPE']="720P";
    				//print( $val['TYPE']);
    			break;
    			/**
    			**综艺type
    			**/
    			case 1:
    				$val['TYPE']="1080P";
    				//print( $val['TYPE']);
    			break;
    			case 2:
    				$val['TYPE']="720P";
    				//print( $val['TYPE']);
    			break;
    			case 3:
    				$val['TYPE']="480P";
    				//print( $val['TYPE']);
    			break;
    			case 4:
    				$val['TYPE']="漫画";
    				//print( $val['TYPE']);
    			break;
    			case 5:
    				$val['TYPE']="MV";
    				//print( $val['TYPE']);
    			break;
    			case 6:
    				$val['TYPE']="体育";
    				//print( $val['TYPE']);
    			break;
    			case 7:
    				$val['TYPE']="综艺";
    				//print( $val['TYPE']);
    			break;
    			case 8:
    				$val['TYPE']="MTV";
    				//print( $val['TYPE']);
    			break;
    			case 9:
    				$val['TYPE']="演唱会";
    				//print( $val['TYPE']);
    			break;
    			case 10:
    				$val['TYPE']="音乐";
    				//print( $val['TYPE']);
    			break;
    			default:
    			$val['TYPE']="其它";	
    		}
    		return $val;
 	}
 	function getSingleCharSort($val)
 	{
 		switch($val['SORT'])
    		{
    			case 1200:
    				$val['SORT']="1080pBT";
    				//print( $val['TYPE']);
    			break;
    			case 1201:
    				$val['SORT']="720PBT";
    				//print( $val['TYPE']);
    			break;
    			case 1202:
    				$val['SORT']="百度/360网盘";
    				//print( $val['TYPE']);
    			break;
    			case 1203:
    				$val['SORT']="REMUX/原盘BT";
    				//print( $val['TYPE']);
    			break;
    			case 1204:
    				$val['SORT']="高清合集BT";
    				//print( $val['TYPE']);
    			break;
    			case 1205:
    				$val['SORT']="高清纪录片BT";
    				//print( $val['TYPE']);
    			break;
    			case 1206:
    				$val['SORT']="3D高清电影BT";
    				//print( $val['TYPE']);
    			break;
    			/**
    			**BD
    			*/
    			case 1300:
    				$val['SORT']="BD高清";
    				//print( $val['TYPE']);
    			break;
    			case 1301:
    				$val['SORT']="ipad等MP4小容量";
    				//print( $val['TYPE']);
    			break;
    			case 1302:
    				$val['SORT']="迅雷小容量";
    				//print( $val['TYPE']);
    			break;
    			case 1303:
    				$val['SORT']="亚洲电影";
    				//print( $val['TYPE']);
    			break;
    			case 1304:
    				$val['SORT']="欧美小容量";
    				//print( $val['TYPE']);
    			break;
    		/**
    			**综艺
    			*/
    			case 100:
    				$val['SORT']="韩国高清";
    				//print( $val['TYPE']);
    			break;
    			case 101:
    				$val['SORT']="小日本高清";
    				//print( $val['TYPE']);
    			break;
    			case 102:
    				$val['SORT']="大中华高清";
    				//print( $val['TYPE']);
    			break;
    			case 103:
    				$val['SORT']="欧美高清";
    				//print( $val['TYPE']);
    			break;
    			case 104:
    				$val['SORT']="演唱会/MV/运动体育";
    				//print( $val['TYPE']);
    			break;
    			case 105:
    				$val['SORT']="动漫高清";
    				//print( $val['TYPE']);
    			break;
    			
    			
    		}
    		return $val;
 	}
 	/**
 	**电视剧
 	**/
 function getJ_CharType($list)
 {
 	foreach($list as &$val){
    		switch($val['TYPE'])
    		{
    			case 3501:
    				$val['TYPE']="大陆";
    				//print( $val['TYPE']);
    			break;
    			case 3502:
    				$val['TYPE']="港台";
    				//print( $val['TYPE']);
    			break;
    			case 3503:
    				$val['TYPE']="欧美";
    				//print( $val['TYPE']);
    			break;
    			case 3504:
    				$val['TYPE']="日剧";
    				//print( $val['TYPE']);
    			break;
    			case 3505:
    				$val['TYPE']="韩剧";
    				//print( $val['TYPE']);
    			break;
    			case 3507:
    				$val['TYPE']="分集";
    				//print( $val['TYPE']);
    			break;
    			case 3508:
    				$val['TYPE']="连载";
    				//print( $val['TYPE']);
    			break;
    			case 3509:
    				$val['TYPE']="完结";
    				//print( $val['TYPE']);
    			break;
    			default:
    			$val['TYPE']="其它";
    			
    		}
   			//print( $val['SORT'].$val['FID'].$val['TYPE']."<br>");
			}
			return $list;
 	}
 	function getJ_SingleCharType($val)
 	{
 		switch($val['TYPE'])
    		{
    			case 3501:
    				$val['TYPE']="大陆";
    				//print( $val['TYPE']);
    			break;
    			case 3502:
    				$val['TYPE']="港台";
    				//print( $val['TYPE']);
    			break;
    			case 3503:
    				$val['TYPE']="欧美";
    				//print( $val['TYPE']);
    			break;
    			case 3504:
    				$val['TYPE']="日剧";
    				//print( $val['TYPE']);
    			break;
    			case 3505:
    				$val['TYPE']="韩剧";
    				//print( $val['TYPE']);
    			break;
    			case 3507:
    				$val['TYPE']="分集";
    				//print( $val['TYPE']);
    			break;
    			case 3508:
    				$val['TYPE']="连载";
    				//print( $val['TYPE']);
    			break;
    			case 3509:
    				$val['TYPE']="完结";
    				//print( $val['TYPE']);
    			break;
    			default:
    			$val['TYPE']="其它";
    		}
    		return $val;
 	}
 	function getJ_SingleCharSort($val)
 	{
 		switch($val['SORT'])
    		{
    			case 3201:
    				$val['SORT']="美剧";
    				//print( $val['TYPE']);
    			break;
    			default:
    			  $val['SORT']="电视剧";
    		}
    		return $val;
 	}
 	function showright() 
 	{
 		/* 右边栏*/
        $Model = M('zone');
        $ri['LIST'] = 1;
        $re_ri = $Model->field('CONTENT')->where($ri)->find();
        $Model = M("goods"); 
        $data_ri['id']  = array('in',$re_ri['CONTENT']);
        $list_ri = $Model->field('id,TITLE,INFO_IMG')->where($data_ri)->select();
        return $list_ri;
        //$this->assign('list_ri',$list_ri);
      /**/
 		
 	}
?>