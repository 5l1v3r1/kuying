<?php
namespace Home\Controller;
use Think\Controller;
class ShopmemController extends Controller {
    /*
    *生成验证码
    *
    */
    public function verify(){
        $Verify = new \Think\Verify();  
		    $Verify->fontSize = 25;  
		    $Verify->length   = 4;  
		    $Verify->useNoise = true;  
		    $Verify->useZh = true;  
		    $Verify->imageW = 0;  
		    $Verify->imageH = 0;  
		    //$Verify->expire = 600;  
		    $Verify->entry();  
    }
    /**
    *   登录
    **/ 
    
    
    
    
    
    
    
    
}