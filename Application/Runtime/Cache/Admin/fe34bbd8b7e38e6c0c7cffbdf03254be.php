<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
$(function()
{
	//双击表格弹出窗口信息
	$.extend({'getInfo':function(id){
		$.pdialog.open("/kuying/index.php/Admin/Thunder/showinfo/id/"+id,"dialog","查看会员信息",{maxable:false,mask:true,width:500,height:300});
	}});
});
</script>

<!--查询条件-->
<div class="pageHeader">
</div>

<div class="pageContent">
    <!--操作按钮-->
    <div class="panelBar">
    	<ul class="toolBar">
            <li><a class="edit" href="/kuying/index.php/Admin/Thunder/edit/id/{sid_user}" target="dialog" mask="true" maxable="true" minable="true"  warn="请选择一条记录" width="550" height="380" rel="thunder_edit" ><span>编辑</span></a></li>
            <li class="line"></li>
        </ul>
    </div>
    <!--操作按钮结束-->

    <!--数据显示-->
    <table class="list" width="100%" layoutH="115">
    	<thead>
        	<tr>
            	<th width="4%"><input type="checkbox" group="id" class="checkboxCtrl" /></th>
                <th width="8%">T_LIST</th>
                <th width="4%">UPTIME</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid_user" rel="<?php echo ($vo['id']); ?>" ondblclick="$.getInfo(<?php echo ($vo['id']); ?>)">
                    <td><input type="checkbox" name="id" value="<?php echo ($vo['id']); ?>" /></td>
                    <td><?php echo ($vo['T_LIST']); ?></td>
                    <td><?php echo ($vo['UP_TIME']); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <!--数据显示结束-->

    <!--数据分页-->
    <div class="panelBar">
    	<div class="pages">
        	<span>共&nbsp;<?php echo ($totalCount); ?>&nbsp;条,&nbsp;</span>
                <select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
                  <option value="20" selected>默认值</option>
                  <option value="10" <?php if(($numPerPage) == "10"): ?>selected<?php endif; ?>>10</option>
                  <option value="15" <?php if(($numPerPage) == "15"): ?>selected<?php endif; ?>>15</option>
                  <option value="20" <?php if(($numPerPage) == "20"): ?>selected<?php endif; ?>>20</option>
                  <option value="50" <?php if(($numPerPage) == "50"): ?>selected<?php endif; ?>>50</option>
                  <option value="100" <?php if(($numPerPage) == "100"): ?>selected<?php endif; ?>>100</option>
           	 	</select>
            <span>&nbsp;条&nbsp;/&nbsp;页</span>
        </div>
        <div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
    </div>
    <!--数据分页结束-->
</div>