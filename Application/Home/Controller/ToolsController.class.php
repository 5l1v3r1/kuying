<?php
namespace Home\Controller;
use Think\Controller;
class ToolsController extends Controller {
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
		** player显示
		**/		
    public function index(){
        //$this->show();
        $this->display(T('tools/player'));
    }
    /**
		** thunder id
		**/		
    public function getThId(){
        //$this->show();
        $Model = M("thunder"); 
        $data['id'] = 1;
        $list = $Model->field('T_LIST,UP_TIME')->where($data)->find();
        $this->assign('list',$list);
        $this->display(T('tools/thunder'));
    }

}