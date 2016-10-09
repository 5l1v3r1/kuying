<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
		<!--Carousel start-->
		<div class="jumbotron visible-lg visible-md visible-sm visible-xs" style="padding:0px;margin-top:0px;margin-bottom:0px;"  draggable="true">
				<div id="myCarousel" class="carousel slide"  style="padding:0px;margin:0px;background-color:black;">
				   <!-- 轮播（Carousel）指标 -->
				   <ol class="carousel-indicators" >
				      <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k == 0 ): ?><li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								<?php else: ?> 
									<li data-target="#myCarousel" data-slide-to="<?php echo ($k); ?>"></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				   </ol>  
		   <!-- 轮播（Carousel）项目 -->
				   <div class="carousel-inner" >
				   		<?php if(is_array($list)): foreach($list as $k=>$vo): if($k == 0 ): ?><div class="item active" >
						         <center>	
						         	<a  href="<?php echo U(''.$vo['MODEL'].'?fid='.$vo['FID'].'');;?>" target=_blank>
						         		<img height=300px src="/kuying/Public/img/index/lunbo/<?php echo ($vo["id"]); ?>.png" alt="First slide">
						         	</a>
						         </center>
						         <div class="carousel-caption"><?php echo ($vo["FNAME"]); ?></div>
						      </div>
								<?php else: ?> 
									<div class="item" >
										<center>	
						         	<a  href="<?php echo U(''.$vo['MODEL'].'?fid='.$vo['FID'].'');;?>" target=_blank>
						         		<img height=300px src="/kuying/Public/img/index/lunbo/<?php echo ($vo["id"]); ?>.png" alt="First slide">
						         	</a>
						         </center>
						         <div class="carousel-caption"><?php echo ($vo["FNAME"]); ?></div>
					      </div><?php endif; endforeach; endif; ?> 		      
				   </div>
		   <!-- 轮播（Carousel）导航 -->
				   <div class="container" style="width:1000px">
				   <a class="carousel-control left" href="#myCarousel"				      data-slide="prev">&lsaquo;</a>
				   <a class="carousel-control right" href="#myCarousel"				    data-slide="next">&rsaquo;</a>
				    </div>
				</div> 
    </div>
    <!--Carousel END-->
    <div class="jumbotron visible-lg visible-md visible-sm visible-xs" style="margin:0px;padding:0px;background-color:white;"  draggable="true"  >
    	<div class="container" style="padding-bottom:0px;margin-top:0px;margin-bottom:0px;" >
	 <h4 class="text-danger" >网站的发展离不开大家的宣传和支持，希望大家多多宣传和支持！如果登录或者注册中出现问题，请及时联系站长：站长QQ 1448474396 </h4> 
    		<!--left-->
      	<div class="col-md-10" style="padding-left:5px;margin-left:0px;" >
      		
      		<div class="col-md-8"  style="padding:8px;padding-bottom:0px;margin-left:0px;">
	      		<!--bt-->
	      		<h4 color="#fafafa"><img src="/kuying/Public/img/icon/hd.gif"><strong >&nbspBT共享区</strong><small> 践行互联网精神高清/1080p/720p/BD/美剧...发掘，提供，分享 we do it~</small></h4>	
		      	<div class="row" style="padding:0px;margin-left:0px;background-color:#fafafa;" >
		        	
			        	<div class="col-md-6"  style="padding:8px;padding-bottom:0px;margin-left:0px;">
		          		<div class="thumbnail" >
				            <div class="caption" style="height:250px;">
				              <span class="glyphicon glyphicon-sort-by-attributes-alt" ></span><font size=4px> 高清电影BT下载</font><br> 
				              <strong ><span class="label label-primary">1</span>&nbsp&nbsp<a href="<?php echo U('Index/showHDList?type=1600&p=1');;?>"> 1080pBT分享专区</a></strong><br>
				              <div style="border-bottom:1px solid #999;margin-bottom:6px; "></div>
				              <strong><span class="label label-warning">2</span>&nbsp&nbsp<a href="<?php echo U('Index/showHDList?type=1700&p=1');;?>"> 720pBT分享专区</a></strong><br>
				              <div style="border-bottom:1px solid #999;margin-bottom:6px; "></div>
				              <strong><span class="label label-primary">3</span>&nbsp&nbsp<a href="<?php echo U('Index/showHDList?type=1900&p=1');;?>"> REMUX/原盘BT分享专区</a></strong><br> 
				              <div style="border-bottom:1px solid #999;margin-bottom:6px; "></div>
				              <strong><span class="label label-warning">4</span>&nbsp&nbsp<a href="<?php echo U('Index/showHDList?type=2000&p=1');;?>"> 高清合集BT分享专区</a></strong><br> 
				              <div style="border-bottom:1px solid #999;margin-bottom:6px; "></div>
				              <strong><span class="label label-primary">5</span>&nbsp&nbsp<a href="<?php echo U('Index/showHDList?type=1800&p=1');;?>"> 百度/360网盘分享专区</a></strong><br>
				              <div style="border-bottom:1px solid #999;margin-bottom:6px; "></div>
				              <strong><span class="label label-warning">6</span>&nbsp&nbsp<a href="<?php echo U('Index/showHDList?type=2100&p=1');;?>"> 高清记录片BT分享专区</a></strong><br> 
				              <div style="border-bottom:1px solid #999;margin-bottom:6px; "></div>
				              <strong><span class="label label-primary">7</span>&nbsp&nbsp<a href="<?php echo U('Index/showHDList?type=2200&p=1');;?>"> 3D高清电影BT分享专区</a></strong><br>
				              <div style="border-bottom:1px solid #999;margin-bottom:6px; "></div>
											<h6> <img src="/kuying/Public/img/icon/indexmes.gif"> 想要的这里都有 
												<span class="pull-right" >
													<a href="<?php echo U('Index/showBTZone');;?>">more</a>
												</span>
											</h6>
				            </div>
		          		</div>	
		        		</div>
		        		<div class="col-md-6"  style="padding:8px;padding-bottom:0px;margin-left:0px;">
		          		<div class="thumbnail" >
	            
				            <div class="caption" style="height:250px;">
				              <span class="glyphicon glyphicon-sort-by-attributes-alt" ></span><font size=4px> 高清综艺分享专区</font><br>
				              <strong ><span class="label label-primary">1</span>&nbsp&nbsp<a href="<?php echo U('Index/showZYList?type=100&p=1');;?>"> 韩国高清综艺分享专区</a></strong><br>
				              <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
				              <strong><span class="label label-warning">2</span>&nbsp&nbsp<a href="<?php echo U('Index/showZYList?type=200&p=1');;?>"> 小日本高清综艺分享专区</a></strong><br>
				              <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
				              <strong><span class="label label-primary">3</span>&nbsp&nbsp<a href="<?php echo U('Index/showZYList?type=300&p=1');;?>"> 大中华高清综艺分享专区</a></strong><br> 
				              <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
				              <strong><span class="label label-warning">4</span>&nbsp&nbsp<a href="<?php echo U('Index/showZYList?type=400&p=1');;?>"> 欧美高清综艺分享区</a></strong><br> 
				              <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
				              <strong><span class="label label-primary">5</span>&nbsp&nbsp<a href="<?php echo U('Index/showZYList?type=500&p=1');;?>"> 演唱会/MV/运动体育分享区</a></strong><br> 
				              <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
				              <strong><span class="label label-warning">6</span>&nbsp&nbsp<a href="<?php echo U('Index/showZYList?type=600&p=1');;?>"> 动漫高清分享区</a></strong><br> 
				              <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
											<h6> <img src="/kuying/Public/img/icon/indexmes.gif"> 不要吝啬你的鼠标左键 
												<span class="pull-right" >
													<a href="<?php echo U('Index/showBTZone');;?>">more</a>
												</span>
											</h6>
				            </div>
				          </div>	
		        		
		          	</div>
		          	
		        		<div class="col-md-6"  style="padding:8px;padding-top:0px;padding-bottom:0px;margin-left:0px;">
		          		<div class="thumbnail" >
				            <div class="caption" style="height:220px;">
				              <span class="glyphicon glyphicon-sort-by-attributes-alt" ></span><font size=4px> 小容量电影专区</font><br>
				              <br>  
				              <strong ><span class="label label-primary">1</span>&nbsp&nbsp<a href="<?php echo U('Index/showBDList?type=1200&p=1');;?>"> BD高清电影下载</a></strong><br>
				              <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
				              <strong><span class="label label-warning">2</span>&nbsp&nbsp<a href="<?php echo U('Index/showBDList?type=1100&p=1');;?>"> iPad/MP4电影下载区</a></strong><br>
				              <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
				              <strong><span class="label label-primary">3</span>&nbsp&nbsp<a href="<?php echo U('Index/showBDList?type=1000&p=1');;?>"> 迅雷MKV</a></strong><br> 
				              <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
				              <strong><span class="label label-warning">4</span>&nbsp&nbsp<a href="<?php echo U('Index/showBDList?type=900&p=1');;?>"> 亚洲电影下载区</a></strong><br> 
				              <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
				              <strong><span class="label label-primary">5</span>&nbsp&nbsp<a href="<?php echo U('Index/showBDList?type=800&p=1');;?>"> 欧美电影下载区</a></strong><br> 
				              <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
											<h6> <img src="/kuying/Public/img/icon/indexmes.gif"> 爱电影,爱下载,酷影懂你
												<span class="pull-right" >
													<a href="<?php echo U('Index/showBTZone');;?>">more</a>
												</span>
											</h6>
				            </div>
	          			</div>	
		        		
		          	</div> 
		          	<div class="col-md-6"  style="padding:8px;padding-top:0px;padding-bottom:0px;margin-left:0px;">
		          		<div class="thumbnail" >
	            
				            <div class="caption" style="height:220px;">
				              <span class="glyphicon glyphicon-sort-by-attributes-alt" ></span><font size=4px> 高清连续剧区</font><br>
				              <br>  
				              <strong><span class="label label-warning">1</span>&nbsp&nbsp<a href="<?php echo U('Index/showJuList?type=3300&p=1');;?>"> 电视剧下载专区</a></strong><br>
				              <div style="border-bottom:1px solid #999;margin-bottom:4px; "></div>
				              <br> 
				              <strong><span class="label label-primary">2</span>&nbsp&nbsp<a href="<?php echo U('Index/showJuList?type=3400&p=1');;?>"> 美/英剧下载专区</a></strong><br> 
				              <div style="border-bottom:1px solid #999;margin-bottom:4px; "></div>
											<h6> <img src="/kuying/Public/img/icon/indexmes.gif"> 喜欢就下载,无所顾忌
												 <span class="pull-right" >
													<a href="<?php echo U('Index/showBTZone');;?>">more</a>
													</span>
											</h6>
				            </div>
				          </div>
		        		</div>
		        </div>
		        <!--BT end -->
<!--创意工坊-->
<div class="col-md-12"  style="padding:8px;padding-bottom:0px;margin-left:0px;border:1px solid #F00">
	<h4 class="" color="#fafafa">
		<img src="/kuying/Public/img/icon/toolbox.gif">
		<strong >&nbsp<a class="text-danger" target=_blank href="http://www.kyhd.net/index.php/shopping/index/index.html">创意工坊</a></strong>
		<small>  喜欢淘宝购物的你千万不要错过!最具创意最折扣的导购信息就在这里！</small>
	</h4>
  <div class="caption" style="height:220px;font-size:20px"> 
    <strong ><span class="label label-danger">1</span>&nbsp&nbsp<a target=_blank  href="http://www.kyhd.net/index.php/shopping/index/index.html">全部推荐</a></strong><br>
    <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
    <strong><span class="label label-warning">2</span>&nbsp&nbsp<a target=_blank href="http://www.kyhd.net/index.php/shopping/index/listgoods/kind/0/s/0/p/0.html"> 运动休闲</a></strong><br>
    <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
    <strong><span class="label label-danger">3</span>&nbsp&nbsp<a target=_blank href="http://www.kyhd.net/index.php/shopping/index/listgoods/kind/1/s/0/p/0.html"> 数码电脑</a></strong><br> 
    <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
    <strong><span class="label label-warning">4</span>&nbsp&nbsp<a target=_blank href="http://www.kyhd.net/index.php/shopping/index/listgoods/kind/2/s/0/p/0.html"> 创意生活</a></strong><br> 
    <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
    <strong><span class="label label-danger">5</span>&nbsp&nbsp<a target=_blank href="http://www.kyhd.net/index.php/shopping/index/listgoods/kind/3/s/0/p/0.html"> 保健养生</a></strong><br> 
    <div style="border-bottom:1px solid #999;margin-bottom:8px; "></div>
		<h6> <img src="/kuying/Public/img/icon/indexmes.gif"> 创意工坊，更懂你！
			<span class="pull-right" >
				<a href="<?php echo U('Index/showBTZone');;?>">more</a>
			</span>
		</h6>
  </div>
</div>
<!--创意工坊 end -->
			      <!--酷影工具箱-->
	      		<div class="col-md-12"  style="padding:8px;padding-bottom:0px;margin-left:0px;">
		      		<h4 color="#fafafa"><img src="/kuying/Public/img/icon/toolbox.gif"><strong >&nbsp酷影工具箱</strong><small>  免费使用迅雷帐号，高性能播放器下载，字幕搜索！</small></h4>
		      		
			      	<div class="row" style="padding:5px;margin-left:0px;background-color:#fafafa;" >
			          		<div class="thumbnail" style="padding-top:10px;">
					            <ul class="list-inline">
											  <li><span class="badge">1</span><a href="<?php echo U('Tools/getThId?type=1200&p=1');;?>"> <strong>免费使用迅雷帐号</strong></a></li>
											  <li><span class="badge">2</span><a href="<?php echo U('Tools/index');;?>"> <strong>高性能播放器下载</strong></a></li>
											  <li><span class="badge">3</span><a href="<?php echo U('Tools/getThId?type=1200&p=1');;?>"> <strong>字幕搜索推荐</strong></a></li>
											  <li><span class="badge">3</span><a href="http://s.click.taobao.com/v0Q1m6y"> <strong>字幕搜索推荐</strong></a></li>
											</ul>
			          		</div>	
			        </div>
			      </div>
			      <!--酷影工具箱 end -->
		      </div>
		      
		       <!--WB start -->
		      <div class="col-md-4"  style="padding:1px;padding-bottom:0px;margin-top:10px;margin-left:0px;margin-bottom:0px;">
<h4><img src="/kuying/Public/img/icon/donate.gif"><strong >&nbsp捐助我们</strong></h4>
<div class="thumbnail" style="padding:6px;margin-left:5px;" >
	<div class="row" >
		<div class="col-md-12" style="margin-top:0px;margin-right:4px">
			<h5 class="text-danger"><strong>酷影网的发展需要money，1毛不嫌少，1k万不嫌多,为了网站更好的发展，希望影迷们多支持！</strong></h5>
			<h5 class="text-center"><strong>支付宝捐助&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp微信捐助</strong></h5>
			<center><img src="/kuying/Public/img/icon/zfb.gif">&nbsp&nbsp&nbsp<img src="/kuying/Public/img/icon/wxzf.gif"></center>
		</div>
	</div>
</div>
								<h4><img src="/kuying/Public/img/icon/wbinfo.gif"><strong >&nbsp微博影讯</strong></h4>
								<div class="thumbnail" style="padding:6px;margin-left:5px;" >
									<div class="row" >
										<div class="col-md-12" style="margin-top:0px;margin-right:0px;padding-right:2px">
										<iframe width="94%" height="680" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=800&fansRow=2&ptype=1&speed=100&skin=5&isTitle=0&noborder=0&isWeibo=1&isFans=0&uid=3911891253&verifier=334d9855&dpc=1"></iframe>
										</div>
									</div>
								</div>
	        </div>
	        <!--WB end -->

		    
	        <!--抽奖 start -->
	        <div class="col-md-12"  style="padding:8px;padding-bottom:0px;margin-left:0px;">
		        <h4 color="#fafafa"><img src="/kuying/Public/img/icon/award.gif"><strong >&nbsp酷影抽奖台</strong><small> 碰碰运气噢，送积分，送电影票哦！</small></h4>
		      	<div class="row" style="padding:0px;margin-left:0px;background-color:#fafafa;" >
			        	<div class="col-md-12"  style="padding:8px;padding-bottom:3px;margin-left:0px;">
		          			<div class="row">
			          			<div class="col-md-2">
						            <div class="leftimg" >
						            	<img src="/kuying/Public/img/index/rateimages/indexaword.gif">
					            	</div>
					            </div>
					            <div class="col-md-5" >
						              <div class="rotate-con-pan">
														<div class="rotate-con-zhen">
															
														</div>
													</div>
					            </div>
					            <div class="col-md-5">
						              <h4><strong >抽奖规则</strong></h4>
						             	<p style="font-size:15px;" class="text-danger"> 1. 参与抽奖必须为注册会员，且登录；
													</p>
													<p style="font-size:15px;" class="text-danger">2. 参与抽奖一次需要花费1个积分；
													</p>
													<p style="font-size:15px;" class="text-danger">3. 一天最多只能抽奖抽三次呦；
													</p>
													<p style="font-size:15px;" class="text-danger">4. 最高奖电影票每月将会随机加入抽奖奖品；
													</p>
													<p style="font-size:15px;" class="text-danger">5. 如果抽中电影票，请及时通过QQ向管理员核实；
													</p>
													<p style="font-size:15px;" class="text-danger">6. 抽奖活动最终解释权归酷影网所有；
													</p>
													
					            </div>
				            </div>	
		        		</div>
		        </div>
		      </div>
	        <br>
					 <!--TAOBAO end -->
      	</div>
      	
      <!--right-->
	      <div class="col-md-2" style="padding:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;" >
	      	<h4><img src="/kuying/Public/img/icon/signindex.gif">&nbsp每日签到 <small>Everyday!</small></h4>
	        <div class="row" style="padding-left:0px;padding-top:0px;margin:0px;">
	        	<div class="thumbnail" style="padding:0px;margin:0px;" >
	        		<img src="/kuying/Public/img/icon/sign.gif" class="img-responsive">
	            <div class="caption" >
	              <!--<span class="glyphicon glyphicon-sort-by-attributes-alt" ></span><font size=5px>商务区</font><br>
	              <br> --> 
	              <strong><span ><img src="/kuying/Public/img/icon/chicken.gif" ></span> <font size="3px">注意啦！每天签到就送20个积分，注册即送30积分！有了积分才能下载哦！点击下面的按钮签到吧！</font></strong><br>
	              <p></p>
	              <p><button id="signbtn" type="button" class="btn btn-success btn-lg btn-block" >点我签到送积分</button></p>
	              <div style="border-bottom:1px solid #999;margin-bottom:0px; "></div>
	              <div style="border-bottom:1px solid #999;margin-bottom:4px; "></div>
	              <div class="col-md-12" style="padding:2px;margin-top:9px;margin-bottom:0px;"><span class="label label-primary"> QQ讨论群</span></div>
	              <div class="col-md-12" style="padding:2px;margin-top:5px;margin-bottom:0px;">
	              	<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=341e04b4d811ca828e92e3e8dd41b6f6e694c98f536d13260245155c796e8222">
											<img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="酷影网高清交流群" title="酷影网高清交流群">
									</a>
								</div>
								<h6>· 加群申请，请注明："酷影"</h6>	
								<hr>
									<p style="font-size:15px;"><span class="label label-success">微信公众账号</span></p>
									<p class="text-center"><img src="/kuying/Public/img/icon/weixin.gif"></p>
	            </div>
	          </div>
	          
	          
	          <hr>
	          <h4><img src="/kuying/Public/img/icon/shareindex.gif">分享精彩<small> Sharing</small></h4>
	          <div class="thumbnail" style="padding-left:2px;margin:0px;" >
	          	<div class="row" >
	          		<div class="col-md-12" style="margin-top:8px;margin-right:0px;padding-right:0px">
									<div class="bdsharebuttonbox" data-tag="share_1">
											<a class="bds_mshare" data-cmd="mshare"></a>
											<a class="bds_weixin" data-cmd="weixin"></a>
											<a class="bds_qzone" data-cmd="qzone" href="#"></a>
											<a class="bds_tsina" data-cmd="tsina"></a>
											<a class="bds_baidu" data-cmd="baidu"></a>
											<a class="bds_renren" data-cmd="renren"></a>
											<a class="bds_more" data-cmd="more">更多</a>
										</div>
		          	</div>
	          	</div>
	          </div>
	          
	        </div>          
</div> 
	      <script>
	window._bd_share_config = {
		common : {
			bdText : '自定义分享内容',	
			bdDesc : '自定义分享摘要',	
			bdUrl : '自定义分享url地址', 	
			bdPic : '自定义分享图片'
		},
		share : [{
			"bdSize" : 32
		}],
		slide : [{	   
			bdImg : 0,
			bdPos : "right",
			bdTop : 100
		}],
		selectShare : [{
			"bdselectMiniList" : ['qzone','tqq','kaixin001','bdxc','tqf']
		}]
	}
	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>
 
    	</div> 	
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
  </body>
  	<script type="text/javascript" src="/kuying/Public/bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="/kuying/Public/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/kuying/Public/bootstrap/js/manager.js"></script>
		<script type="text/javascript" src="/kuying/Public/bootstrap/js/MSClass.js"></script>
		<script type="text/javascript" src="/kuying/Public/bootstrap/js/jQueryRotate.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
			    $('.carousel').carousel({
			        interval: 2000
			    });
			
			    $('.carousel').carousel('cycle');
			});
		</script>
		<script type="text/javascript" src="/kuying/Public/bootstrap/js/script.js"></script>
		<script type="text/javascript">
		$(function(){
			$(".rotate-con-zhen").rotate({
				bind:{
					click:function(){
						var get_score = 0;
						var a = runzp();
						var message;
						 $(this).rotate({
							 	duration:4000,               //转动时间
							 	angle: 0,                    //起始角度
		            			animateTo:1440+a.angle,      //结束的角度
								easing: $.easing.easeOutSine,//动画效果，需加载jquery.easing.min.js
								callback: function(){
									switch(a.prize)
									{
										case 1:
											//alert("一等奖");
											get_score = 50;
											message = "恭喜您，获得一等奖：" + get_score +"积分！";
										break; 
										case 2:
											//alert("二等奖");
											get_score = 30;
											message = "恭喜您，获得二等奖：" + get_score +"积分！";
										break; 
										case 3:
											//alert("三等奖");
											get_score = 30;
											message = "恭喜您，获得三等奖：" + get_score +"积分！";
										break; 
										case 4:
											//alert("左上等奖");
											get_score = 8;
											message = "恭喜您，获得鼓励奖：" + get_score +"积分！";
										break; 
										case 5:
											//alert("下等奖");
											get_score = 5;
											message = "恭喜您，获得鼓励奖：" + get_score +"积分！";
										break; 
										case 6:
											//alert("右等奖");
											get_score = 3;
											message = "恭喜您，获得鼓励奖：" + get_score +"积分！";
										break; 
										case 0:
											//alert("无");
											message = "不好意思，手气太差，没有抽中，下次继续努力吧！";
										break; 
									} 
									var url = '/kuying/index.php/Home/Index/getScore/';  
									var datasend = {
					            score: get_score
					        };
									$.ajax({  
										type: "post",  
										url: url,  
										dataType: "json",  
										data: datasend,
										timeout: 1000,//超时时间 
										success: function(msg)
										{  
											window.location.reload();
											//alert(msg);4 未登录 3 分数不够 2 超过抽奖次数 1写入成功 0 分数更新失败，网络原因等
											if(msg == 0)
											{
												
											}else if(msg == 1)
											{
												alert(message);
											}else if(msg == 2)
											{
												alert("亲，一天只能抽3次，明天吧！");
											}else if(msg == 3)
											{
												alert("亲，分数不够，抽一次需要1个积分呦！");
											}else if(msg == 4)
											{
												alert("亲，还没登录呢，先登录吧！");
											}
										}  
									});  
									//alert(a.prize+a.message);//简单的弹出获奖信息
									
								}
								
						 });
					}
				}
			});
		});
		</script>
	  <script>
  	$(document).ready(function(){
		  $("#l1").addClass("active");	
		  $("#signbtn").click(function() 
		  {   
				var url = '/kuying/index.php/Home/Index/signEveryday';  
				$.ajax({  
					type: "get",  
					url: url,  
					dataType: "json",  
					timeout: 1000,//超时时间 
					success: function(msg)
					{  
						window.location.reload();
						if(msg == 1)
						{
							alert("获得20个积分奖励！记得明天继续签到哦");
						}else if(msg == 2)
						{
							alert("对不起，已经签过到了！");
						}else if(msg == 3)
						{
							alert("亲，还木登录，快去登录吧！");
						}else if(msg == 0)
						{
							alert("分数更新失败，可能网络有问题！");
						}
					}  
				});  
			}); 	  
		}); 
  	</script>
</html>