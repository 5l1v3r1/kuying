<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
.pageFormContent span { padding-left:0;}
</style>

<script type="text/javascript">
$(document).ready(function() {
    $("#cat_id").change(function(){
		var catid = $(this).children('option:selected').val();
		$("#searchPublicAttr").attr('href','/kuying/index.php/Admin/Goodcheap/searchPublicAttr/cat_id/'+catid);
	});
});
</script>

<div class="pageContent">
	<form method="post" action="/kuying/index.php/Admin/Goodcheap/insert" class="pageForm required-validate" enctype="multipart/form-data" onsubmit="return iframeCallback(this,dialogAjaxDone);">
    	<input type="hidden" name="callbackType" value="closeCurrent" />
        <input type="hidden" name="navTabId" value="<?php echo ($_REQUEST['navTabId']); ?>" />
    	<div class="pageFormContent" layoutH="58">
            <div class="unit">
            	<label>名称：</label>
              <input type="text" name="TITLE" class="required textInput" size="100" value="" />
         	  </div>
         	  <div class="unit">
            	<label>优惠价格：</label>
              <input type="text" name="PRICE" class="required textInput" size="100" value="" />
         	  </div>
         	  <div class="unit">
            	<label>图片链接：</label>
            	<textarea name="INFO_IMG" class="required textInput" rows="2" cols="100"  value="" ></textarea>
         	  </div>
         	  <div class="unit">
            	<label>商品链接：</label>
            	<textarea name="GOOD_SRC" class="required textInput" cols="100" rows="5"></textarea>
         	  </div>
            <div class="unit">
            	<label>是否置顶：</label>
                <select name="OR_TOP">
                	<option value="0">否</option>
                	<option value="1">是</option>
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