<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
		/**
		** 初始化控制器，对cookie进行检查
		**/	
		function _initialize()
		{
			
    	if((cookie('u_UID') != null||!empty(cookie('u_UID')))&& (cookie('u_username') != null||!empty(cookie('u_username'))))
    	{
    		$data['id'] = cookie('u_UID') ;
    		$data['USERNAME'] = cookie('u_username');
    		$Model = M('userinfo');
    		$content = $Model->field('id,USERNAME,USER_SCORE')->where($data)->find();
    		if($content != null || !empty($content))//存在这个用户名
			  {
			  	session('u_UID',$content['id']);
		    	session('u_username',$content['USERNAME']);
		    	session('u_score',$content['USER_SCORE']);
			  }
    	}/*else if((session('u_UID') != null||!empty(session('u_UID')))&& (session('u_username') != null||!empty(session('u_username'))))
    	{
    		$data['UID'] = session('u_UID') ;
    		$data['USERNAME'] = session('u_username');
    		$data['USER_SCORE'] = session('u_score');
    		$Model = M('userinfo');
    		$Model->where($data)->save(); 
    	}*/
    	//session('u_UID',null);  //清空session
    	//session('u_score',null);
    	//cookie('u_UID',null); 
    	//echo "reg suc";
 		}
		/**
		** 首页显示
		**/		
    public function index(){
        //$this->show();
        $this->display(T('index/enter'));
    }
    /**
		** 首页显示
		**/		
    public function showindex(){
        //$this->show();
        $Model = M("lunbo"); 
        $list = $Model->field('id,FID,FNAME,MODEL')->order('FID desc')->select();
        $this->assign('list',$list);
        $this->display(T('index/index'));
    }
    /**
    *   BT共享区列表
    **/
    public function showBTZone()
    {
    	$this->display(T('BTzone/BTshow'));
    }

    /**
    *   show 1080区具体内容
    **/

    public function showHDList()
    {
    	$sort = I('get.type'); //获取类型
    	if($sort>=1600&&$sort<=1632)//1080p
    	{
    		$type = $sort - 100;
    		$sort = 1200;
    		//$map['SORT'] = array('eq',1200);//查询条件 sort是否为1080p
    	}else if($sort>=1700&&$sort<=1732)//
    	{
    		$type = $sort - 200;
    		$sort = 1201;
    		//$map['SORT'] = array('eq',1201);//查询条件 sort是否为720p
    	}else if($sort>=1800&&$sort<=1832)//
    	{
    		$type = $sort - 300;
    		$sort = 1202;
    		//$map['SORT'] = array('eq',1202);//查询条件 sort是否为yunpan
    	}else if($sort>=1900&&$sort<=1932)//
    	{
    		$type = $sort - 400;
    		$sort = 1203;
    		//$map['SORT'] = array('eq',1203);//查询条件 sort是否为yunpan
    	}else if($sort>=2000&&$sort<=2032)//
    	{
    		$type = $sort - 500;
    		$sort = 1204;
    		//$map['SORT'] = array('eq',1204);//查询条件 sort是否为合集
    	}else if($sort>=2100&&$sort<=2132)//
    	{
    		$type = $sort - 600;
    		$sort = 1205;
    		//$map['SORT'] = array('eq',1205);//查询条件 sort是否为纪录片
    	}
    	else if($sort>=2200&&$sort<=2232)//
    	{
    		$type = $sort - 700;
    		$sort = 1206;
    		//$map['SORT'] = array('eq',1206);//查询条件 sort是否为3D
    	}else
    	{
    		 $this->error('分类跳转失败！');
    	}
    	$User = M("hdfilm");  
    	$map['SORT'] = array('eq',$sort);	
    	if($type !=1500)
    	{
    		$map['TYPE'] = array('eq',$type);
    	}
    	if($_GET['p']==1)
    	{
    		$data_top['ORTOP'] = 1;
    		$listtop = $User->field('FID,FNAME,TYPE,SCORE,UPTIME,SCAN_NUM')->where($data_top)->order('UPTIME desc')->select();
    		$listtop = getCharType($listtop);
    		$this->assign('listtop',$listtop);
    	}
    	$list = $User->field('FID,FNAME,TYPE,SCORE,UPTIME,SCAN_NUM')->where($map)->order('UPTIME desc')->page($_GET['p'].',42')->select();
    	$count = $User->where($map)->count();// 查询满足要求的总记录数
    	/**
    	*根据编码转换对应的中文内容
    	**/
    	$list = getCharType($list);
    	//print($list[0]["TYPE"]);
    	$this->assign('list',$list);
    	$Page = new \Think\Page($count,42);// 实例化分页类 传入总记录数和每页显示的记录数
    	$Page->setConfig('prev','上一页');
      $Page->setConfig('next','下一页');
      $Page->setConfig('first','第一页');
      $Page->setConfig('last','尾页');
      $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
    	$show = $Page->show();// 分页显示输出
    	$this->assign('page',$show);// 赋值分页输出
    	/**right**/
    	$list_ri = showright();
      $this->assign('list_ri',$list_ri);
      /**/
    	//$this->assign('pn',$_GET['p']);
    	if($sort==1200)
    	{
    		$this->display(T('hdzone/hdfilelist/1080plist'));
    	}else if($sort==1201)
    	{
    		$this->display(T('hdzone/hdfilelist/720plist'));
    	}else if($sort==1202)
    	{
    		$this->display(T('hdzone/hdfilelist/yunlist'));
    	}else if($sort==1203)
    	{
    		$this->display(T('hdzone/hdfilelist/remuxlist'));
    	}else if($sort==1204)
    	{
    		$this->display(T('hdzone/hdfilelist/hejilist'));
    	}else if($sort==1205)
    	{
    		$this->display(T('hdzone/hdfilelist/jilulist'));
    	}else if($sort==1206)
    	{
    		$this->display(T('hdzone/hdfilelist/3dlist'));
    	}else
    	{
    		 $this->error('分类跳转失败！');
    	}
    	

    }
    public function showHDcontent()
    {
    	//$FID = I('get.FID');
    	$User = M("hdfilm"); 
    	$map['FID'] = I('get.fid');
    	//$list = $User->field('FNAME,SORT,TYPE,MES_SHOW_DIV,UPTIME,DOWN_NO,SCAN_NUM,SCORE')->where($map)->cache(true)->find();
    	$list = $User->field('FID,FNAME,SORT,TYPE,MES_SHOW_DIV,SCAN_NUM,SCORE,ALDOWN')->where($map)->find();
    	/*
    	*防止恶意刷浏览量
    	*/
    	
    	if($list['SCAN_NUM']<=9999999)
    	{
    		if(empty(cookie('IP')))
    		{
    			$scan['SCAN_NUM'] = $list['SCAN_NUM']+1;
    			$User->where($map)->save($scan); // 根据条件更新记录
    			$ip = get_client_ip();
    			cookie('IP',ip,600); // 指定cookie保存时间
    		}	
    	}
    	/**
    	** 检查是否已经下载，有UID
    	**/
    	$flag_aldown = 0;
    	if(session('u_UID') != null||!empty(session('u_UID')))//判断是否已经登录
    	{
    		$is_exist = is_int(strpos($list['ALDOWN'],"#".session('u_UID')."#"));
    		if($is_exist)
    		{
    			$flag_aldown = 1;//已经下载呢
    			
    		}else
    		{
    			$flag_aldown = 0;//还没下载呢
    		}
    		
    	}
    	$list = getSingleCharType($list);
    	switch($list['SORT'])
    	{
    		case 1200:
    			$listpa = 1600;
    			break;
    		case 1201:
    			$listpa = 1700;
    			break;
  			case 1202:
  				$listpa = 1800;
  				break;
  			case 1203:
  				$listpa = 1900;
  				break;
  			case 1204:
  				$listpa = 2000;
  				break;
  			case 1205:
  				$listpa = 2100;
  				break;
  			case 1206:
  				$listpa = 2200;
  				break;
  			default:
  				$this->error('分类跳转失败！');
  				
    	}
    	$list = getSingleCharSort($list);
    	//p($list['MES_SHOW_DIV']);
    	$this->assign('aldown',$flag_aldown);
    	$this->assign('list',$list);
    	$this->assign('listpa',$listpa);
    	/*
    	*显示评论界面
    	*/
    	$Model = M("remark");
  		$map['SORT'] = 1;
  		$re_txt = $Model->field('REMARK')->where($map)->find();
  		if($re_txt != null || !empty($re_txt))
  		{
  			$re_txt = str_replace("&lt;","<",$re_txt);
				$re_txt = str_replace("&gt;",">",$re_txt);
				$re_txt = str_replace("&quot;","'",$re_txt);
				$re_txt = str_replace("&amp;quot;","\"",$re_txt);
				$re_txt = str_replace("&amp;nbsp;","",$re_txt);
  			$this->assign('re_txt',$re_txt);
  		}
  		/**/
  		/* 右边栏*/
        $Model = M('zone');
        $ri['LIST'] = 1;
        $re_ri = $Model->field('CONTENT')->where($ri)->find();
        $Model = M("goods"); 
        $data_ri['id']  = array('in',$re_ri['CONTENT']);
        $list_ri = $Model->field('id,TITLE,INFO_IMG')->where($data_ri)->select();
        $this->assign('list_ri',$list_ri);
      /**/
    	$this->display(T('hdzone/hdfileshow/filmshow'));
    }
    
		/**
    * 电视剧板块
    */
		public function showJuList()
    {
    	$sort = I('get.type'); //获取类型
    	if($sort>=3300&&$sort<=3309)
    	{
    		$type = $sort + 200;
    		$sort = 3200;
    	}else if($sort>=3400&&$sort<=3409)
    	{
    		$type = $sort + 100;
    		$sort = 3201;
    	}else
    	{
    		 $this->error('分类跳转失败！');
    	}    	
    	$User = M("hdju");  
    	$map['SORT'] = array('eq',$sort);	
    	if($type !=3500)
    	{
    		$map['TYPE'] = array('eq',$type);
    	}
    	if($_GET['p']==1)
    	{
    		$data_top['ORTOP'] = 1;
    		$listtop = $User->field('FID,FNAME,TYPE,SCORE,UPTIME,SCAN_NUM')->where($data_top)->order('UPTIME desc')->select();
    		$listtop = getJ_CharType($listtop);
    		$this->assign('listtop',$listtop);
    	}
    	$list = $User->field('FID,SORT,FNAME,TYPE,UPTIME,SCAN_NUM,SCORE')->where($map)->order('UPTIME desc')->page($_GET['p'].',42')->select();
    	$count = $User->where($map)->count();// 查询满足要求的总记录数
    	/**
    	*根据编码转换对应的中文内容
    	**/
    	$list = getJ_CharType($list);
    	//print($list[0]["TYPE"]);
    	$this->assign('list',$list);
    	$Page = new \Think\Page($count,42);// 实例化分页类 传入总记录数和每页显示的记录数
    	$Page->setConfig('prev','上一页');
      $Page->setConfig('next','下一页');
      $Page->setConfig('first','第一页');
      $Page->setConfig('last','尾页');
      $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
    	$show = $Page->show();// 分页显示输出
    	$this->assign('page',$show);// 赋值分页输出
    	//$this->assign('pn',$_GET['p']);
    	if($sort==3201)
    	{
    		$this->display(T('hdju/hdfilelist/ustvlist'));
    	}else if($sort==3200)
    	{
    		$this->display(T('hdju/hdfilelist/atvlist'));
    	}else
    	{
    		 $this->error('分类跳转失败！');
    	}

    }
    public function showJucontent()
    {
    	//$FID = I('get.FID');
    	$User = M("hdju"); 
    	$map['FID'] = I('get.fid');
    	//$list = $User->field('FNAME,SORT,TYPE,MES_SHOW_DIV,UPTIME,DOWN_NO,SCAN_NUM,SCORE')->where($map)->cache(true)->find();
    	$list = $User->field('FID,FNAME,SORT,TYPE,MES_SHOW_DIV,SCAN_NUM,SCORE,ALDOWN')->where($map)->find();
    	/*
    	*防止恶意刷浏览量
    	*/
    	
    	if($list['SCAN_NUM']<=9999999)
    	{
    		if(empty(cookie('IP')))
    		{
    			$scan['SCAN_NUM'] = $list['SCAN_NUM']+1;
    			$User->where($map)->save($scan); // 根据条件更新记录
    			$ip = get_client_ip();
    			cookie('IP',ip,600); // 指定cookie保存时间
    		}	
    	}
    	/**
    	** 检查是否已经下载，有UID
    	**/
    	$flag_aldown = 0;
    	if(session('u_UID') != null||!empty(session('u_UID')))//判断是否已经登录
    	{
    		$is_exist = is_int(strpos($list['ALDOWN'],"#".session('u_UID')."#"));
    		if($is_exist)
    		{
    			$flag_aldown = 1;//已经下载呢
    			
    		}else
    		{
    			$flag_aldown = 0;//还没下载呢
    		}
    		
    	}
    	$list = getJ_SingleCharType($list);
    	switch($list['SORT'])
    	{
    		case 3200:
    			$listpa = 3300;
    			break;
    		case 3201:
    			$listpa = 3400;
    			break;
  			default:
  				$this->error('分类跳转失败！');
  				
    	}
    	$list = getJ_SingleCharSort($list);
    	//p($list['MES_SHOW_DIV']);
    	$this->assign('aldown',$flag_aldown);
    	$this->assign('list',$list);
    	$this->assign('listpa',$listpa);
    	$this->display(T('hdju/hdfileshow/filmshow'));
    }
    /**
    *   BD板块
    **/

    public function showBDList()
    {
    	$sort = I('get.type'); //获取类型
    	if($sort>=1200&&$sort<=1232)//1080p
    	{
    		$type = $sort + 300;
    		$sort = 1300;
    		//$map['SORT'] = array('eq',1200);//查询条件 sort是否为1080p
    	}else if($sort>=1100&&$sort<=1132)//
    	{
    		$type = $sort + 400;
    		$sort = 1301;
    		//$map['SORT'] = array('eq',1201);//查询条件 sort是否为720p
    	}else if($sort>=1000&&$sort<=1032)//
    	{
    		$type = $sort + 500;
    		$sort = 1302;
    		//$map['SORT'] = array('eq',1202);//查询条件 sort是否为yunpan
    	}else if($sort>=900&&$sort<=932)//
    	{
    		$type = $sort + 600;
    		$sort = 1303;
    		//$map['SORT'] = array('eq',1203);//查询条件 sort是否为yunpan
    	}else if($sort>=800&&$sort<=832)//
    	{
    		$type = $sort + 700;
    		$sort = 1304;
    		//$map['SORT'] = array('eq',1204);//查询条件 sort是否为合集
    	}else
    	{
    		 $this->error('分类跳转失败！');
    	}
    	
    	$User = M("hdbd");  
    	$map['SORT'] = array('eq',$sort);	
    	if($type !=1500)
    	{
    		$map['TYPE'] = array('eq',$type);
    	}
    	if($_GET['p']==1)
    	{
    		$data_top['ORTOP'] = 1;
    		$listtop = $User->field('FID,FNAME,TYPE,UPTIME,SCAN_NUM')->where($data_top)->order('UPTIME desc')->select();
    		$listtop = getCharType($listtop);
    		$this->assign('listtop',$listtop);
    	}
    	$list = $User->field('FID,SORT,FNAME,TYPE,UPTIME,SCAN_NUM,SCORE')->where($map)->order('UPTIME desc')->page($_GET['p'].',42')->select();
    	$count = $User->where($map)->count();// 查询满足要求的总记录数
    	/**
    	*根据编码转换对应的中文内容
    	**/
    	$list = getCharType($list);
    	//print($list[0]["TYPE"]);
    	$this->assign('list',$list);
    	$Page = new \Think\Page($count,42);// 实例化分页类 传入总记录数和每页显示的记录数
    	$Page->setConfig('prev','上一页');
      $Page->setConfig('next','下一页');
      $Page->setConfig('first','第一页');
      $Page->setConfig('last','尾页');
      $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
    	$show = $Page->show();// 分页显示输出
    	$this->assign('page',$show);// 赋值分页输出
    	//$this->assign('pn',$_GET['p']);
    	if($sort==1300)
    	{
    		$this->display(T('hdbd/hdfilelist/bdlist'));
    	}else if($sort==1301)
    	{
    		$this->display(T('hdbd/hdfilelist/ipadlist'));
    	}else if($sort==1302)
    	{
    		$this->display(T('hdbd/hdfilelist/thundlist'));
    	}else if($sort==1303)
    	{
    		$this->display(T('hdbd/hdfilelist/asialist'));
    	}else if($sort==1304)
    	{
    		$this->display(T('hdbd/hdfilelist/eurolist'));
    	}else
    	{
    		 $this->error('分类跳转失败！');
    	}

    }
    public function showBDcontent()
    {
    	//$FID = I('get.FID');
    	$User = M("hdbd"); 
    	$map['FID'] = I('get.fid');
    	//$list = $User->field('FNAME,SORT,TYPE,MES_SHOW_DIV,UPTIME,DOWN_NO,SCAN_NUM,SCORE')->where($map)->cache(true)->find();
    	$list = $User->field('FID,FNAME,SORT,TYPE,MES_SHOW_DIV,SCAN_NUM,SCORE,ALDOWN')->where($map)->find();
    	if($list == null || empty($list))
    	{
    		$this->error('内容已删除！');
    	}
    	/*
    	*防止恶意刷浏览量
    	*/
    	
    	if($list['SCAN_NUM']<=9999999)
    	{
    		if(empty(cookie('IP')))
    		{
    			$scan['SCAN_NUM'] = $list['SCAN_NUM']+1;
    			$User->where($map)->save($scan); // 根据条件更新记录
    			$ip = get_client_ip();
    			cookie('IP',ip,600); // 指定cookie保存时间
    		}	
    	}
    	/**
    	** 检查是否已经下载，有UID
    	**/
    	$flag_aldown = 0;
    	if(session('u_UID') != null||!empty(session('u_UID')))//判断是否已经登录
    	{
    		$is_exist = is_int(strpos($list['ALDOWN'],"#".session('u_UID')."#"));
    		if($is_exist)
    		{
    			$flag_aldown = 1;//已经下载呢
    			
    		}else
    		{
    			$flag_aldown = 0;//还没下载呢
    		}
    		
    	}
    	$list = getSingleCharType($list);
    	switch($list['SORT'])
    	{
    		case 1300:
    			$listpa = 1200;
    			break;
    		case 1301:
    			$listpa = 1100;
    			break;
  			case 1302:
  				$listpa = 1000;
  				break;
  			case 1303:
  				$listpa = 900;
  				break;
  			case 1304:
  				$listpa = 800;
  				break;
  			default:
  				$this->error('分类跳转失败！');
  				
    	}
    	$list = getSingleCharSort($list);
    	//p($list['MES_SHOW_DIV']);
    	$this->assign('aldown',$flag_aldown);
    	$this->assign('list',$list);
    	$this->assign('listpa',$listpa);
    	$this->display(T('hdbd/hdfileshow/filmshow'));
    }
    /**
    ** 综艺节目
    **/
    public function showZYList()
    {
    	$sort = I('get.type'); //获取类型
    	if($sort>=100&&$sort<=111)//1080p
    	{
    		$type = $sort-100;
    		$sort = 100;
    		//$map['SORT'] = array('eq',1200);//查询条件 sort是否为1080p
    	}else if($sort>=200&&$sort<=211)//
    	{
    		$type = $sort - 200;
    		$sort = 101;
    		//$map['SORT'] = array('eq',1201);//查询条件 sort是否为720p
    	}else if($sort>=300&&$sort<=311)//
    	{
    		$type = $sort - 300;
    		$sort = 102;
    		//$map['SORT'] = array('eq',1202);//查询条件 sort是否为yunpan
    	}else if($sort>=400&&$sort<=411)//
    	{
    		$type = $sort - 400;
    		$sort = 103;
    		//$map['SORT'] = array('eq',1203);//查询条件 sort是否为yunpan
    	}else if($sort>=500&&$sort<=511)//
    	{
    		$type = $sort - 500;
    		$sort = 104;
    		//$map['SORT'] = array('eq',1204);//查询条件 sort是否为合集
    	}else if($sort>=600&&$sort<=611)//
    	{
    		$type = $sort - 600;
    		$sort = 105;
    		//$map['SORT'] = array('eq',1204);//查询条件 sort是否为合集
    	}
    	else
    	{
    		 $this->error('分类跳转失败！');
    	}
    	
    	$User = M("hdzy");  
    	$map['SORT'] = array('eq',$sort);	
    	if($type !=0)
    	{
    		$map['TYPE'] = array('eq',$type);
    	}
    	if($_GET['p']==1)
    	{
    		$data_top['ORTOP'] = 1;
    		$listtop = $User->field('FID,FNAME,TYPE,SCORE,UPTIME,SCAN_NUM')->where($data_top)->order('UPTIME desc')->select();
    		$listtop = getCharType($listtop);
    		$this->assign('listtop',$listtop);
    	}
    	$list = $User->field('FID,SORT,FNAME,TYPE,UPTIME,SCAN_NUM,SCORE')->where($map)->order('UPTIME desc')->page($_GET['p'].',42')->select();
    	$count = $User->where($map)->count();// 查询满足要求的总记录数
    	/**
    	*根据编码转换对应的中文内容
    	**/
    	$list = getCharType($list);
    	//print($list[0]["TYPE"]);
    	$this->assign('list',$list);
    	$Page = new \Think\Page($count,42);// 实例化分页类 传入总记录数和每页显示的记录数
    	$Page->setConfig('prev','上一页');
      $Page->setConfig('next','下一页');
      $Page->setConfig('first','第一页');
      $Page->setConfig('last','尾页');
      $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
    	$show = $Page->show();// 分页显示输出
    	$this->assign('page',$show);// 赋值分页输出
    	//$this->assign('pn',$_GET['p']);
    	if($sort==100)
    	{
    		$this->display(T('hdzy/hdfilelist/sklist'));
    	}else if($sort==101)
    	{
    		$this->display(T('hdzy/hdfilelist/jplist'));
    	}else if($sort==102)
    	{
    		$this->display(T('hdzy/hdfilelist/cnlist'));
    	}else if($sort==103)
    	{
    		$this->display(T('hdzy/hdfilelist/euuslist'));
    	}else if($sort==104)
    	{
    		$this->display(T('hdzy/hdfilelist/ymtlist'));
    	}else if($sort==105)
    	{
    		$this->display(T('hdzy/hdfilelist/cartonlist'));
    	}else
    	{
    		 $this->error('分类跳转失败！');
    	}

    }
    public function showZYcontent()
    {
    	//$FID = I('get.FID');
    	$User = M("hdzy"); 
    	$map['FID'] = I('get.fid');
    	//$list = $User->field('FNAME,SORT,TYPE,MES_SHOW_DIV,UPTIME,DOWN_NO,SCAN_NUM,SCORE')->where($map)->cache(true)->find();
    	$list = $User->field('FID,FNAME,SORT,TYPE,MES_SHOW_DIV,SCAN_NUM,SCORE,ALDOWN')->where($map)->find();
    	/*
    	*防止恶意刷浏览量
    	*/
    	
    	if($list['SCAN_NUM']<=9999999)
    	{
    		if(empty(cookie('IP')))
    		{
    			$scan['SCAN_NUM'] = $list['SCAN_NUM']+1;
    			$User->where($map)->save($scan); // 根据条件更新记录
    			$ip = get_client_ip();
    			cookie('IP',$ip,600); // 指定cookie保存时间
    		}	
    	}
    	/**
    	** 检查是否已经下载，有UID
    	**/
    	$flag_aldown = 0;
    	if(session('u_UID') != null||!empty(session('u_UID')))//判断是否已经登录
    	{
    		$is_exist = is_int(strpos($list['ALDOWN'],"#".session('u_UID')."#"));
    		if($is_exist)
    		{
    			$flag_aldown = 1;//已经下载呢
    			
    		}else
    		{
    			$flag_aldown = 0;//还没下载呢
    		}
    		
    	}
    	
    	$list = getSingleCharType($list);
    	switch($list['SORT'])
    	{
    		case 100:
    			$listpa = 100;
    			break;
    		case 101:
    			$listpa = 200;
    			break;
  			case 102:
  				$listpa = 300;
  				break;
  			case 103:
  				$listpa = 400;
  				break;
  			case 104:
  				$listpa = 500;
  				break;
  			case 105:
  				$listpa = 600;
  				break;
  			default:
  				$this->error('分类跳转失败！');
  				
    	}
    	$list = getSingleCharSort($list);
    	//p($list['MES_SHOW_DIV']);
    	$this->assign('list',$list);
    	$this->assign('aldown',$flag_aldown);
    	$this->assign('listpa',$listpa);
    	$this->display(T('hdzy/hdfileshow/filmshow'));
    }
    /**
    *点击统计下载次数
    */
    public function showDivInfo()
    {
			//$User	=	D("User");
			//$Form = D("Form");
			//$vo = $Form->create();
		//	$vo['content']=3;
			//$this->ajaxReturn($vo, '表单数据保存成功！', 1);
			//return $_REQUEST['fid'];
			$data['name']=$_POST['name'];
			$data['city']=$_POST['city'];
			$this->ajaxReturn($data,'JSON'); //跳转回原页面的方法
			//$this->error('分类跳转失败！');
			
		}
		/**
    *首页签到更新score
    * $ajax_back[0]:0 分数更新失败，网络原因等 ； 1 分数更新成功 ；2 重复签到  3 未登录 
    */
    public function signEveryday()
    {
			if((session('u_UID') != null||!empty(session('u_UID')))&& (session('u_username') != null||!empty(session('u_username'))))//判断是否已经登录
			{
				$data['id'] = session('u_UID') ;
    		$data['USERNAME'] = session('u_username');
    		//$data['USER_SCORE'] = session('u_score');
    		$Model = M('userinfo');
    		$content = $Model->field('SIGN_TIME,USER_SCORE')->where($data)->find();
    		if($content != null || !empty($content))//存在这个用户名
			  {
			  	$start = strtotime(date("Y-m-d",$content['SIGN_TIME']));
			  	$signdate = time();
			  	$end = strtotime(date('Y-m-d',$signdate));
			  	if(($end - $start)>=1)//如果与上次签到时间相隔时间>=1天
			  	{
			  		$score = session('u_score') + 5 ;
			  		$need = array('USER_SCORE'=>$score,'SIGN_TIME'=>$signdate);
			  		$flag = $Model-> where($data)->save($need);
			  		//$ajax_back[0] = $score ;
			  		if($flag)
			  		{
			  			session('u_score',$score);//更新session
			  			$ajax_back[0] =1;
			  		}else
			  		{
			  			$ajax_back[0] =0;//分数更新失败，网络原因等
			  		}
			  	}else //重复签到
			  	{
			  		$ajax_back[0] =2;
			  	}
    			
				}else
				{
					$ajax_back[0] = 3;
				}
			}else //未登录
			{
				$ajax_back[0] = 3;
			}
			//$User	=	D("User");
			//$Form = D("Form");
			//$vo = $Form->create();
		//	$vo['content']=3;
			//$this->ajaxReturn($vo, '表单数据保存成功！', 1);
			//return $_REQUEST['fid'];
			$this->ajaxReturn($ajax_back,'JSON'); //跳转回原页面的方法
			//$this->error('分类跳转失败！');
			
		}
		/**
		** 抽奖
		** 4 未登录 3 分数不够 2 超过抽奖次数 1写入成功 0 分数更新失败，网络原因等
		**/
		public function getScore()
    {
    	$get_score= I('post.score');
    	$score = session('u_score');
			if((session('u_UID') != null||!empty(session('u_UID')))&& (session('u_username') != null||!empty(session('u_username'))))//判断是否已经登录
			{
				$data['id'] = session('u_UID') ;
    		$data['USERNAME'] = session('u_username');
    		//$data['USER_SCORE'] = session('u_score');
    		$Model = M('userinfo');
    		$content = $Model->field('GETS_TIME,GETS_COUNT')->where($data)->find();
    		if($content != null || !empty($content))//存在这个用户名
			  {
			  	if(($score - 1)>=0)//抽奖一次要一分
			  	{
			  		$start = strtotime(date("Y-m-d",$content['GETS_TIME']));//上次抽奖时间
			  		$signdate = time();
			  		$end = strtotime(date('Y-m-d',$signdate));
			  		$score = $score -1;//抽奖花费1个积分
			  		if(($end - $start)>=1)//如果与上次抽奖时间相隔时间>=1天
			  		{
			  			$score = $get_score + $score;//抽奖获得的分数
			  			$getcount = 1;//相隔一天 抽奖次数置1
			  			$need = array('USER_SCORE'=>$score,'GETS_TIME'=>$signdate,'GETS_COUNT'=>$getcount);
			  			$flag = $Model-> where($data)->save($need);
			  			if($flag)
				  		{
				  			session('u_score',$score);//更新session
				  			$ajax_back[0] =1;
				  		}else
				  		{
				  			$ajax_back[0] =0;//分数更新失败，网络原因等
				  		}
			  		}else//如果与上次抽奖时间同一天
			  		{
			  			$getcount = $content['GETS_COUNT']+1;
			  			if($getcount<=3)
			  			{
			  				$score = $get_score + $score;//抽奖获得的分数
			  				$need = array('USER_SCORE'=>$score,'GETS_TIME'=>$signdate,'GETS_COUNT'=>$getcount);
			  				$flag = $Model-> where($data)->save($need);
				  			if($flag)
					  		{
					  			session('u_score',$score);//更新session
					  			$ajax_back[0] = 1;
					  		}else
					  		{
					  			$ajax_back[0] =0;//分数更新失败，网络原因等
					  		}
			  			}else
			  			{
			  				$ajax_back[0] =2;//当天超过次数
			  			}
			  		}
			  	}else
			  	{
			  		$ajax_back[0] =3;//分数不够
			  	}	
				}else
				{
					$ajax_back[0] = 4;//不存在这个用户
				}
			}else //未登录
			{
				$ajax_back[0] = 4;//不存在这个用户
			}
			//$User	=	D("User");
			//$Form = D("Form");
			//$vo = $Form->create();
		//	$vo['content']=3;
			//$this->ajaxReturn($vo, '表单数据保存成功！', 1);
			//return $_REQUEST['fid'];
			$this->ajaxReturn($ajax_back,'JSON'); //跳转回原页面的方法
			//$this->error('分类跳转失败！');
			
		}
		public function showNScore()// 0:已经下载过不用任何动作  1 扣分成功 2 还未登录
    {
    	if((session('u_UID') != null||!empty(session('u_UID')))&& (session('u_username') != null||!empty(session('u_username'))))//判断是否已经登录
			{
				$ajax_back[0] = 0;
				$aldown= I('post.aldown');
				$table= I('post.table');
				$map['FID']= I('post.fid');
	    	if($aldown == 1) //已经下载了
	    	{
	    		$ajax_back[0] = 0;
	    	}else//还未下载
	    	{ 
	    		//$ajax_back[0] =	I('post.fid');
	    		switch($table)
	    		{
	    			case 1:
	    				$User = M("hdfilm"); 
	    			  break;
    			  case 3:
    					$User = M("hdju"); 
    			  	break;
    			  case 4:
    					$User = M("hdbd"); 
    			  	break;
	    			case 5:
	    				$User = M("hdzy"); 
	    			  break; 
	    		}
	    		$list = $User->field('DOWN_NO,ALDOWN')->where($map)->find();
	    		/**
	    		**添加此时的UID到已经下载中
	    		**/
	    		if($list != null || !empty($list))
	    		{
	    			$is_exist = is_int(strpos($list['ALDOWN'],"#".session('u_UID')."#"));
	    			if($is_exist)
	    			{
	    				$ajax_back[0] = 0;
	    			}else
	    			{
	    				$need = $list['ALDOWN']."#".session('u_UID')."#";
		    			$User-> where($map)->setField('ALDOWN',$need);
		    			$User->where($map)->setInc('DOWN_NO');
		    			$data['id'] = session('u_UID') ;
		    			$Model = M('userinfo');
			    		$content = $Model->field('USER_SCORE')->where($data)->find();
			    		if($content != null || !empty($content))//存在这个用户名
						  {
						  	$end = $content['USER_SCORE'] - I('post.score');
						  	if($end>=0)
						  	{
				  				$flag = $Model-> where($data)->setField('USER_SCORE',$end);
				  				if($flag)
						  		{
						  			session('u_score',$end);//更新session
						  			$ajax_back[0] =1;
						  		}
						  	}
			    		}
	    			}
	    			
		    	}
		    }
			
			}else
			{
				$ajax_back[0] =2;
			}
			$this->ajaxReturn($ajax_back,'JSON'); //跳转回原页面的方法
			
		}
		/**
    *   search
    **/
    public function goSearch()
    {
    	$this->display(T('search/searchpage'));
    }
    /**
    *   search
    **/
    public function search()
    {
    	$tl_cookie = cookie('timelimit');
    	$empty_info = "对不起，没有找到您需要查找的内容。。。";
    	$get_nowtime = time();
    	if(!empty($tl_cookie))//cookie非空有时间限制
  		{
  			//$this->display(T('search/searchpage'));
  			cookie('timelimit',$get_nowtime,20);
  			$this->error('搜索时间间隔过短，请20秒后请继续搜索！');
  			//$scan['SCAN_NUM'] = $list['SCAN_NUM']+1;
  			//$User->where($map)->save($scan); // 根据条件更新记录
  			//$ip = get_client_ip();
  			//cookie('IP',ip,600); // 指定cookie保存时间
  		}else
  		{
  			$sea_zone = I('get.sea_zone');
  			if($sea_zone == 10)
  			{
  				$sea_zone =I('post.model');
  			}
    		$sea_txt = I('post.sea_txt');

  			cookie('timelimit',$get_nowtime,20);
  			switch ($sea_zone)
  			{
  				case 1:
  					$db_name = "hdfilm";
  					$linkzone = "HD";
  					$showz_info = "高清电影BT下载区";
  				break;
  				case 3:
  					$db_name = "hdju";
  					$linkzone = "Ju";
  					$showz_info = "高清连续剧区";
  				break;
  				case 4:
  					$db_name = "hdbd";
  					$linkzone = "BD";
  					$showz_info = "小容量电影专区";
  				break;
  				case 5:
  					$db_name = "hdzy";
  					$linkzone = "ZY";
  					$showz_info = "高清综艺分享专区";
  				break;
  				default:
  				$db_name = "hdfilm";
  				$linkzone = "HD";
  				$showz_info = "高清电影BT下载区";
  			}
  			if($sea_txt != null && !empty($sea_txt))
  			{
  				if(strlen($sea_txt)>20)
  				{
  					$sea_txt = substr($sea_txt , 0 , 20);
  				}
	  			$User = M($db_name); 
	  			if($User->autoCheckToken($_POST))
	  			{
			    		$map['FNAME']=array('like','%'.$sea_txt.'%');
			  			$list = $User->field('FID,FNAME')->where($map)->order('UPTIME desc')->page($_GET['s_p'].',30')->select();
				    	$count = $User->where($map)->count();// 查询满足要求的总记录数
				    	if($list != null && !empty($list))
				    	{
				    		$this->assign('list',$list);
					    	$Page = new \Think\Page($count,30);// 实例化分页类 传入总记录数和每页显示的记录数
					    	$Page->setConfig('prev','上一页');
					      $Page->setConfig('next','下一页');
					      $Page->setConfig('first','第一页');
					      $Page->setConfig('last','尾页');
					      $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
					    	$show = $Page->show();// 分页显示输出
					    	$this->assign('s_page',$show);// 赋值分页输出
					    	$this->assign('linkzone',$linkzone);// 赋值分页输出
					    	$empty_info = $showz_info."：搜索结果如下：";
					    	
				    	}
				    	
				  }else
				  {
				  	$this->error('禁止重复提交！');
				  }
		    	
		    	//echo "ll";
	    	}
	    	$this->assign('empty_info',$empty_info);
				$this->display(T('search/searchpage'));	
  			
  		}
    	
    	//$this->display(T('search/searchpage'));
    }
    //0 添加失败 1成功 2 过于频繁 3 未登录
    
    public function getReContent(){
    	if((session('u_UID') != null||!empty($uu_uid))&& (session('u_username') != null||!empty($uu_username)))//判断是否已经登录
    	{
    		$tl_cookie = cookie('r_timelimit');
	    	$get_nowtime = time();
	    	if(!empty($tl_cookie))//cookie非空有时间限制
	  		{
	  			//$this->display(T('search/searchpage'));
	  			cookie('r_timelimit',$get_nowtime,20);
	  			$ajax_back[0] = 2;	
	  			//$scan['SCAN_NUM'] = $list['SCAN_NUM']+1;
	  			//$User->where($map)->save($scan); // 根据条件更新记录
	  			//$ip = get_client_ip();
	  			//cookie('IP',ip,600); // 指定cookie保存时间
	  		}else
	  		{
	  			cookie('r_timelimit',$get_nowtime,20);
	    		$sort = I('post.sort');
	    		$fid= I('post.fid');
	    		$re_txt = I('post.content');
	    		$re_txt  = str_replace("&lt;br/&gt;","",$re_txt);
	    		$re_txt = "<span ><img src='http://www.kyhd.net/img/icon/remark_img.gif'>酷影网会员：".session('u_username')."<small>------------------发布日期：".date("Y-m-d H:i")."</small></span>".$re_txt."<hr>";
	    		$Model = M("remark");
	    		$map['SORT'] = $sort;
	    		$map['FID'] = $fid;
	    		$list = $Model->field('FID,SORT,REMARK')->where($map)->find();
	    		if($list != null || !empty($list))
	    		{
	    			
	    			if(strlen($re_txt)<=40000)
	    			{
	    				$re_txt = $re_txt.$list['REMARK'];
	    			}
	    			$update = $Model-> where($map)->setField('REMARK',$re_txt);
	    			if(!$update)
	    			{
	    				$ajax_back[0] =0;
	    				return 0;
	    			}
	    		}else
	    		{
	    			$map['REMARK'] = $re_txt ;
	    			//echo $re_txt;
	    			$flag = $Model->field('FID,SORT,REMARK')->data($map)->add();
	    			if(!$flag)
	    			{
	    				$ajax_back[0] =0;
	    				return 0;
	    			}
	    		}
					$ajax_back[0] = 1;	
	    		//$map['SORT'] = array('eq',$sort);
	  		}
    		
    	}else
    	{
    		$ajax_back[0] =3;
    		return 0;
    	}
    	$this->ajaxReturn($ajax_back,'JSON'); 
      
    }

}