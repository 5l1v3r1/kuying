<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb" lang="zh-CN">
  <head>
    <title>酷影网www.kyhd.net</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="高清,1080p,720p,蓝光，爱微淘">
    <meta name="author" content="酷影网">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/kuying/Public/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/kuying/Public/bootstrap/css/cas_style.css" rel="stylesheet" type="text/css">
  </head>
  <style>
  	hr
  	{
  		margin-top: -4px;
  		margin-bottom:0px;
  		width:90%
  	}
  	p
  	{
  		
			line-height: 24px;
			color: #2b2b2b;
			padding: 10px 10px 10px 10px;
			word-wrap: break-word;
  	}
  	.jumbotron p {
			font-size: 17px;
		}
  	
  </style>
  <body style=" FONT-FAMILY: 微软雅黑">
    <!--NAV-->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom:0px;">	
		   <div class="container">
			   <div class="navbar-header" style="padding-top:5px;">
			      <img src="/kuying/Public/img/icon/logo.gif" />
			   </div>
			   <div>
			      <ul class="nav navbar-nav" style="font-size:17px">
			         <li id="l1"><a href="<?php echo U('Index/showindex');;?>">首 页</a></li>
			         <li id="l2"><a href="<?php echo U('Index/showBTZone');;?>">BT分享</a></li>
			        <!--  <li id="l3" ><a href="#">爱微淘</a></li>-->
			         <li id="l4"><a href="<?php echo U('Login/showMembertips');;?>">会员福利</a></li>
			         <li id="l5" class="dropdown">
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			               新手必读 
			               <b class="caret"></b>
			            </a>
			            <ul class="dropdown-menu">
			               <li><a href="<?php echo U('Login/showNewsread');;?>">BT下载方法</a></li>
			               <li><a href="<?php echo U('Login/showNewsread');;?>">浏览器乱序解决</a></li>
			              <!-- <li class="divider"></li>
			               <li><a href="#">微淘消费必读</a></li>
			               <li><a href="#">加入微淘商家流程</a></li>-->
			               <li class="divider"></li>
			               <li><a href="<?php echo U('Login/showNewsread');;?>">意见和投诉</a></li>
			            </ul>
			         </li>  
			      </ul>
			   </div>
					<form class="bs-example bs-example-form" action="<?php echo U("Index/search?sea_zone=1&s_p=1");?>" method="post" role="search">
			         <div class="col-lg-3" style="padding-top:8px;">
			            <div class="input-group">
			               <input type="text" class="form-control" name = "sea_txt" placeholder="Search">
			               <span class="input-group-btn">
			                  <button type="submit" class="btn btn-default">Search</button>
			               </span>
			            </div><!-- /input-group -->
			         </div><!-- /.col-lg-6 -->
					</form>
				 <div>
				 	<?php if(session('u_UID')): ?><div class="media">
									   <a class="pull-left" href="#">
									   		<?php if(cookie('head')): ?><img src="<?php echo ($_COOKIE['head']); ?>" style="width:40px;height:40px;margin-top:3px;padding:1px;border:1px solid #777777;"  />
									      <?php else: ?>
									      	<img src="/kuying/Public/img/icon/none.gif" style="width:40px;height:40px;margin-top:3px;padding:1px;border:1px solid #777777;"  /><?php endif; ?>
									   </a>
									   <div class="media-body">
									      <div class="text-primary">欢迎回来:&nbsp<strong><?php echo ($_SESSION['u_username']); ?></strong>！</div>
									 			<div >
									 				<label class="text-danger">积分:<?php echo ($_SESSION['u_score']); ?>&nbsp</label>
									 				<a id="reg_link" title="访问个人资料" href="<?php echo U('Login/showPerson');;?>" >我的空间</a>
									 				&nbsp
									 				<a id="reg_link" title="退出登录" href="<?php echo U('Login/outlogin');;?>" >退出</a>
									 			</div>
									   </div>
									</div>
	 				<?php else: ?> 
	 					
	 					<p class="navbar-text navbar-right " >
	 								<ul class="list-inline" style="padding-top:10px;">
									  
									  <li><a id="login_link"  title="QQ快速登录" class="navbar-link" href="<?php echo U('Login/loginpage');;?>" ><img src="/kuying/Public/img/icon/qqlg.gif"/></a></li>
									  <li><a id="login_link" title="新浪微博快速登录" class="navbar-link" href="<?php echo U('Login/loginpage');;?>" ><img src="/kuying/Public/img/icon/silg.gif"/></a></li>
									  <li><a id="login_link" title="本地邮箱登录" class="navbar-link" href="<?php echo U('Login/loginpage');;?>" ><img src="/kuying/Public/img/icon/kylg.gif"/></a></li>
									  <li>您好，请登录</li>
									  <li> <a id="reg_link"   class="navbar-link" href="<?php echo U('Login/register');;?>" >注册</a></li>
									</ul>
					 				
	 
	 					</p><?php endif; ?>
 				 </div>
		   </div>
		</nav>

     
		<!--NAV END-->
    <div class="jumbotron visible-lg visible-md visible-sm visible-xs" style="margin-top:50px;margin-bottom:0px;padding:0px;background-color:white;" >
    	<div class="container" style="padding:0px;margin-top:0px;margin-bottom:0px;">
    		<!--导航-->
      	<h6>
      		<a href="<?php echo U('Index/showindex');;?>"><img src="/kuying/Public/img/icon/index.gif" width=16px > 首 页/</a>
      		<a href="<?php echo U('Index/showBTZone');;?>">BT共享区/</a>
      		<a href="<?php echo U('Index/showHDList?type='.$listpa.'&p=1');;?>"><?php echo ($list['SORT']); ?>分享专区/</a>
      		<a href="#">ResourceShow</a>
      	</h6>
      	<hr>
      	<h4 color="#fafafa">
      		 <img src="/kuying/Public/img/icon/filmname.gif">
      		<small><?php echo ($list['TYPE']); ?></small><?php echo ($list['FNAME']); ?>
      		</h4>
      	<hr>
      	<h5 class="text-left" >
      		<a href="#asd"><img src="/kuying/Public/img/icon/downadd.gif">下载地址</a><small> 管理员因为工作疏漏可能误传色情/反动/侵权等资源,请及时向网站反馈,一经采纳,奖励至少5个积分,站长邮箱:net33ph@hotmail.com</small>
      	</h5>
    		<!--left-->
      	<!--left-->
      	<div class="col-md-9" style="padding-left:5px;margin-left:0px;" >	
      		<!--BT TOP -->
	        <div class="row" style="padding:0px;margin-left:0px;margin-right:0px;">
	        	<div class="row" style="padding:8px;margin-left:0px;background-color:#fafafa;">	        	
		          <div class="thumbnail" style="margin-bottom:10px"  >
		        		<?php echo ($list['MES_SHOW_DIV']); ?>
		        		<?php if(($_SESSION['u_UID'] == '') OR ($_SESSION['u_UID'] == null) ): ?><div id="nonelog" class="alert alert-danger alert-dismissable">
			        			<center>
			        				<strong>有帐号吗？抓紧<a href="<?php echo U('Login/loginpage');;?>" >登录</a>！没有帐号，还不抓紧<a href="<?php echo U('Login/register');;?>" >注册一个</a>
			        				</strong>
			        			</center>
		        			</div>
		        		<?php elseif(($aldown != 1) AND (($_SESSION['u_score']-$list['SCORE']) < 0 )): ?>
		        			<div id="scoreshort" class="alert alert-danger alert-dismissable"> 
			        			对不起，您的积分不够
			        			<a data-toggle="modal" data-target="#myModal">积分不够，看这里！</a>
			        		</div><?php endif; ?>
		        		<div id="reducscore" class="alert alert-danger">
		        			<center>
		        				<strong>已扣除您的积分：<?php echo ($list['SCORE']); ?>分</strong>
		        			</center>
		        		</div>
								<div id="b"><img src="/kuying/Public/img/icon/downcount.gif" /> 浏览量：<?php echo ($list['SCAN_NUM']); ?>次</div>
								<div>
									<img src="/kuying/Public/img/icon/score.gif" />下载需要<?php echo ($list['SCORE']); ?>个积分
								</div>
								<div id ="asd" >--------------------------</div>
	       			</div>
	       				
	       		</div>
      	</div>
      	</div>	
      <!--right-->
      <div class="col-md-3" style="" >
	<div class="panel panel-default">
			<div class="panel-heading">
			  <h4 ><strong>创意工坊热销宝贝</strong></h4>
			</div>
			<br>
			<ul class="media-list">
	     	<?php if(is_array($list_ri)): foreach($list_ri as $key=>$vo): ?><li class="media">
	        	<?php $str = $vo['INFO_IMG']; $str = explode("http",$str);?>
	            <a target= _blank href="http://www.kyhd.net/index.php/shopping/index/showgood?id=<?php echo ($vo['id']); ?>" class="pull-left" href=""><img style="height:60px;width: 60px;" src="http<?php echo ($str[1]); ?>"></a>
	            <a target= _blank href="http://www.kyhd.net/index.php/shopping/index/showgood?id=<?php echo ($vo['id']); ?>">
	              <div class="media-body">
	                  <h6 class="text-danger"><strong><?php echo ($vo["TITLE"]); ?></strong></h6>
	              </div>
	            </a>
	            
	        </li>
	        <hr style="margin-top:10px"><?php endforeach; endif; ?>
	    </ul>
	</div>
</div>
			</div>	
      <!--right END-->	
      <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a></div>
			<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["weixin","qzone","tsina","renren","tieba","douban"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["weixin","qzone","tsina","renren","tieba","douban"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>   
      <br> 
    </div>
    <div class="jumbotron visible-lg visible-md visible-sm visible-xs" style="border-top:3px solid #000;margin-top:0px;margin-bottom:0px;padding:8px;background-color:#fafafa;"    >
	<div class="container" style="padding:0px;margin-top:0px;margin-bottom:0px;" >
		<!--left-->
		<div class="col-md-3" style="padding-top:3%;padding-left:5%;margin-left:0px;" >
			<!--bt-->
			<img src="/kuying/Public/img/icon/logo.gif" />
			<h4 color="#fafafa"><small>&nbsp&nbsp&nbsp&nbsp践行互联网分享精神，</br> </br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp打造属于大家的酷影！</small></h4>
			<!--BT start -->
	  	<div class="row" style="padding:0px;margin-left:0px;background-color:#fafafa;" >
	    </div>
		</div>
		<div class="col-md-3" style="padding-left:5px;margin-left:0px;" >
			<!--bt-->
			
			<blockquote>
				<h4 color="#fafafa">联系我们</h4>
				<h5 color="#fafafa">网 址：www.kyhd.net</h5>
				<h5 color="#fafafa">站长邮箱：net33ph@yeah.net</h5>
				<h5 color="#fafafa">站长QQ：1448474396</h5>
				<h5 color="#fafafa">酷影交流群：324860696</h5>
			</blockquote>	
		</div>
		<div class="col-md-3" style="padding-left:5px;margin-left:0px;" >
			<!--bt-->
			<blockquote>
				<h4 color="#fafafa">关注微信公众账号</h4>
				<img src="/kuying/Public/img/icon/weixin.gif">
			</blockquote>	
		</div>
		<div class="col-md-3" style="padding-left:5px;margin-left:0px;" >
			<!--bt-->
			<blockquote>
				<h4 color="#fafafa">关注微博</h4>
				<div class="jiathis_style_32x32">
					<a class="jiathis_follow_tsina" rel="http://weibo.com/3911891253/profile?topnav=1&wvr=6"></a>
				</div>
			</blockquote>	
		</div>
	</div> 
	<div class="container" style="padding:0px;margin-top:0px;margin-bottom:0px;" >
		<!--left-->
		<h5 class="text-center">©2015 &nbsp&nbsp酷影网www.kyhd.net&nbsp&nbsp&nbsp&nbsp津ICP证070791号 </h5>
	</div> 	
</div> 
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>	
		<!-- 回到顶部 -->
		<div class="bottom_tools">
		  <div class="qr_tool">二维码</div>
		  <a id="feedback" target="_blank" title="点击联系站长" href="http://wpa.qq.com/msgrd?v=3&uin=1448474396&site=qq&menu=yes"></a>
		  <a id="scrollUp" href="javascript:;" title="飞回顶部"></a>
		  <img class="qr_img" src="/kuying/Public/img/re_top/qr_img.png">
		</div>
    <!-- 回到顶部 -->
    <!-- 模态框（Modal） -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
		   aria-labelledby="myModalLabel" aria-hidden="true">
		   <div class="modal-dialog">
		      <div class="modal-content">
		         <div class="modal-header">
		            <button type="button" class="close" 
		               data-dismiss="modal" aria-hidden="true">
		                  &times;
		            </button>
		            <h4 class="modal-title" id="myModalLabel">
		               亲，您的积分不够！看看下面的介绍，快去赚取积分吧！
		            </h4>
		         </div>
		         <div class="modal-body">
		            <strong><img src="/kuying/Public/img/icon/warmnotice.gif"> <font size="3px">如何获取积分</font></strong><br>
	              <ul class="list-unstyled">
								  <li>1·注册即送30个积分</li>
								  <li>2·每天首页签到随机送积分</li>
								  <li>3·每天首页参与积分抽奖活动</li>
								</ul>
		         </div>
		         <div class="modal-footer">
		            <button type="button" class="btn btn-default" 
		               data-dismiss="modal">确定
		            </button>
		         </div>
		      </div><!-- /.modal-content -->
		</div><!-- /.modal -->
<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a></div>
<script type="text/javascript" src="/kuying/Public/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="/kuying/Public/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/kuying/Public/bootstrap/js/manager.js"></script>
<script type="text/javascript" src="/kuying/Public/bootstrap/js/MSClass.js"></script>
<script type="text/javascript" src="/kuying/Public/bootstrap/js/jquery.form.js"></script>
<script>
	$(document).ready(function(){
	  $("#l2").addClass("active");
	  $(".showhide").addClass("alert alert-warning");
	  $("#reducscore").hide();
	  var u_uid = "<?php echo ($_SESSION['u_UID']); ?>";
	  var u_score = "<?php echo ($_SESSION['u_score']); ?>";
	  var l_score = "<?php echo ($list['SCORE']); ?>";
	  var aldown = "<?php echo ($aldown); ?>";
	  if(u_uid == "" || u_uid == undefined || u_uid == null)
	  {
	  	$(".showhide").html("亲,下载链接已经被隐藏，登录以后才能看到！快登录吧！");
	  }else
	  {
	  	//alert(u_uid);
	  	if(aldown == 1)//已经下载过了
	  	{
		  	$(".showhide").show();
	  	}else
	  	{
	  		if((u_score-l_score)>=0)//分数够了
			  {
			  	$(".showhide").show();			  	
			  }else
			  {
			  	$(".showhide").html("亲，积分不够呀，下载链接已经隐藏, 快去首页获取积分吧，很容易呦！");
			  }
	  	}
	  	
	  }
	  /**
	  **单击链扣除积分
	  **/
	  var fid = "<?php echo ($list['FID']); ?>";
	  var datasend = {
          aldown: aldown,
          fid: fid,
          score:l_score,
          table: 1
      };
	  $(".showhide").click(function() 
				  {
						var url = '/kuying/index.php/Home/Index/showNScore/';  
						$.ajax({  
							type: "post",  
							url: url,  
							dataType: "json",  
							data: datasend,
							timeout: 1000,//超时时间 
							success: function(msg)
							{  
								window.location.reload();
								//alert(msg);
								if(msg == 0)
								{
									
								}else if(msg == 1)
								{
									$("#reducscore").show();

								}else if(msg == 2)
								{
									alert("亲，还木登录，快去登录吧！");
								}
							}  
						});  
					});
		
		
	}); 
	
</script>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["weixin","qzone","tsina","renren","tieba","douban"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["weixin","qzone","tsina","renren","tieba","douban"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
  </body>
	
</html>