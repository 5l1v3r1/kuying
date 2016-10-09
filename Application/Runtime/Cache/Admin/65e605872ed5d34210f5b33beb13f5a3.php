<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
$(function()
{
	//双击表格弹出窗口信息
	$.extend({'getInfo':function(id){
		$.pdialog.open("/kuying/index.php/Admin/User/showinfo/id/"+id,"dialog","查看会员信息",{maxable:false,mask:true,width:500,height:300});
	}});
});
</script>

<!--查询条件-->
<div class="pageHeader">
	<form id="pagerForm" action="/kuying/index.php/Admin/User" method="post" onsubmit="return navTabSearch(this)">
    	<input type="hidden" name="pageNum" value="<?php echo ($currentPage); ?>" />
        <input type="hidden" name="numPerPage" value="<?php echo ($numPerPage); ?>" />
        <input type="hidden" name="handle_name" value="admin_user_search" />
    	<div class="searchBar">
        	<ul class="searchContent">
            	<li>
                	<label>查找范围：</label>
                    <select name="keytype">
                    	<option value="" selected>未选择</option>
                    	<option value="USERNAME" <?php if($_POST['keytype']== 'USERNAME'): ?>selected<?php endif; ?>>用户名</option>
                      <option value="EMAIL" <?php if($_POST['keytype']== 'EMAIL'): ?>selected<?php endif; ?>>邮箱</option>
                    </select>
                </li>
                <li>
                	<label>关键字：</label>
                    <input name="keyword" type="text" size="25" value="<?php echo ($_POST['keyword']); ?>"  />
                </li>
            </ul>
            <div class="subBar">
            	<ul>
                	<li>
                    	<div class="buttonActive">
                        	<div class="buttonContent">
                            	<button type="submit">查询</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </form>
</div>

<div class="pageContent">
    <!--操作按钮-->
    <div class="panelBar">
    	<ul class="toolBar">
        	<li><a class="add" href="/kuying/index.php/Admin/User/add/navTabId/<?php echo (strtolower(CONTROLLER_NAME)); ?>_<?php echo (strtolower(ACTION_NAME)); ?>" target="dialog" rel="user_add" mask="true" maxable="false" width="550"><span>新增</span></a></li>
            <li><a class="delete" href="/kuying/index.php/Admin/User/foreverdelete/navTabId/<?php echo (strtolower(CONTROLLER_NAME)); ?>_<?php echo (strtolower(ACTION_NAME)); ?>" posttype="string" rel="id" target="selectedTodo" title="确定要删除选中的记录吗？" warn="请至少选择一位用户"><span>删除</span></a></li>
            <li><a class="edit" href="/kuying/index.php/Admin/User/edit/id/{sid_user}" target="dialog" mask="true" warn="请选择一条记录" width="550" height="380" rel="user_edit" ><span>编辑</span></a></li>
            <li><a class="delete" href="/kuying/index.php/Admin/ExportExcel/index/module_name/<?php echo (CONTROLLER_NAME); ?>" target="dwzExport" targetType="navTab" title="确定要导出所有记录吗？"><span>导出Excel</span></a></li>
            <li class="line"></li>
            <li><a class="icon" href="/kuying/index.php/Admin/User/password/id/{sid_user}" target="dialog" mask="true" maxable="false" warn="请选择一条记录" width="420" height="200"><span>修改密码</span></a></li>
        </ul>
    </div>
    <!--操作按钮结束-->

    <!--数据显示-->
    <table class="list" width="100%" layoutH="115">
    	<thead>
        	<tr>
            	<th width="8%"><input type="checkbox" group="id" class="checkboxCtrl" /></th>
                <th width="8%">编号</th>
                <th width="8%">用户名</th>
                <th width="12%">邮箱</th>
                <th width="8%">密码</th>
                <th width="8%">last签到</th>
                <th width="8%">last抽奖</th>
                <th width="8%">抽奖次数</th>
                <th width="8%">用户组</th>
                <th width="8%">积分</th>
                <th width="8%">注册时间</th>
                <th width="8%">注册状态</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid_user" rel="<?php echo ($vo['id']); ?>" ondblclick="$.getInfo(<?php echo ($vo['id']); ?>)">
                    <td><input type="checkbox" name="id" value="<?php echo ($vo['id']); ?>" /></td>
                    <td><?php echo ($vo['id']); ?></td>
                    <td><?php echo ($vo['USERNAME']); ?></td>
                    <td><?php echo ($vo['EMAIL']); ?></td>
                    <td><?php echo ($vo['PASSWORD']); ?></td>
                    <td><?php echo ($vo['SIGN_TIME']); ?></td>
                    <td><?php echo ($vo['GETS_TIME']); ?></td>
                    <td><?php echo ($vo['GETS_COUNT']); ?></td>
                    <td><?php echo ($vo['USER_GROUP']); ?></td>
                    <td><?php echo ($vo['USER_SCORE']); ?></td>
                    <td><?php echo ($vo['REGTIME']); ?></td>
                    <td><?php if($vo['REG_FLAG'] == 1): ?>已验证<?php else: ?>未验证<?php endif; ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <!--数据显示结束-->

    <!--数据分页-->
    <div class="panelBar">
    	<div class="pages">
        	<span>共&nbsp;<?php echo ($totalCount); ?>&nbsp;条,&nbsp;</span>
                <select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
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