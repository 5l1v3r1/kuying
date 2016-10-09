<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/kuying/index.php/Admin/Thunder/update" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
    	<input type="hidden" name="callbackType" value="closeCurrent" />
        <input type="hidden" name="navTabId" value="<?php echo ($_REQUEST['navTabId']); ?>" />
        <input type="hidden" name="id" value="<?php echo ($_REQUEST['id']); ?>" />
    	<div class="pageFormContent" layoutH="58">
					<div class="unit">
							<label>T_LIST：</label>
							<textarea  name="T_LIST"  class="editor" rows="50" cols="180"  value="<?php echo ($vo['T_LIST']); ?>" ></textarea>
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