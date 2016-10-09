<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb" lang="zh-CN"> 
  <head>
    <title> 酷影网www.kyhd.net</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="高清,1080p,720p,蓝光，爱微淘">
    <meta name="author" content="酷影网">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/kuying/Public/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/kuying/Public/bootstrap/css/cas_style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/kuying/Public/bootstrap/js/check.js"></script>
  </head>
  <style>
  	hr
  	{
  		margin-top: -4px;
  		margin-bottom:0px;
  	}
  	p
  	{
  		
			line-height: 24px;
			color: #2b2b2b;
			padding: 0px 5px 5px 5px;
			word-wrap: break-word;
  	}
  	.jumbotron p {
			font-size: 14px;
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
									      <img src="http://tp2.sinaimg.cn/2027730373/180/5634222593/1" style="width:40px;height:40px;margin-top:3px;padding:1px;border:1px solid #777777;"  />
									   </a>
									   <div class="media-body">
									      <div class="text-primary">欢迎回来:&nbsp<strong><?php echo ($_SESSION['u_username']); ?></strong>！</div>
									 			<div >
									 				<img src="/kuying/Public/img/icon/userscore.gif"> 
									 				<small>积分:<?php echo ($_SESSION['u_score']); ?>&nbsp</small>
									 				<img src="/kuying/Public/img/icon/userspace.gif">
									 				<a id="reg_link" href="<?php echo U('Login/showPerson');;?>" >我的空间</a>
									 				&nbsp<img src="/kuying/Public/img/icon/userout.gif">
									 				<a id="reg_link" href="<?php echo U('Login/outlogin');;?>" >退出</a>
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
    <div class="jumbotron visible-lg visible-md visible-sm visible-xs" style="margin-top:100px;margin-bottom:0px;padding:0px;background-color:white;" >
    	<div class="container" style="padding:0px;margin-top:0px;margin-bottom:0px;">
      	<!--left-->
      	<div class="col-md-9" style="padding-left:5px;margin-left:0px;" >	
      		<!--BT TOP -->
	        	<div class="row" style="padding:8px;margin-left:0px;background-color:#fafafa;">	
	        		<div class="col-md-12" style="padding:5px;" >	
	        		     <div class="col-md-5" style="padding:5px;" >	
	        		     	<img src="/kuying/Public/img/tools/p_top.gif"> 
	        		     </div>  	
	        		     <div class="col-md-7" style="padding:0px;" >	
		        		     	<div class="row">
		        		     		<h3 class="text-primary">好用的播放器推荐</h3>
		        		     		<p> 如今用户对视频质量的要求越来越高，1080p的Full HD(全高清)标准也越来越普及，一款普通的视频播放器可能已经满足不了大家对享受顶级高清画质的追求了，酷影网特别收集了好用的高清播放器，想必很多发烧友用户也想知道高清播放器哪个好用吧？下面就一起来关注一下吧~！</p>
		        		     	<hr>
		        		     	</div> 
	        		     </div>
	        		</div>
	        		
      				<div class="col-md-3">
				          <div class="thumbnail" style="height:390px;">
				            <img src="/kuying/Public/img/tools/sp.gif" style="width:100%;">
				              <h4 class="text-primary"><strong>&nbspKMPlayer&nbsp</strong><small>7.9M</small></h4>
				              <p class="small text-warning ">[推荐理由]:射手影音播放器是由射手网创建与维护的开源播放器项目。加入更多真正符合中国用户习惯的功能，建立和维护一个真正属于中文用户的开源播放器。</p>
				              <a class="btn btn-primary center" href="http://pan.baidu.com/s/1dD8gbap"  target="_blank">下载地址</a>
				          </div>
				       </div>
      		     <div class="col-md-3">
				          <div class="thumbnail" style="height:390px;">
				            <img src="/kuying/Public/img/tools/wmj.gif" style="width:100%;">
				              <h4 class="text-primary"><strong>&nbsp完美解码&nbsp</strong><small>71.7M</small></h4>
				              <p class="small text-warning ">[推荐理由]:完美解码是一款能实现各种流行视频音频完美回放及编码的全能型影音解码包，是视频播放/编码爱好者的首选</p>
				              <div style=" position:absolute;bottom:40px;"><a class="btn btn-primary center"  href="http://pan.baidu.com/s/1ntrAH5J"  target="_blank">下载地址</a></div>
				          </div>
				       </div> 
				       <div class="col-md-3">
				          <div class="thumbnail" style="height:390px;">
				            <img src="/kuying/Public/img/tools/kmp.gif" style="width:100%;">
				              <h4 class="text-primary"><strong>&nbspKMPlayer&nbsp</strong><small>31.3M</small></h4>
				              <p class="small text-warning ">[推荐理由]:KMPlayer-来自韩国的影音全能播放器，支持中文，KMPlayer支持几乎全部音视频格式，主流视频包</p>
				              <div style=" position:absolute;bottom:40px;"><a class="btn btn-primary center" href="http://pan.baidu.com/s/1qWyWh3I"  target="_blank">下载地址</a></div>
				          </div>
				       </div>
				       <div class="col-md-3">
				          <div class="thumbnail" style="height:390px;">
				            <img src="/kuying/Public/img/tools/bf.gif" style="width:100%;">
				              <h4 class="text-primary"><strong>&nbsp暴风影音&nbsp</strong><small>35.5M</small></h4>
				              <p class="small text-warning ">[推荐理由]:暴风影音2014官方最新版，万能播放服务升级，提供720P真高清视频，安装速度更快</p>
				              <div style=" position:absolute;bottom:40px;"><a class="btn btn-primary center" href="http://home.baofeng.com/"  target="_blank">下载地址</a></div>
				          </div>
				       </div>
				       <div class="col-md-3">
				          <div class="thumbnail" style="height:390px;">
				            <img src="/kuying/Public/img/tools/PW.gif" style="width:100%;">
				              <h4 class="text-primary"><strong>&nbspPOWERDVD&nbsp</strong></h4>
				              <p class="small text-warning ">[推荐理由]:PowerDVD支持蓝光电影、3D蓝光电影、DVD视频、大多数视频格式文件、音乐文件，可以将2D电影转换为3D电影来观看！</p>
				              <div style=" position:absolute;bottom:40px;"><a class="btn btn-primary center" href="http://pan.baidu.com/s/1kTl9ixL"  target="_blank">下载地址</a></div>
				          </div>
				       </div>
				       <div class="col-md-3">
				          <div class="thumbnail" style="height:390px;">
				            <img src="/kuying/Public/img/tools/thunp.gif" style="width:100%;">
				              <h4 class="text-primary"><strong>&nbsp迅雷看看&nbsp</strong><small>45M</small></h4>
				              <p class="small text-warning ">[推荐理由]:本地全格式播放，全协议（http、ftp、BT、电驴等）支持的边下边播。依托迅雷强大下载技术，使您能够完全流畅地享受高清影视内容。</p>
				              <div style=" position:absolute;bottom:40px;"><a class="btn btn-primary center" href="http://dl.xunlei.com/xmp.html"  target="_blank">下载地址</a></div>
				          </div>
				       </div>
				       <div class="col-md-3">
				          <div class="thumbnail" style="height:390px;">
				            <img src="/kuying/Public/img/tools/qq.gif" style="width:100%;">
				              <h4 class="text-primary"><strong>&nbspQQ影音&nbsp</strong><small>26.3M</small></h4>
				              <p class="small text-warning ">[推荐理由]:QQ影音首创轻量级多播放内核技术，深入挖掘和发挥新一代显卡的硬件加速能力，软件追求更小、更快、更流畅的视听享受。</p>
				              <div style=" position:absolute;bottom:40px;"><a class="btn btn-primary center" href="http://player.qq.com/"  target="_blank">下载地址</a></div>
				          </div>
				       </div>
				       <div class="col-md-3">
				          <div class="thumbnail" style="height:390px;">
				            <img src="/kuying/Public/img/tools/thunp.gif" style="width:100%;">
				              <h4 class="text-primary"><strong>&nbspWINDVD&nbsp</strong><small>101M</small></h4>
				              <p class="small text-warning ">[推荐理由]:全球首屈一指的 DVD 和 Blu-ray 播放器软件！可以让您的家瞬间变成影院.WinDVD采用了新开发的高抽样频率技术，能够抑制视频的衰退，加入了分辨率扩展的技术。</p>
				              <div style=" position:absolute;bottom:40px;"><a class="btn btn-primary center" href="http://pan.baidu.com/s/1eQ6Ifw2"  target="_blank">下载地址</a></div>
				          </div>
				       </div>

	        		     
	       		</div>
      	</div>	
      <!--right-->
      	<div class="col-md-3" style="padding:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;" > 	
	        <div class="row" style="padding-left:10px;padding-top:0px;margin:0px;">
	        	<h4><img src="/kuying/Public/img/icon/tips.gif">&nbsp小贴士<small>&nbspTips</small></h4>
	        	<div class="thumbnail" style="padding:0px;margin:0px;" >
	            <div class="caption" >
	              <!--<span class="glyphicon glyphicon-sort-by-attributes-alt" ></span><font size=5px>商务区</font><br>
	              <br> --> 
	              <strong><img src="/kuying/Public/img/icon/warmnotice.gif"> <font size="3px">积分有神马用？</font></strong><br>
	              <ul class="list-unstyled">
								  <li>1. 下载BT种子需要积分</li>
								  <li>2. 参与积分抽奖活动</li>
								</ul>
								<hr>
	              <strong><img src="/kuying/Public/img/icon/warmnotice.gif"> <font size="3px">如何获取积分</font></strong><br>
	              <ul class="list-unstyled">
								  <li>1. 注册即送30个积分</li>
								  <li>2. 每天首页签到随机送积分</li>
								  <li>3. 每天首页参与积分抽奖活动</li>
								</ul>
								<hr>
								<div class="col-md-12" style="padding:2px;margin-top:9px;margin-bottom:0px;"><span class="label label-primary"> QQ讨论群</span></div>
	              <div class="col-md-12" style="padding:2px;margin-top:5px;margin-bottom:0px;">
	              	<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=341e04b4d811ca828e92e3e8dd41b6f6e694c98f536d13260245155c796e8222">
											<img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="酷影网高清交流群" title="酷影网高清交流群">
									</a>
								</div>
								<h5>
								· 加群申请注明："酷影"
								</h5>
								<hr>
								<br>
								<p style="font-size:15px;"><span class="label label-success">微信公众账号</span></p>
								<p class="text-center"><img src="/kuying/Public/img/icon/weixin.gif"></p>
	            </div>
	          </div>    
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
<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a></div>
<script type="text/javascript" src="/kuying/Public/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="/kuying/Public/bootstrap/js/bootstrap.min.js"></script>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["weixin","qzone","tsina","renren","tieba","douban"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["weixin","qzone","tsina","renren","tieba","douban"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
   
  </body>
	
</html>