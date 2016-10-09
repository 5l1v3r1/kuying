<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" src="/kuying/Public/backend/uploadify/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="/kuying/Public/backend/uploadify/uploadify.css" />
<style type="text/css">
    .uploadify-button {
        background-color: transparent;
        border: none;
        padding: 0;
    }
    .uploadify:hover .uploadify-button {
        background-color: transparent;
    }
</style>

<div class="pageContent">
	<form enctype="multipart/form-data">
    	<div class="pageFormContent" layoutH="58">
        	<input id="file_upload" name="file_upload" type="file"   multiple="true">
            <div id="image" class="image"></div>   
            <script type="text/javascript">
			function delimg(delName,delId)
			{			
				var url = "/kuying/index.php/Admin/Toppic/delimg";	//删除图片的路径
				$.post(url,{'name':delId},function(data){		
					$('#'+delName).html(data.info);		//输出后台返回信息
					$('#'+delName).hide(3000);			//自动隐藏
				},'json');
			}
			
			$(function()
			{
				var id = <?php echo ($_REQUEST['id']); ?>;
				$('#file_upload').uploadify({
					'formData'      : {'id' : id},
					'fileTypeDesc' : 'Image Files',				//类型描述
					'fileTypeExts' : '*.gif',		//允许类型
					'fileSizeLimit' : '10MB',					//允许上传最大值
					'swf'      : '/kuying/Public/backend/uploadify/uploadify.swf',	//加载swf
					'uploader' : '/kuying/index.php/Admin/Toppic/uploadify',					//上传路径
					'buttonImage' : '/kuying/Public/backend/uploadify/browse-btn.png',
					'onUploadSuccess' : function(file, data, response) {	//成功上传返回
						
						var n=parseInt(Math.random()*100);			//100以内的随机数
						$('#image').append('<div id="'+n+'" class="photo"><a href="'+'/kuying/Public/'+data+'" target="_blank"><img src="'+'/kuying/Public/'+data+'"  height="80" width="80" /></a><div class="del"><a href="javascript:void(0)" onclick=delimg("'+n+'","'+data+'");return false;>删除</a></div></div>');
					}
				});
			});
			</script>
        </div>
        
        <div class="formBar">
        	<ul>
                <li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
            </ul>
        </div>
    </form>
</div>