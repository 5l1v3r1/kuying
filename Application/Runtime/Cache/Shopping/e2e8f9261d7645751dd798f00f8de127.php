<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb" lang="zh-CN">
  <head>
    <title>爱微淘～折扣创意产品推荐</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="高清,1080p,720p,蓝光，爱微淘">
    <meta name="author" content="酷影网">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/kuying/Public/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/kuying/Public/bootstrap/css/cas_style.css" rel="stylesheet" type="text/css">     
    <script type="text/javascript" src="/kuying/Public/bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="/kuying/Public/bootstrap/js/bootstrap.min.js"></script>
		<style>
  	.page{ padding:10px;}
		.page div{border-left:1px solid #09F; overflow:hidden;}
		.page span,.page a{ float:left; height:32px; line-height:32px; padding:0px 10px;background:#fff; border:1px solid #09F; border-left:none; font-size:14px;}
		.page .current{ background:#09f; color:#fff;}
  	</style>
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
                  <div class="col-md-3">
										<div class="row" >
												<div class="col-md-12" style="margin-top:0px;margin-right:4px">
												</div>
											</div>
                  </div>
                  <div class="col-md-2">
										<div class="row" >
												<div class="col-md-12" style="margin-top:0px;margin-right:4px">
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
		 					
		 					<p class="navbar-text navbar-right " >
		 								<ul class="list-inline" style="padding-top:10px;">
										  <li>Hi ,您好，请</li>
										  <li> <a id="reg_link"   class="navbar-link" href="http://www.kyhd.net/index.php/home/login/loginpage.html" >登录</a></li>
										  <li> <a id="reg_link"   class="navbar-link" href="http://www.kyhd.net/index.php/home/login/register.html" >注册</a></li>
										</ul>
						 				
		 
		 					</p><?php endif; ?>
	 				 </div>
			   </div>
			</nav>
			<!-- nav end -->
   		<div class="jumbotron visible-lg visible-md visible-sm visible-xs" style="padding:0px;margin-top:10px;margin-bottom:0px;background-color:white;"  draggable="true">
					<div class="container">
		        <div class="row">
		        	<h6>
			      		<a href="<?php echo U('Index/index');;?>"><img src="/kuying/Public/img/icon/index.gif" width=16px > 工坊首页/</a>
			      		<a href="">搜索页面/</a>
			      		<?php echo ($list['TITLE']); ?>
			      	</h6>
		        	<div class="col-md-9">	
								<div class="panel panel-default">
									<div class="panel-heading">
											<label><span class="glyphicon glyphicon-th" ><strong><?php echo ($empty_info); ?> </strong></span> </label>
									</div>
								</div>
								<ul class="media-list">
				         	<?php if(is_array($s_list)): foreach($s_list as $key=>$vo): ?><li class="media">
	                  	<?php $str = $vo['INFO_IMG']; $str = explode("http",$str);?>
	                      <a class="pull-left" href=""><img style="height:150px;width: 150px;" src="http<?php echo ($str[1]); ?>" height="64" width="64"></a>
	                      <a target= _blank href="<?php echo U('Index/showGood?id='.$vo['id'].'');;?>">
		                      <div class="media-body">
		                          <h4 class="text-danger"><strong><?php echo ($vo["TITLE"]); ?></strong></h4>
		                          <p style="font-size: 14px;"><?php echo mb_substr($vo['INFO_TXT'],0,120,"utf-8"); ?> 
		                          	...
		                          	<a class="btn btn-link" target= _blank href="<?php echo U('Index/showGood?id='.$vo['id'].'');;?>" ><strong>详细信息&nbsp&nbsp</strong></a><small><?php echo date('Y/m/d',$vo['TIME']); ?></small>	
		                          </p> 
		                          <ul class="list-inline">
															  <span style="float:right"><a href="<?php echo ($vo['GOOD_SRC']); ?>" target= _blank type="button" class="btn btn-danger">去购买</a></p>
															</ul>  
		                      </div>
	                      </a>
	                      
	                  </li>
	                  <hr><?php endforeach; endif; ?>
	              </ul>
	              <span><div class="page"><?php echo ($page); ?></div></span>
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
      </div>

	  <script>
  	$(document).ready(function(){
		  //var upup_name = "upup<?php echo ($vo['id']); ?>";
		  //var d_c_name = ".d_c<?php echo ($vo['id']); ?>" ;
		  //alert(upup_name);
		  /**TOP a CONTROL**/
			var kind = <?php echo ($kind); ?>;
			$("#a"+kind).removeClass('btn-default').addClass('btn-danger');
		  /**TOP a CONTROL END**/
		  /**TOP sort CONTROL**/
			var s = <?php echo ($s); ?>;
			$("#s"+s).removeClass('btn-default').addClass('btn-danger');
		  /**TOP sort CONTROL END**/
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
							$("label#l"+link_id).text(msg);
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
							$("label#ll"+link_id).text(msg);
						}
						//alert(msg);
					}  
				});  
			});
				  
		}); 
  	</script>      
  </body>
</html>