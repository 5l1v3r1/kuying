<?php
namespace Shopping\Controller;
use Think\Controller;
class IndexController extends Controller {
    /**
		** 首页显示
		**/		
    public function index(){
        //$this->show();
                //$this->show();
        /* 右边栏*/
        $Model = M('zone');
        $re_s['LIST'] = 1;
        $re = $Model->field('CONTENT')->where($re_s)->find();
        $Model = M("goods"); 
        $data['id']  = array('in',$re['CONTENT']);
        $list0 = $Model->field('id,TITLE,INFO_IMG')->where($data)->select();
        /**/
        $map['OR_INDEX'] = 1;
        $list = $Model->field('id,TITLE,INFO_TXT,INFO_IMG,GOOD_SRC,DING,LOW,TIME')->where($map)->order('TIME desc')->select();
        $map1['OR_TOP'] = 1;
        $list1 = $Model->field('id,TITLE,INFO_TXT,INFO_IMG,GOOD_SRC,DING,LOW,TIME')->where($map1)->order('TIME desc')->select();
        /*轮播*/
        $User = M('goodlunbo');
        $re_lun = $User->field('id,ZONE,GOOD_ID')->order('TIME desc')->select();
        foreach ($re_lun as &$vo) 
        {
        	if($vo['ZONE'] == 1)// goodlist
        	{
        		$vo['ZONE'] = 'http://www.kyhd.net/index.php/Shopping/Index/showGood/id/'.$vo['GOOD_ID'].'.html';
        	}else
        	{
        		$_Use = M('99zone');
        		$_d['id'] = $vo['GOOD_ID'];
        		$_re_ = $_Use->field("GOOD_SRC")->where($_d)->find();
        		$vo['ZONE'] = $_re_['GOOD_SRC'];
        	}
        } 
        /**/
        $this->assign('list0',$list0);
        $this->assign('list',$list);
        $this->assign('list1',$list1);
        $this->assign('lun',$re_lun);
        $this->display(T('Index/index'));
    }
    public function update_u_d()
    {
    	$ip = cookie('R_IP');
    	if(empty($ip)){
    		$flag = I('v','','htmlspecialchars');
	    	$id = I('id','','htmlspecialchars');
	    	$Model = M("goods"); 
	    	$map['id'] = $id;
	    	if($flag == 0){ //up
	    		$list = $Model->field('DING')->where($map)->find();
	    		$scan['DING'] = $list['DING']+1;
	    		$Model->where($map)->save($scan);	
	    		$ajax_back[0] =$scan['DING'];	
	    	}else{ //down
	    		$list = $Model->field('LOW')->where($map)->find();
	    		$scan['LOW'] = $list['LOW']+1;
	    		$Model->where($map)->save($scan);	
	    		$ajax_back[0] =$scan['LOW'];
	    	}
	    	$ip = get_client_ip();
  			cookie('R_IP',$ip,10);
	    	
    	}else{
    		$ip = get_client_ip();
  			cookie('R_IP',$ip,10);
    		$ajax_back[0] =-1;	
    	}
    	$this->ajaxReturn($ajax_back,'JSON'); //跳转回原页面的方法
    }
    public function update_r_u_d()
    {
    	$ip = cookie('re_IP');
    	if(empty($ip)){
    		$flag = I('v','','htmlspecialchars');
	    	$id = I('id','','htmlspecialchars');
	    	$Model = M("goodremark"); 
	    	$map['id'] = $id;
	    	if($flag == 0){ //up
	    		$list = $Model->field('DING')->where($map)->find();
	    		$scan['DING'] = $list['DING']+1;
	    		$Model->where($map)->save($scan);	
	    		$ajax_back[0] =$scan['DING'];	
	    	}else{ //down
	    		$list = $Model->field('LOW')->where($map)->find();
	    		$scan['LOW'] = $list['LOW']+1;
	    		$Model->where($map)->save($scan);	
	    		$ajax_back[0] =$scan['LOW'];
	    	}
	    	$ip = get_client_ip();
  			cookie('re_IP',$ip,5);
	    	
    	}else{
    		$ip = get_client_ip();
  			cookie('re_IP',$ip,5);
    		$ajax_back[0] =-1;	
    	}
    	$this->ajaxReturn($ajax_back,'JSON'); //跳转回原页面的方法
    }
    public function showGood()
   	{
   		$id = I('id','','htmlspecialchars');
   		$Model = M("goods");
   		$map['id'] = $id;
   		$list = $Model->field('id,TITLE,INFO_TXT,INFO_IMG,GOOD_SORT,GOOD_SRC,DING,LOW,SCAN_NUM,TIME')->where($map)->find();
   		if($list['SCAN_NUM']<=999999)
    	{
    		$ip = cookie('IP');
    		if(empty($ip))
    		{
    			$scan['SCAN_NUM'] = $list['SCAN_NUM']+1;
    			$Model->where($map)->save($scan); // 根据条件更新记录
    			$ip = get_client_ip();
    			cookie('IP',$ip,10); // 指定cookie保存时间
    		}	
    	}
   		switch($list['GOOD_SORT'])
   		{
   			case 0:
   				$list['GOOD_SORT'] = "运动休闲";
   				$_k=0; 
   				break;
   			case 1:
   				$list['GOOD_SORT'] = "数码电脑";
   				$_k=1; 
   				break;
   			case 2:
   				$list['GOOD_SORT'] = "创意生活";
   				$_k=2; 
   				break;
   			case 3:
   				$list['GOOD_SORT'] = "养生保健";
   				$_k=3; 
   				break;
   			default:
   				$list['GOOD_SORT'] = "其它宝贝";
   				$_k=4; 
   		}
   		//$uname = cookie('u_username');
   		$Model = M("goodremark");
   		$uname = 'master'; //进入网站后必须修改！！！！！！！
   		if(!empty($uname))
   		{
   			//cookie('flag',null);
   			$flag = cookie('flag');
   			if(empty($flag))
   			{
   				$cont = I('cont','','strip_tags');
		   		if(!empty($cont))
		   		{
		   			
		   			$data['GOOD_ID'] = $id;
		   			$data['USER'] = $uname;
		   			$user_img = cookie("head");
		   			if(empty($user_img))
		   			{
		   				$user_img = "http://www.kyhd.net/Public/img/icon/none.gif";
		   			}
		   			$data['USERIMG'] = $user_img ;
		   			$data['REMARK'] = $cont;
		   			$data['TIME'] = time();
		   			cookie('flag','1',10);
		   			$Model ->add($data);
		   			
	   			}
   			}
   		}
   		$data_r['GOOD_ID'] = $id;
   		$list_r = $Model->field('id,GOOD_ID,USER,USERIMG,REMARK,DING,LOW,TIME')->where($data_r)->select();
   		
   		//添加浏览量的代码！！！！！！
   		/* 右边栏*/
				$Model = M('zone');
        $re_s['LIST'] = 1;
        $re = $Model->field('CONTENT')->where($re_s)->find();
        $Model = M("goods"); 
        $r_data['id']  = array('in',$re['CONTENT']);
        $list0 = $Model->field('id,TITLE,INFO_IMG')->where($r_data)->select();
      /**/
      $this->assign('_k',$_k);
      $this->assign('list0',$list0);
   		$this->assign('list',$list);
   		$this->assign('list_r',$list_r);
   		$this->display(T('Index/good'));
   		//echo($id);
   		
   	}
   	public function listgoods()
   	{
   		$kind = I('kind','','htmlspecialchars');
   		$s = I('s','','htmlspecialchars');
   		$Model = M("goods"); 

   		/**
   		**置顶信息显示
   		**/
			if($_GET['p']==0)
    	{
    		$top['OR_TOP'] = 1;
    		if($kind!=-1)
    		{
    			$top['GOOD_SORT'] = $kind;
    		}
    		$list1 = $Model->field('id,TITLE,INFO_TXT,INFO_IMG,GOOD_SRC,DING,LOW,TIME')->where($top)->order('TIME desc')->select();
    		$this->assign('listtop',$list1);
    	}
    	/*
    	*排序规则 0 time 1 remark 2 scan
   		*/
   		switch($s)
   		{
   			case 1:
   				$ord_list = 'DING desc';
   				break;
   			case 2:
   				$ord_list = 'SCAN_NUM desc';
   				break;
   			default:
   				$ord_list = 'TIME desc';
   		}
    	/**
   		**分类信息显示
   		**/
    	if($kind !=-1){
    		$map['GOOD_SORT'] = $kind;
    		$list = $Model->field('id,TITLE,INFO_TXT,INFO_IMG,GOOD_SRC,DING,LOW,TIME')->where($map)->order($ord_list)->page($_GET['p'].',25')->select();
				$count = $Model->where($map)->count();// 查询满足要求的总记录数    	
    	}else
    	{
    		$list = $Model->field('id,TITLE,INFO_TXT,INFO_IMG,GOOD_SRC,DING,LOW,TIME')->order($ord_list)->page($_GET['p'].',25')->select();
    		$count = $Model->count();// 查询满足要求的总记录数
    	}
    	$Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
    	$Page->setConfig('prev','上一页');
      $Page->setConfig('next','下一页');
      $Page->setConfig('first','第一页');
      $Page->setConfig('last','尾页');
      $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
    	$show = $Page->show();// 分页显示输出
    	$this->assign('page',$show);// 赋值分页输出
	    $this->assign('list1',$list1);
	    $this->assign('kind',$kind);
	    $this->assign('list',$list);
	    $this->assign('s',$s);
	    /* 右边栏*/
      $Model = M('zone');
      $re_s['LIST'] = 1;
      $re = $Model->field('CONTENT')->where($re_s)->find();
      $Model = M("goods"); 
      $data['id']  = array('in',$re['CONTENT']);
      $list0 = $Model->field('id,TITLE,INFO_IMG')->where($data)->select();
      /**/
      $this->assign('list0',$list0);
   		$this->display(T('Index/goodlist'));
   	}
   	/**
    *   search
    **/
    public function search()
    {
    	$tl_c = cookie('timelimit');
    	$empty_info = "对不起，没有找到您需要查找的内容。。。";
    	$get_nowtime = time();
    	if(!empty($tl_c ))//cookie非空有时间限制
  		{
  			//$this->display(T('search/searchpage'));
  			cookie('timelimit',$get_nowtime,10);
  			$this->error('搜索时间间隔过短，请10秒后请继续搜索！');
  			//$scan['SCAN_NUM'] = $list['SCAN_NUM']+1;
  			//$User->where($map)->save($scan); // 根据条件更新记录
  			//$ip = get_client_ip();
  			//cookie('IP',ip,600); // 指定cookie保存时间
  		}else
  		{
  			$content = I('se_cont','','htmlspecialchars');
  			if($content != null && !empty($content))
  			{
  				if(strlen($content)>20)
  				{
  					$content = substr($sea_txt , 0 , 20);
  				}
	  			$User = M('goods'); 
	  			$map['TITLE']=array('like','%'.$content.'%');
	  			$s_list = $User->field('id,TITLE,INFO_IMG,INFO_TXT')->where($map)->order('TIME desc')->select();
		    	$count = $User->where($map)->count();// 查询满足要求的总记录数
		    	$this->assign('s_list',$s_list);// 赋值分页输出
					$empty_info = "关键词:  ".$content."  共搜索到 ".$count." 条宝贝记录，搜索结果如下：";	
  			}
  			cookie('timelimit',$get_nowtime,10);
  		}
  		$this->assign('empty_info',$empty_info);
			$this->display(T('index/searchlist'));	
    }
}