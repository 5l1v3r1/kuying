<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
.pageFormContent span { padding-left:0;}
</style>

<script type="text/javascript">
$(document).ready(function() {
    $("#cat_id").change(function(){
		var catid = $(this).children('option:selected').val();
		$("#searchPublicAttr").attr('href','/kuying/index.php/Admin/Goodzone/searchPublicAttr/cat_id/'+catid);
	});
});
</script>

<div class="pageContent">
	<form method="post" action="/kuying/index.php/Admin/Goodzone/insert" class="pageForm required-validate" enctype="multipart/form-data" onsubmit="return iframeCallback(this,dialogAjaxDone);">
    	<input type="hidden" name="callbackType" value="closeCurrent" />
        <input type="hidden" name="navTabId" value="<?php echo ($_REQUEST['navTabId']); ?>" />
    	<div class="pageFormContent" layoutH="58">
            <div class="unit">
            	<label>区域编号：右侧1， 电影创意2，季节服饰3</label>
              <input type="text" name="LIST" class="required textInput" size="100" value="<?php echo ($vo["LIST"]); ?>" />
         	  </div>
            <div class="unit">
            	<label>区域英文代号（注释功能）：</label>
            	 <input type="text" name="ZONE_NAME" class="required textInput" size="100" value="<?php echo ($vo["ZONE_NAME"]); ?>" />
         	  </div>
         	  <div class="unit">
            	<label>商品id序列：</label>
            	<input type="text" name="CONTENT" class="required textInput" size="100" value="<?php echo ($vo["CONTENT"]); ?>" />
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