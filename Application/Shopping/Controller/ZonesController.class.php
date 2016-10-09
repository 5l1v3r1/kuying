<?php
namespace Shopping\Controller;
use Think\Controller;
class ZonesController extends Controller {
    /**
		** 首页显示
		**/		
    public function index(){
        //$this->show();
                //$this->show();
        /* 右边栏*/
    }
    public function show99(){
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
        $Model = M('99zone');
        /**
	   		**置顶信息显示
	   		**/
				if($_GET['p']==0)
	    	{
	    		$map1['OR_TOP'] = 1;
        	$list1 = $Model->field('TITLE,PRICE,INFO_IMG,GOOD_SRC,TIME')->where($map1)->order('TIME desc')->select();
	    	}
        $list = $Model->field('TITLE,PRICE,INFO_IMG,GOOD_SRC,TIME')->order('TIME desc')->page($_GET['p'].',50')->select();
    		$count = $Model->count();// 查询满足要求的总记录数
    		$Page = new \Think\Page($count,50);// 实例化分页类 传入总记录数和每页显示的记录数
	    	$Page->setConfig('prev','上一页');
	      $Page->setConfig('next','下一页');
	      $Page->setConfig('first','第一页');
	      $Page->setConfig('last','尾页');
	      $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
	    	$show = $Page->show();// 分页显示输出
	    	$this->assign('page',$show);// 赋值分页输出
        
        $this->assign('list0',$list0);
        $this->assign('list',$list);
        $this->assign('list1',$list1);
        $this->display(T('Index/99zone'));
    }
    public function showOther()
    {
    	/* 右边栏*/
        $Model = M('zone');
        $re_s['LIST'] = 1;
        $re = $Model->field('CONTENT')->where($re_s)->find();
        $Model = M("goods"); 
        $data['id']  = array('in',$re['CONTENT']);
        $list0 = $Model->field('id,TITLE,INFO_IMG')->where($data)->select();
      /**/
      /*show season 3 film 2*/
      	$Model = M('zone');
      	$z_sort = I('z_sort','','htmlspecialchars');
      	$map['LIST'] = $z_sort; // 2 season 3 film
      	$z_re = $Model->field('CONTENT')->where($map)->find();
      	$Model = M("goods"); 
      	$_data['id']  = array('in',$z_re['CONTENT']);
      	$list = $Model->field('id,TITLE,INFO_IMG')->where($_data)->select();
      	
      /**/
      $this->assign('list0',$list0);
      $this->assign('list',$list);
      switch($z_sort)
      {
      	case 2:
      		$this->display(T('Index/season'));
      		break;
      	case 3:
      	  $this->display(T('Index/film'));
      	  break;
      	default:
      	 
      }
      
    	
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
    
}