<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/kuying/index.php/Admin/Hdzy/insert" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
    	<input type="hidden" name="callbackType" value="closeCurrent" />
        <input type="hidden" name="navTabId" value="<?php echo ($_REQUEST['navTabId']); ?>" />
        <input type="hidden" name="id" value="<?php echo ($_REQUEST['id']); ?>" />
    	<div class="pageFormContent" layoutH="58">
        	<div class="unit">
            	<label>FNAME：</label>
              <input type="text" name="FNAME" class="required textInput" size="200" maxlength="200" value="<?php echo ($vo["FNAME"]); ?>" />
          </div>
        	<div class="unit">
            	<label>SORT：</label>
              <input type="text" name="SORT" class="required number" size="50" maxlength="5" value="<?php echo ($vo["SORT"]); ?>" />
          </div>
          <div class="unit">
            	<label>TYPE：</label>
              <input type="text" name="TYPE" class="required number" size="50" maxlength="5" value="<?php echo ($vo["TYPE"]); ?>" />
          </div>
          <div class="unit">
							<label>LINK：</label>
							<input type="text" name="LINK" class="required textInput" size="50" maxlength="30" value="<?php echo ($vo["LINK"]); ?>" />
					</div>
					<div class="unit">
            	<label>SCORE：</label>
              <input type="text" name="SCORE" class="required number" size="50" maxlength="100" value="<?php echo ($vo["SCORE"]); ?>" />
          </div>
          <div class="unit">
							<label>DOWN_NO：</label>
							<input type="text" name="DOWN_NO" class="required number" size="100" maxlength="10" value="<?php echo ($vo["DOWN_NO"]); ?>" />
					</div>
					<div class="unit">
							<label>SCAN_NUM：</label>
							<input type="text" name="SCAN_NUM" class="required number" size="100" maxlength="10" value="<?php echo ($vo["SCAN_NUM"]); ?>" />
					</div>
					<div class="unit">
							<label>ALDOWN：</label>
							<input type="text" name="ALDOWN" class="required textInput" size="100" value="<?php echo ($vo["ALDOWN"]); ?>" />
					</div>
					<div class="unit">
							<label>MES_DIV：</label>
							<textarea  name="MES_SHOW_DIV"  class="editor" rows="50" cols="180"  value="<?php echo ($vo["MES_SHOW_DIV"]); ?>" ></textarea>
					</div>
					<div class="unit">
            	<label>是否置顶：</label>
								<select name="ORTOP">
              		<option value="0">不置顶</option>
									<option value="1">置顶</option>
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