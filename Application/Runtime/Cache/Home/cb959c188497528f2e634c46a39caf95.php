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
  	#zonelist a
  	{
  		color:#CC3300;
  	}
  	hr
  	{
  		margin-top: -4px;
  		margin-bottom:4px;
  	}
  	.page{ float:right; padding:10px;}
		.page div{border-left:1px solid #09F; overflow:hidden;}
		.page span,.page a{ float:left; height:32px; line-height:32px; padding:0px 10px;background:#fff; border:1px solid #09F; border-left:none; font-size:14px;}
		.page .current{ background:#09f; color:#fff;}
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
    <div class="jumbotron visible-lg visible-md visible-sm visible-xs" style="margin-top:40px;margin-bottom:0px;padding:0px;background-color:white;"    draggable="true">
    	<div class="container" style="padding:0px;margin-top:0px;margin-bottom:0px;" >
    		<h3><img src="/kuying/Public/img/icon/map.gif">1080pBT分享专区<small> 发掘，提供，分享 we do it</small></h3>
      </div>
    		<!--left-->
    	<div class="container" style="padding:0px;margin-top:0px;margin-bottom:0px;" >
      	<!--left-->
      	<div class="col-md-10" style="padding-left:5px;margin-left:0px;" >
      		<h6>
	      		<a href="<?php echo U('Index/showindex');;?>"><img src="/kuying/Public/img/icon/index.gif" width=16px > 首 页/</a>
	      		<a href="<?php echo U('Index/showBTZone');;?>">BT共享区/</a>
	      		<a href="<?php echo U('Index/showHDList?type=1600&p=1');;?>">1080pBT分享专区</a>
      		</h6>
      		<hr>
      		<?php if(I('get.p') == 1): ?><img width="100%" src="/kuying/Public/img/BTzone/1.gif">
      		<h4 color="#fafafa"><img src="/kuying/Public/img/icon/hotrec.gif">热门推荐<small> 高清电影BT倾情推荐</small></h4>
      		<!--BT TOP -->
      		
	        	<div class="row" style="padding:0px;margin-left:0px;margin-right:0px;">
	        	<div class="row" style="padding:8px;margin-left:0px;background-color:#fafafa;">
	        	
		          <div class="thumbnail" style="margin-bottom:10px">
										<table id="zonelist" class="table table-striped">
											   <thead>
											      <tr>
											      	 
											      	 	<th width="1%"></th>
											      	 	<th width="6%"><small>类 型</small></th>
											         	<th><center><small>资 源 名 称</small></center></th>
											         	<th width="5%"><small>浏览</small></th>
											         	<th width="5%"><small>积分</small></th>
											         
											      </tr>
											   </thead>
											   <tbody>
											   	<?php if(is_array($listtop)): foreach($listtop as $key=>$vo): ?><tr>
											      	<td><img src="/kuying/Public/img/icon/list.gif"></td>
											      	<td><font color="#007edf">[<?php echo ($vo["TYPE"]); ?>]</font></td>
											         <td>
											         	
											         	<a href="<?php echo U('Index/showHDcontent?fid='.$vo[FID].'');;?>">
											         		<?php echo ($vo["FNAME"]); ?>		
											         	</a>
											         	<small><img src="/kuying/Public/img/icon/listinfo.gif">上传时间<?php echo date('Y/m/d',intval($vo[UPTIME]/1000)); ?></small>
											         </td>
											         <td><small><?php echo ($vo["SCAN_NUM"]); ?></small></td>
											         <td><small><?php echo ($vo["SCORE"]); ?></small></td>
											      </tr><?php endforeach; endif; ?>
											   </tbody>
											</table>
			        </div> 
	          </div> 
</div><?php endif; ?>
	        <!--search	        -->
	        <h4 color="#fafafa"><img src="/kuying/Public/img/icon/resourcelist.gif">高清电影区搜索</h4>
				      <form class="navbar-form" role="search" action="<?php echo U("Index/search?sea_zone=1&s_p=1");?>" method="post">
				      	<div class="form-group" style="width:50%">
								         <input type="text" class="form-control" name = "sea_txt"style="width:100%" placeholder="Search">
						     </div>
				         <button type="submit" class="btn btn-default">提交</button>
				      </form>    
				   <hr>
	        <h4 color="#fafafa"><img src="/kuying/Public/img/icon/resourcelist.gif">全部资源</h4>
								<a href="<?php echo U('Index/showHDList?type=1600&p=1');;?>" class="btn btn-default">全部</a>
		            <a href="<?php echo U('Index/showHDList?type=1601&p=1');;?>" class="btn btn-default">冒险</a>
		            <a href="<?php echo U('Index/showHDList?type=1602&p=1');;?>" class="btn btn-default">动作</a>
		            <a href="<?php echo U('Index/showHDList?type=1603&p=1');;?>" class="btn btn-default">犯罪</a>
		            <a href="<?php echo U('Index/showHDList?type=1604&p=1');;?>" class="btn btn-default">动画</a>
		            <a href="<?php echo U('Index/showHDList?type=1605&p=1');;?>" class="btn btn-default">家庭</a>
		            <a href="<?php echo U('Index/showHDList?type=1606&p=1');;?>" class="btn btn-default">爱情</a>
		            <a href="<?php echo U('Index/showHDList?type=1607&p=1');;?>" class="btn btn-default">奇幻</a>
		            <a href="<?php echo U('Index/showHDList?type=1608&p=1');;?>" class="btn btn-default">恐怖</a>
		            <a href="<?php echo U('Index/showHDList?type=1609&p=1');;?>" class="btn btn-default">剧情</a>
		            <a href="<?php echo U('Index/showHDList?type=1610&p=1');;?>" class="btn btn-default">科幻</a>
		            <a href="<?php echo U('Index/showHDList?type=1611&p=1');;?>" class="btn btn-default">悬疑</a>
		            <a href="<?php echo U('Index/showHDList?type=1612&p=1');;?>" class="btn btn-default">战争</a>
		            <a href="<?php echo U('Index/showHDList?type=1613&p=1');;?>" class="btn btn-default">悬念</a>
		            <a href="<?php echo U('Index/showHDList?type=1614&p=1');;?>" class="btn btn-default">喜剧</a>
		            <a href="<?php echo U('Index/showHDList?type=1615&p=1');;?>" class="btn btn-default">惊悚</a>
		            <a href="<?php echo U('Index/showHDList?type=1616&p=1');;?>" class="btn btn-default">传记</a>
		            <a href="<?php echo U('Index/showHDList?type=1617&p=1');;?>" class="btn btn-default">合集</a>
		            <a href="<?php echo U('Index/showHDList?type=1620&p=1');;?>" class="btn btn-default">其它</a>
		            <span><div class="page"><?php echo ($page); ?></div></span><span>123</span>
      		<!--BT list -->
	        <div class="row" style="padding:0px;margin-left:0px;margin-right:0px;">
	        	<div class="row" style="padding:8px;margin-left:0px;background-color:#fafafa;">
	        		
			          <div class="thumbnail" style="margin-bottom:10px">
											<table id="zonelist" class="table table-striped">
											   <thead>
											      <tr>
											      	 
											      	 	<th width="1%"></th>
											      	 	<th width="6%"><small>类 型</small></th>
											         	<th><center><small>资 源 名 称</small></center></th>
											         	<th width="5%"><small>浏览</small></th>
											         	<th width="5%"><small>积分</small></th>
											         
											      </tr>
											   </thead>
											   <tbody>
											   	<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
											      	<td><img src="/kuying/Public/img/icon/list.gif"></td>
											      	<td><font color="#007edf">[<?php echo ($vo["TYPE"]); ?>]</font></td>
											         <td>
											         	
											         	<a href="<?php echo U('Index/showHDcontent?fid='.$vo[FID].'');;?>">
											         		<?php echo ($vo["FNAME"]); ?>		
											         	</a>
											         	<small><img src="/kuying/Public/img/icon/listinfo.gif">上传时间<?php echo date('Y/m/d',intval($vo[UPTIME]/1000)); ?></small>
											         </td>
											         <td><small><?php echo ($vo["SCAN_NUM"]); ?></small></td>
											         <td><small><?php echo ($vo["SCORE"]); ?></small></td>
											      </tr><?php endforeach; endif; ?>
											   </tbody>
											</table>
				        </div> 
			      	
	          </div> 
	          <div class="page"><?php echo ($page); ?></div>   
</div>
      	</div>
      	
      <!--right-->
      	<div class="col-md-2" style="padding:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;" >
	<div class="panel panel-default">
			<div class="panel-heading">
			  <h4 ><strong>创意工坊热门板块</strong></h4>
			</div>
			<div >
				<a target= _blank href="<?php echo U('Zones/show99?p=0');;?>"><img width=100% src="/kuying/Public/img/loveshop/9_9.gif"></a>
			</div>
			<div >
				<a target= _blank href="<?php echo U('Zones/showOther?z_sort=2');;?>"><img src="/kuying/Public/img/loveshop/season.gif"></a>
			</div>
			<div >
				<a target= _blank href="<?php echo U('Zones/showOther?z_sort=3');;?>" ><img src="/kuying/Public/img/loveshop/film.gif"></a>
			</div>
	</div>
</div>
      	<div class="col-md-2" style="padding:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;" >
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
      <!--right end-->
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
    <!--  下边栏 -->
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
		<script>
			$(document).ready(function(){
			$("#l2").addClass("active")
			}); 
		</script>
</html>