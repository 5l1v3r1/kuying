<?php if (!defined('THINK_PATH')) exit();?><!--查询条件-->
<div class="pageHeader">
</div>

<div class="pageContent">
    <!--操作按钮-->
    <div class="panelBar">
    	<ul class="toolBar">
        	<li><a class="add" href="/kuying/index.php/Admin/Lunbo/add/navTabId/<?php echo (strtolower(CONTROLLER_NAME)); ?>_<?php echo (strtolower(ACTION_NAME)); ?>" target="dialog" rel="lunbo_add" mask="true" maxable="false" width="800" height="550"><span>新增</span></a></li>
            <li><a class="delete" href="/kuying/index.php/Admin/Lunbo/foreverdelete/navTabId/<?php echo (strtolower(CONTROLLER_NAME)); ?>_<?php echo (strtolower(ACTION_NAME)); ?>" posttype="string" rel="id" target="selectedTodo" title="确定要删除选中的记录吗？" warn="请至少选择一位用户"><span>删除</span></a></li>
            <li><a class="edit" href="/kuying/index.php/Admin/Lunbo/edit/id/{sid_user}" target="dialog" mask="true" warn="请选择一条记录" width="800" height="550" rel="lunbo_edit"><span>编辑</span></a></li>
            <li class="line"></li>
            <li><a class="edit" href="/kuying/index.php/Admin/Lunbo/uploadimg/id/{sid_user}" target="dialog" mask="true" warn="请选择一条记录" width="650" height="450" rel="lunbo_uploadimg"><span>图片上传</span></a></li>
        </ul>
    </div>
    <!--操作按钮结束-->

    <!--数据显示-->
    <table class="list" width="100%" layoutH="115">
    	<thead>
        	<tr>
            	<th width="10%"><input type="checkbox" group="id" class="checkboxCtrl" /></th>
                <th width="5%">编号</th>
                <th width="20%">轮播跳转路径</th>
                <th width="10%">跳转fid</th>
                <th width="55%">FNAME</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid_user" rel="<?php echo ($vo['id']); ?>" ondblclick="$.getInfo(<?php echo ($vo['id']); ?>)">
                    <td><input type="checkbox" name="id" value="<?php echo ($vo['id']); ?>" /></td>
                    <td><?php echo ($vo['id']); ?></td>
                    <td><?php echo ($vo['MODEL']); ?></td>
                    <td><?php echo ($vo['FID']); ?></td>
                    <td><?php echo ($vo['FNAME']); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <!--数据显示结束-->

</div>