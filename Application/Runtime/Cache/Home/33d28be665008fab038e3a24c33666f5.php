<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb" lang="zh-CN">
  <head>
    <title>酷影网www.kyhd.net</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="高清,1080p,720p,蓝光，爱微淘">
    <meta name="author" content="酷影网">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/kuying/Public/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/kuying/Public/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="/kuying/Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/kuying/Public/bootstrap/js/manager.js"></script>

  </head>
  <style>
  </style>
  <script>
  	$(document).ready(function(){
		  $("#reg_link").hide();	
		  $("#fresh").click(function(){
				//$("#fresh").hide();
				var vname=$("#imgverify").attr("src");
 		 		$("#imgverify").attr("src",vname.replace(/\?.*$/,'')+'?'+Math.random());
			});	  
		}); 
  </script>
 
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
    <div class="jumbotron visible-lg visible-md visible-sm visible-xs" style="margin-top:50px;margin-bottom:0px;padding:0px;background-color:white;"    draggable="true">
    	<div class="container" style="padding:9px;margin-top:0px;margin-bottom:0px;" >
      		<!--bt-->
	        <!--TAOBAO start -->
	        <div class="row" style="padding:0px;margin-left:0px;margin-right:0px;">
	        	<h3 color="#fafafa">欢迎注册酷影HD会员<small> Join me！</small></h3>
	        	<div class="row" style="padding:8px;margin-left:0px;background-color:#fafafa;">
		          	<div class="thumbnail" style="height:auto;">
			            <div class="row" style="margin-left:5px;margin-right:5px;padding:10px; width:50%;">
					          
							          <form role="form" class="form-horizontal" action="<?php echo U("Login/post_reginfo");?>" method="post">  
					                <div class="form-group">  
					                    <label class="col-md-3 control-label" for="name">用 户 名</label>  
					                    <div class="col-md-9">  
					                        <input class="form-control" name="name" type="text" id="name" placeholder="Name" value="" />  
					                    </div>  
					                </div> 
					                <div class="form-group">  
					                    <label class="col-md-3 control-label" for="name">电子邮箱</label>  
					                    <div class="col-md-9">  
					                        <input class="form-control" name="email" type="text" id="email" placeholder="Email" value="" />  
					                    </div>  
					                </div>   
					                <div class="form-group">  
					                    <label class="col-md-3 control-label" for="exampleInputPassword1">请输入密码</label>  
					                    <div class="col-md-9">  
					                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">  
					                    </div>  
					                </div>  
					                <div class="form-group">  
					                    <label class="col-md-3 control-label" for="exampleInputPassword2">请再输一遍</label>  
					                    <div class="col-md-9">  
					                        <input type="password" name="cfpassword" class="form-control" id="exampleInputPassword2" placeholder="Password">  
					                    </div>  
					                </div>
					                <div class="form-group">
															<label class="col-md-3 control-label" for="name">验证码</label> 
						        					<div class="col-md-8">
											        	<input type="text"  name="verify" class="form-control" id="verify" placeholder="&nbsp&nbsp验证码" style="width:100%；padding-right: 0px;  padding-left: 0px;"  > 
																<br><span><img id="imgverify" src='<?php echo U('Home/Login/verify',array());?>' onClick="this.src=this.src+'?'+Math.random()" />
											        	</span>	
											        	<span>
											        	<a id="fresh" > <font size="2">看不清？换一张 </font></a>	
											        	</span>										        
											        </div>
											     </div>  		  		  
					                <div class="form-group">  
					                    <div class="col-md-offset-2 col-md-12">  
					                        <button type="submit" class="btn btn-primary  btn-large">  
					                            同意用户协议并提交 
					                        </button>  
					                        <button type="reset" class="btn btn-primary btn-large">  
					                            重新填写 
					                        </button>  
					                    </div>  
					                </div>  
			            			</form> 
	            		</div>  
		        
		          </div>
								<h4>用户协议</h4>
									<blockquote >
										<ul class="list-unstyled">
											<small>
										  <li>1. 本站基于互联网自由分享，所有bt种子文件均来自互联网，践行互联网共享精神;</li>
										  <li>2. 本站只作为一个bt种子暂存平台，服务器不保存任何影视、音乐、游戏等资源或文件</li>
										  <li>3. 本站不参与bt种子的制作、所有，因此本站不承担任何法律责任！ </li>
										  <li>4. 注册本站后请积极登录网站，网站需要大家的支持！ </li>
										  <li>5. 若有相关资源涉及您的版权或知识产权或其他利益，请及时联系我们：net33ph@yeah.net，确认后，我们会尽快删除。</li>
										  </small>
										</ul>
									</blockquote>  
	          </div> 
	        </div>
      	
      <!--right-->
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
    <script type="text/javascript" src="/kuying/Public/bootstrap/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/kuying/Public/bootstrap/js/messages_zh.js"></script>
    <script type="text/javascript" src="/kuying/Public/bootstrap/js/Form.js"></script>
    		  <script type="text/javascript" charset="utf-8">  
            MyValidator.init();  
        </script> 
  </body>
	
</html>