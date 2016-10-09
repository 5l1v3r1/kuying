<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb" lang="zh-CN">
  <head>
    <title>创意工坊:最具创意的淘宝/天猫导购服务</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="酷影网创意工坊～折扣创意产品推荐">
    <meta name="author" content="酷影网">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/kuying/Public/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">  
    <link href="/kuying/Public/bootstrap/css/cas_style.css" rel="stylesheet" type="text/css">  
    <script type="text/javascript" src="/kuying/Public/bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="/kuying/Public/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/kuying/Public/bootstrap/js/manager.js"></script>
  </head>
  <body style=" FONT-FAMILY: 微软雅黑">
	  	<!-- top2 start -->
  			<div class="jumbotron visible-lg visible-md visible-sm visible-xs" style="padding:0px;margin-top:0px;margin-bottom:0px;background-color:white;"  draggable="true">
						<div class="container">
              <div class="row">
                  <div class="col-md-3">
										<div class="row" >
												<div class="col-md-12" style="margin-top:0px;margin-right:4px">
													<img src="/kuying/Public/img/loveshop/logo.gif">
												</div>
											</div>
                  </div>
                  <div class="col-md-4">
										<div class="row" >
												<div class="col-md-12" style="padding-top:20px;">
													<form class="bs-example bs-example-form" action="<?php echo U("Index/search");?>" method="post" role="search">
											         <div class="col-lg-12" style="padding-top:8px;">
											            <div class="input-group">
											               <input type="text" class="form-control" name = "se_cont" placeholder="搜索">
											               <span class="input-group-btn">
											                  <button type="submit" class="btn btn-default">搜索</button>
											               </span>
											            </div><!-- /input-group -->
											         </div><!-- /.col-lg-6 -->
													</form>
												</div>
											</div>
                  </div>
                  <div class="col-md-5">
										<div class="row" >
												<div class="col-md-12" style="margin-top:0px;margin-right:4px">
													<h4 class="text-danger ">真诚地服务广大酷影网用户</h4>
												</div>
												<div class="col-md-12" style="margin-top:0px;margin-right:4px">
													<h4 class="text-right text-danger">提供最具创意的淘宝/天猫导购服务</h4>
												</div>
											</div>
                  </div>
              </div>
			      </div>
   			</div>
   		<!-- top2end -->
   		<!-- nav start --> 		
	    <nav class="navbar navbar-default" role="navigation" style="margin-bottom:0px;background-color:#CC0000;">	
			   <div class="container" style="background-color:#CC0000;">
				   <div>
				      <ul class="nav navbar-nav" style="font-size:15px">
				         <li id="l1"><a style="color:white" href="<?php echo U('Index/index');;?>"><strong>工坊首页</strong></a></li>
				         <li id="l2"><a style="color:white" href="<?php echo U('Index/listgoods?kind=0&s=0&p=0');;?>"><strong>运动休闲</strong></a></li>
				         <li id="l3"><a style="color:white" href="<?php echo U('Index/listgoods?kind=1&s=0&p=0');;?>"><strong>数码电脑</strong></a></li>
				         <li id="l4"><a style="color:white" href="<?php echo U('Index/listgoods?kind=2&s=0&p=0');;?>"><strong>创意生活</strong></a></li>
				         <li id="l5"><a style="color:white" href="<?php echo U('Index/listgoods?kind=3&s=0&p=0');;?>"><strong>保健养生</strong></a></li>
				         <li id="l6"><a style="color:white" href="<?php echo U('Index/listgoods?kind=4&s=0&p=0');;?>"><strong>其它</strong></a></li>
				        <!-- <li id="l7"><a style="color:white" href="<?php echo U('Index');;?>"><strong>好店顶起</strong></a></li>-->
				         <li id="l7"><a style="color:white" href="http://www.kyhd.net/index.php/home/index/showindex.html"><strong>返回酷影网</strong></a></li>
				      </ul>
				   </div>
					 <div>
					 	<?php if(session('u_UID')): ?><div class="nav navbar-nav navbar-right">
										   <a class="pull-left" href="#">
										   		<?php if(cookie('head')): ?><img src="<?php echo ($_COOKIE['head']); ?>" style="width:40px;height:40px;margin-top:3px;padding:1px;border:1px solid #777777;"  />
										      <?php else: ?>
										      	<img src="/kuying/Public/img/icon/none.gif" style="width:40px;height:40px;margin-top:3px;padding:1px;border:1px solid #777777;"  /><?php endif; ?>
										   </a>
										   <div class="media-body">
										   	
										      <div class="text-primary" style><font color="white">欢迎回来:&nbsp<strong><?php echo ($_SESSION['u_username']); ?></strong>！</font></div>
										 			<div >
										 				<label class=""><font color="white">积分:<?php echo ($_SESSION['u_score']); ?>&nbsp</font></label>
										 				&nbsp
										 				<a id="reg_link" title="退出登录" href="http://www.kyhd.net/index.php/home/login/outlogin.html" ><font color="white">退出</font></a>
										 			</div>
										 		
										   </div>
										</div>
		 				<?php else: ?> 
							<ul class="list-inline" style="padding-top:10px;float:right;color:white">
							  <li>Hi ,您好，请</li>
							  <li> <a id="login_link"   class="navbar-link" href="http://www.kyhd.net/index.php/home/login/loginpage.html" ><font color="white">登录</font></a></li>
							  <li> <a id="reg_link"   class="navbar-link" href="http://www.kyhd.net/index.php/home/login/register.html" ><font color="white">注册</font></a></li>
							</ul><?php endif; ?>
	 				 </div>
			   </div>
			</nav>
			<!-- nav end -->
   		<div class="jumbotron visible-lg visible-md visible-sm visible-xs" style="padding:0px;margin-top:10px;margin-bottom:0px;background-color:white;"  draggable="true">
					<div class="container">
		        <div class="row">
		        	<h6>
			      		<a href="<?php echo U('Index/index');;?>"><img src="/kuying/Public/img/icon/index.gif" width=16px > 工坊首页/</a>
			      		<a href="<?php echo U('Index/listgoods?kind='.$_k.'&s=0&p=0');;?>"><?php echo ($list['GOOD_SORT']); ?>/</a>
			      		<?php echo ($list['TITLE']); ?>
			      	</h6>
		        	<div class="col-md-9">
		        		
		        		<center>
		        			<h4 ><strong><?php echo ($list['TITLE']); ?></strong></h4>
		        			<ul class="list-inline">
		        										<li class="text-danger"><small>浏览量&nbsp&nbsp<?php echo ($list['SCAN_NUM']); ?></small></li>
		        										<li class="text-danger"><small>发布于&nbsp<?php echo date('Y/m/d H:i:s',$list['TIME']); ?></small></li>
															  <li class = "up">
															  	<a id="<?php echo ($list['id']); ?>" >
													          <span class="glyphicon glyphicon-thumbs-up"></span>
													        </a>
													        <label id="l1"> <?php echo ($list['DING']); ?> </label>
															  </li>
															  <li class = "low">
															  	<a id="<?php echo ($list['id']); ?>">
													          <span class="glyphicon glyphicon-thumbs-down"></span>
													        </a>
													        <label id="l2"> <?php echo ($list['LOW']); ?> </label>
															  </li>
															  
									</ul>
									<hr>
								</center> 
								<ul class="media-list">
									<?php $str = $list['INFO_IMG']; $str = explode("http",$str);?>
                    <li class="media">
                        <div class="pull-right" href="#">
                        	<img style="height:120px;width: 120px;" class="media-object" src="http<?php echo ($str[1]); ?>" >
                        	</br>
                        	<center><a href="<?php echo ($list['GOOD_SRC']); ?>" target= _blank class="btn btn-danger btn-lg">我要买！</a></center>
                        </div>
                        <div class="media-body">
                            <p style="font-size: 15px;line-height:30px"> <?php echo ($list['INFO_TXT']); ?></p>
                        </div>
                    </li>
                </ul> 
                
                <center>
                  <?php if(is_array($str)): $i = 0; $__LIST__ = array_slice($str,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img width="80%" class="media-object" src="http<?php echo ($vo); ?>" ></br><?php endforeach; endif; else: echo "" ;endif; ?>
                </center>
                <div class="container" style="padding:10px;margin-top:0px;margin-bottom:0px;">
		<div class="row">
			<h4><strong>用户评论</strong>
      </h4>
      <h4 class="text-right">
      	<a class="text-right" href="#mark">
          <span class="glyphicon glyphicon-comment "><strong>发表评论</strong></span>
        </a>
      </h4>
			<hr style="border:1px solid red">
				<ul class="media-list">
				         	<?php if(is_array($list_r)): foreach($list_r as $key=>$vo): ?><li class="media">
	                      <a class="pull-left" href=""><img style="height:50px;width: 50px;border:1px solid #777777;" src="<?php echo ($vo['USERIMG']); ?>" ></a>
		                      <div class="media-body" style="padding-left:10px">
		                          <small><?php echo ($vo["USER"]); ?></small>
		                          <p style="font-size: 10px;"><strong><?php echo ($vo['REMARK']); ?></strong>
		                          </p> 
		                          <small>
		                          <ul class="list-inline text-right">
		                          	<li><?php echo date('Y/m/d H:i:s',$vo['TIME']); ?></li>
															  <li class = "up_r">
															  	<a id="<?php echo ($vo['id']); ?>" >
													          <span class="glyphicon glyphicon-thumbs-up"></span>
													        </a>
													        <label id="l_r<?php echo ($vo['id']); ?>"> <?php echo ($vo['DING']); ?> </label>
															  </li>
															  <li></li>
															  <li class = "low_r">
															  	<a id="<?php echo ($vo['id']); ?>">
													          <span class="glyphicon glyphicon-thumbs-down"></span>
													        </a>
													        <label id="ll_r<?php echo ($vo['id']); ?>"> <?php echo ($vo['LOW']); ?> </label>
															  </li>
															</ul>  
															</small>
		                      </div>
	                      
	                  </li>
	                  <hr><?php endforeach; endif; ?>
	      </ul>
			<h4 id="mark"><strong>发表评论</strong></h4>
			<form role="form" class="form-horizontal" >
			<div class="form-group">   
          <div class="col-md-12" > 
          	<!-- 加载编辑器的容器 --> 
							<script id="container" name="content" type="text/plain">
								
	    				</script>
	    				<div style="background-color:#fafafa;padding:10px;text-align:right;"><button type="button" class="btn btn-danger" onclick="return button_click();">发布我的评论</button></div>
          </div>  
                         
   
      </div> 
    </form>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/kuying/Public/other/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/kuying/Public/other/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container', {
				    toolbars: [
				        ['undo', 'redo','cleardoc']
				    ],
				    initialFrameHeight:100,
				    autoFloatEnabled: true,
				    removeEmptyline: false,
				    maximumWords: 100,
				    autoClearinitialContent:true,
				    indentValue: '2em',
				    serialize : { 
						    //黑名单，编辑器会过滤掉以下标签 
						    blackList:{style:1, link:1,object:1, input:1, meta:1}, 
						    //白名单，编辑器会根据此配置保留对应标签下的对应标签或者属性 
						    whiteList:{  
						    } 
						},
				});
				/*
				*输出remark action="<?php echo U('Remark/getContent?rfid='.$list['FID'].'&sort=1&p=1');?>" method="post"
				*/
				var flag =false;
				function button_click()
				{
					
					var u_uid = "<?php echo ($_SESSION['u_UID']); ?>";
					if(u_uid =="")
					{
						window.location.href="http://www.kyhd.net/index.php/home/login/loginpage.html";
					}else
					{
						
						var goodid = <?php echo ($list['id']); ?>;
						var content =ue.getContent() ;
						alert(content);
						if(content == "" || content == null)
						{
							alert("亲，评论内容不能为空噢！");
							return 0;
						}
						if(content.length >200)
						{
							//alert(content.length);
							alert("亲，评论内容太长了！");
							return 0;
						}
						if(content.length<9)
						{
							alert("亲，评论内容至少三个字符！");
							return 0;
						}else
						{
							if(flag ==false){
								flag = true;
								window.location.replace("/kuying/index.php/Shopping/Index/showGood?id="+goodid+"&cont="+content+"");
								
							}
							
							return false;
	
						}
					}
					
					//alert(content);  
				}	
				$(document).ready(function(){
					$("li.up_r").click(function() 
				  {  
				  	//var aobj = $(this).children("span");
				  	//alert($(aobj[0]).attr("class"));
				  	var link_id = $(this).children("a").attr('id');
						var url = '/kuying/index.php/Shopping/Index/update_r_u_d?v=0&id='+link_id;  
						$.ajax({  
							type: "get",  
							url: url,  
							dataType: "json",  
							timeout: 1000,//超时时间 
							success: function(msg)
							{  
								//window.location.reload();
								//$(this).children("label").text(msg);
								//alert(link_id);
								if(msg == -1)
								{
									alert("亲，休息一下吧，推的太快啦！")
								}else{
									$("label#l_r"+link_id).text(msg);
								}
								//alert(msg);
							}  
						});  
					});
					$("li.low_r").click(function() 
				  {  
				  	//var aobj = $(this).children("span");
				  	//alert($(aobj[0]).attr("class"));
				  	var link_id = $(this).children("a").attr('id');
						var url = '/kuying/index.php/Shopping/Index/update_u_d?v=1&id='+link_id;  
						$.ajax({  
							type: "get",  
							url: url,  
							dataType: "json",  
							timeout: 1000,//超时时间 
							success: function(msg)
							{  
								//window.location.reload();
								//$(this).children("label").text(msg);
								//alert(link_id);
								if(msg == -1)
								{
									alert("亲，休息一下吧，推的太快啦！")
								}else{
									$("label#ll_r"+link_id).text(msg);
								}
								//alert(msg);
							}  
						});  
					});
					
				}); 
				
    </script>
    	  
		</div>
</div>
		        	</div>
		        	<div class="col-md-3">
		        			<div class="panel panel-default">
		<div class="panel-heading">
		  <h4 ><strong>热门板块</strong></h4>
		</div>
		<div >
			<a target= _blank href="<?php echo U('Zones/show99?p=0');;?>"><img src="/kuying/Public/img/loveshop/9_9.gif"></a>
		</div>
		<div >
			<a target= _blank href="<?php echo U('Zones/showOther?z_sort=2');;?>"><img src="/kuying/Public/img/loveshop/season.gif"></a>
		</div>
		<div >
			<a target= _blank href="<?php echo U('Zones/showOther?z_sort=3');;?>" ><img src="/kuying/Public/img/loveshop/film.gif"></a>
		</div>
</div>
									<div class="panel panel-default">
		<div class="panel-heading">
		  <h4 ><strong>热销宝贝</strong></h4>
		</div>
		<br>
		<ul class="media-list">
     	<?php if(is_array($list0)): foreach($list0 as $key=>$vo): ?><li class="media">
        	<?php $str = $vo['INFO_IMG']; $str = explode("http",$str);?>
            <a target= _blank href="<?php echo U('Index/showGood?id='.$vo['id'].'');;?>" class="pull-left" href=""><img style="height:60px;width: 60px;" src="http<?php echo ($str[1]); ?>"></a>
            <a target= _blank href="<?php echo U('Index/showGood?id='.$vo['id'].'');;?>">
              <div class="media-body">
                  <h6 class="text-danger"><strong><?php echo ($vo["TITLE"]); ?></strong></h6>
              </div>
            </a>
            
        </li>
        <hr><?php endforeach; endif; ?>
    </ul>
</div>
		        	</div>
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
		  <a alt="回到顶部" id="scrollUp" href="javascript:;" title="飞回顶部"></a>
		  <img class="qr_img" src="/kuying/Public/img/re_top/qr_img.png">
</div>
			    <!-- 回到顶部 -->	
      </div>

	  <script>
  	$(document).ready(function(){
		  //var upup_name = "upup<?php echo ($vo['id']); ?>";
		  //var d_c_name = ".d_c<?php echo ($vo['id']); ?>" ;
		  //alert(upup_name);
		  $("li.up").click(function() 
		  {  
		  	//var aobj = $(this).children("span");
		  	//alert($(aobj[0]).attr("class"));
		  	var link_id = $(this).children("a").attr('id');
				var url = '/kuying/index.php/Shopping/Index/update_u_d?v=0&id='+link_id;  
				$.ajax({  
					type: "get",  
					url: url,  
					dataType: "json",  
					timeout: 1000,//超时时间 
					success: function(msg)
					{  
						//window.location.reload();
						//$(this).children("label").text(msg);
						//alert(link_id);
						if(msg == -1)
						{
							alert("亲，休息一下吧，推的太快啦！")
						}else{
							$("label#l1").text(msg);
						}
						//alert(msg);
					}  
				});  
			}); 
			$("li.low").click(function() 
		  {  
		  	//var aobj = $(this).children("span");
		  	//alert($(aobj[0]).attr("class"));
		  	var link_id = $(this).children("a").attr('id');
				var url = '/kuying/index.php/Shopping/Index/update_u_d?v=1&id='+link_id;  
				$.ajax({  
					type: "get",  
					url: url,  
					dataType: "json",  
					timeout: 1000,//超时时间 
					success: function(msg)
					{  
						//window.location.reload();
						//$(this).children("label").text(msg);
						//alert(link_id);
						if(msg == -1)
						{
							alert("亲，休息一下吧，推的太快啦！")
						}else{
							$("label#l2").text(msg);
						}
						//alert(msg);
					}  
				});  
			});
				  
		}); 
  	</script>     
  </body>
</html>