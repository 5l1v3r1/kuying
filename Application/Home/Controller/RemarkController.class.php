<?php
namespace Home\Controller;
use Think\Controller;
class RemarkController extends Controller {
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
    public function getContent(){
    	if((session('u_UID') != null||!empty($uu_uid))&& (session('u_username') != null||!empty($uu_username)))//判断是否已经登录
    	{
    		$sort = I('get.sort');
    		$fid= I('get.rfid');
    		if($fid == 0)
    		{
    			$this->error('请不要重复提交！');
    			return 0;
    		}
    		$re_txt = I('post.content');
    		$re_txt  = str_replace("/&lt;/ig/br//&gt;/ig","",$re_txt);
    		if($re_txt = null || empty($re_txt))
    		{
    			$this->error('评论内容不能为空！');
    			return 0;
    		}
    		$re_txt = "<span ><img src='http://www.kyhd.net/img/icon/remark_img.gif'>酷影网会员：".session('u_username')."<small>------------------发布日期：".date("Y-m-d H:i")."</small></span>".$re_txt."<hr>";
    		$Model = M("remark");
    		$map['SORT'] = $sort;
    		$map['FID'] = $fid;
    		$list = $Model->field('FID,SORT,REMARK')->where($map)->find();
    		if($list != null || !empty($list))
    		{
    			
    			if(strlen($re_txt)<=65535)
    			{
    				$re_txt = $re_txt.$list['REMARK'];
    			}
    			$update = $Model-> where($map)->setField('REMARK',$re_txt);
    			if(!$update)
    			{
    				$this->error('发表评论失败！');
    			}
    		}else
    		{
    			$map['REMARK'] = $re_txt ;
    			//echo $re_txt;
    			$flag = $Model->field('FID,SORT,REMARK')->data($map)->add();
    			if(!$flag)
    			{
    				$this->error('发表评论失败！');
    			}
    		}
    		$re_txt = str_replace("/&lt;/ig","<",$re_txt);
				$re_txt = str_replace("/&gt;/ig",">",$re_txt);
				$re_txt = str_replace("/&quot;/ig","\"",$re_txt);
				$re_txt = str_replace("/&apos;/ig","\'",$re_txt);
				$re_txt = str_replace("/&amp;/ig","&",$re_txt);
				echo $re_txt;
				$this->assign('re_txt',$re_txt );
				if($sort == 1)
				{
					$this->display(T('hdzone/hdfileshow/filmshow'));
				}
				
    		//$map['SORT'] = array('eq',$sort);
    	}else
    	{
    		$this->error('亲，还未登录，没有发言权哦！');
    	}
      
    }
    /**
		** 首页显示
		**/		
    

}