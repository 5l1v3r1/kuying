<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>酷影网后台首页</title>
<link href="/kuying/Public/backend/dwz/themes/default/style.css" rel="stylesheet" type="text/css" />
<link href="/kuying/Public/backend/dwz/themes/css/core.css" rel="stylesheet" type="text/css" />
<link href="/kuying/Public/backend/dwz/themes/css/extcore.css" rel="stylesheet" type="text/css" />
<!--[if IE]>
<link href="/kuying/Public/dwz/themes/css/ieHack.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script src="/kuying/Public/backend/dwz/js/speedup.js" type="text/javascript"></script>
<script src="/kuying/Public/backend/dwz/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/kuying/Public/backend/dwz/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/kuying/Public/backend/dwz/js/jquery.validate.js" type="text/javascript"></script>
<script src="/kuying/Public/backend/dwz/js/jquery.bgiframe.js" type="text/javascript"></script>
<script src="/kuying/Public/backend/xheditor/xheditor-1.2.1.min.js" type="text/javascript"></script>
<script src="/kuying/Public/backend/xheditor/xheditor_lang/zh-cn.js" type="text/javascript"></script>
<script src="/kuying/Public/backend/dwz/js/dwz.min.js" type="text/javascript"></script>
<script src="/kuying/Public/backend/dwz/js/dwz.regional.zh.js" type="text/javascript"></script>
<script type="text/javascript">
function fleshVerify(){
	//重载验证码
	$('#verifyImg').attr("src", '/kuying/index.php/Public/verify/'+new Date().getTime());
}
function dialogAjaxMenu(json){
	dialogAjaxDone(json);
	if (json.statusCode == DWZ.statusCode.ok){
		$("#sidebar").loadUrl("/kuying/index.php/Public/menu");
	}
}
function navTabAjaxMenu(json){
	navTabAjaxDone(json);
	if (json.statusCode == DWZ.statusCode.ok){
		$("#sidebar").loadUrl("/kuying/index.php/Public/menu");
	}
}
$(function(){
	DWZ.init("/kuying/Public/backend/dwz/dwz.frag.xml", {
		loginUrl:"/kuying/index.php/Public/login", loginTitle:"登录",	// 弹出登录对话框
		statusCode:{ok:1,error:0},
		//pageInfo:{pageNum:"pageNum", numPerPage:"numPerPage", orderField:"_order", orderDirection:"_sort"}, //【可选，分页时用到】
		debug:false,	// 调试模式 【true|false】
		callback:function(){
			initEnv();
			$("#themeList").theme({themeBase:"/kuying/Public/backend/dwz/themes"});
		}
	});
});
</script>
</head>

<body scroll="no">
<div id="layout">
  <div id="header">
    <div class="headerNav">
      <div class="logo"><a href="/kuying/index.php/Admin">酷影网后台</a></div>
      <ul class="nav">
        <li class="first"><a href="/kuying/index.php" target="_blank">网站首页</a></li>
        <li><a href="/kuying/index.php/Home/Login/outlogin">退出</a></li>
      </ul>
      <ul class="themeList" id="themeList">
        <li theme="default">
          <div class="selected">蓝色</div>
        </li>
        <li theme="green">
          <div>绿色</div>
        </li>
        <li theme="purple">
          <div>紫色</div>
        </li>
        <li theme="silver">
          <div>银色</div>
        </li>
        <li theme="azure">
          <div>天蓝</div>
        </li>
      </ul>
    </div>
  </div>
  <div id="leftside">
    <div id="sidebar_s">
      <div class="collapse">
        <div class="toggleCollapse">
          <div></div>
        </div>
      </div>
    </div>
    <div id="sidebar">
      <div class="toggleCollapse">
        <h2>主菜单</h2>
        <div>收缩</div>
      </div>
      <div class="accordion" fillSpace="sidebar">
  <div class="accordionHeader">
    <h2><span>Folder</span>会员管理</h2>
  </div>
  <div class="accordionContent">
  	<ul class="tree treeFolder">
    	<li><a href="/kuying/index.php/Admin/User/index" target="navTab" rel="user_index">会员列表</a></li>
    </ul>
  </div>
  
  <div class="accordionHeader">
    <h2><span>Folder</span>BTzone资源管理</h2>
  </div>
  <div class="accordionContent">
  	<ul class="tree treeFolder">
  		<li><a href="/kuying/index.php/Admin/hdfilm/index" target="navTab" rel="hdfilm_index">高清电影BT管理</a></li>
    	<li><a href="/kuying/index.php/Admin/hdzy/index" target="navTab" rel="hdzy_index">高清综艺管理</a></li>
    	<li><a href="/kuying/index.php/Admin/hdju/index" target="navTab" rel="hdju_index">高清电视剧管理</a></li>
    	<li><a href="/kuying/index.php/Admin/hdbd/index" target="navTab" rel="hdbd_index">小容量电影</a></li>
    </ul>
  </div>
  
  <div class="accordionHeader">
    <h2><span>Folder</span>图片上传管理</h2>
  </div>
  <div class="accordionContent">
  	<ul class="tree treeFolder">
  		<li><a href="/kuying/index.php/Admin/lunbo/index" target="navTab" rel="lunbo_index">首页轮播管理</a></li>
    	<li><a href="/kuying/index.php/Admin/toppic/index" target="navTab" rel="toppic_index">分区图片置顶</a></li>
    </ul>
  </div>
	<div class="accordionHeader">
    <h2><span>Folder</span>其它</h2>
  </div>
  <div class="accordionContent">
  	<ul class="tree treeFolder">
    	<li><a href="/kuying/index.php/Admin/Thunder/index" target="navTab" rel="thunder_index">迅雷帐号更新管理</a></li>
    </ul>
  </div> 
  <div class="accordionHeader">
    <h2><span>Folder</span>权限管理</h2>
  </div>
  <div class="accordionContent">
  	<ul class="tree treeFolder">
    	<li><a href="/kuying/index.php/Admin/AuthRule/index" target="navTab" rel="authrule_index">规则管理</a></li>
        <li><a href="/kuying/index.php/Admin/AuthGroup/index" target="navTab" rel="authgroup_index">用户组管理</a></li>
    </ul>
  </div>
  
  <div class="accordionHeader">
    <h2><span>Folder</span>商品管理</h2>
  </div>
  <div class="accordionContent">
  	<ul class="tree treeFolder">
    	<li><a href="/kuying/index.php/Admin/goods/index" target="navTab" rel="goods_index">商品管理</a></li>
        <li><a href="/kuying/index.php/Admin/goodzone/index" target="navTab" rel="goodzone_index">区域管理</a></li>
        <li><a href="/kuying/index.php/Admin/goodcheap/index" target="navTab" rel="goodcheap_index">9块9专区</a></li>
        <li><a href="/kuying/index.php/Admin/goodlunbo/index" target="navTab" rel="goodlunbo_index">商品首页轮播</a></li>
    </ul>
  </div>
  
  <div class="accordionHeader">
    <h2><span>Folder</span>首页管理</h2>
  </div>
  <div class="accordionContent">
  	<ul class="tree treeFolder">
    	<li><a href="/kuying/index.php/Admin/floor/index" target="navTab" rel="floor_index">楼层分类管理</a></li>
        <li><a href="/kuying/index.php/Admin/ad/index" target="navTab" rel="ad_index">广告管理</a></li>
        <li><a href="/kuying/index.php/Admin/brand/index" target="navTab" rel="brand_index">品牌管理</a></li>
    </ul>
  </div>
  
  <div class="accordionHeader">
    <h2><span>Folder</span>综合管理</h2>
  </div>
  <div class="accordionContent">
  	<ul class="tree treeFolder">
    	<li><a href="/kuying/index.php/Admin/platform/index" target="navTab" rel="platform_index">支付账户管理</a></li>
    </ul>
  </div>
  
</div> </div>
  </div>
  <div id="container">
    <div id="navTab" class="tabsPage">
      <div class="tabsPageHeader">
        <div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
          <ul class="navTab-tab">
            <li tabid="main" class="main"><a href="javascript:void(0)"><span><span class="home_icon">我的主页</span></span></a></li>
          </ul>
        </div>
        <div class="tabsLeft">left</div>
        <!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
        <div class="tabsRight">right</div>
        <!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
        <div class="tabsMore">more</div>
      </div>
      <ul class="tabsMoreList">
        <li><a href="javascript:void(0)">我的主页</a></li>
      </ul>
      <div class="navTab-panel tabsPageContent layoutBox">
        <div class="page unitBox">
          <div class="accountInfo">
          	<p><span>酷影网管理中心</span></p>
            <p>
            	<div>欢迎您<?php echo (session('u_username')); ?>, 超级管理员.</div>
            </p>
          </div>
          
          <div class="pageContent" layoutH="60">
            <div class="panelBar pbtitle">系统信息</div>
            <div class="grid">
            	<div class="gridTbody">
                	<table class="list" style="width:100%;">
                    	<tbody>
                        	<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($mod) == "0"): ?><tr>
                                    <td style="width:25%;"><div><?php echo ($key); ?>：</div></td>
                                    <td style="width:25%;"><div><?php echo ($vo); ?></div></td><?php endif; ?>
                                <?php if(($mod) == "1"): ?><td style="width:25%;"><div><?php echo ($key); ?>：</div></td>
                                    <td style="width:25%;"><div><?php echo ($vo); ?></div></td>
                                </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            <?php if($infonum == 1): ?><td style="width:25%;"></td>
                                  <td style="width:25%;"></td>
                              </tr><?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--系统信息结束-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>