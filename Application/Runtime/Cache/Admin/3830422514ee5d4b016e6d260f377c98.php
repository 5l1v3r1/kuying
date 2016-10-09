<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
.pageFormContent span { padding-left:0;}
</style>

<div class="pageContent">
	<form method="post" action="/kuying/index.php/Admin/Goodlunbo/insert" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
    	<input type="hidden" name="callbackType" value="closeCurrent" />
        <input type="hidden" name="navTabId" value="<?php echo ($_REQUEST['navTabId']); ?>" />
        <input type="hidden" name="id" value="<?php echo ($_REQUEST['id']); ?>" />
    	<div class="pageFormContent" layoutH="58">
	    		<div class="unit">
	            	<label>GOOD_ID：</label>
	              <input type="text" name="GOOD_ID" class="required number" size="50" maxlength="30" value="" />
	        </div>
        	<div class="unit">
            	<label>所在板块：</label>
								<select name="ZONE">
              		<option value="1">商品list</option>
									<option value="2">9.9</option>
								</select>	
          </div>
      </div>   
      <div class="formBar">
      	<ul>
          	<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
              <li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
          </ul>
      </div>
  </form>
</div>