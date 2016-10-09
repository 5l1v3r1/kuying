<?php if (!defined('THINK_PATH')) exit();?><!--查询条件-->
<div class="pageHeader">
	<form id="pagerForm" action="/kuying/index.php/Admin/Goods" method="post" onsubmit="return navTabSearch(this)">
    	<input type="hidden" name="pageNum" value="1" />
        <input type="hidden" name="numPerPage" value="<?php echo ($numPerPage); ?>" />
    	<div class="searchBar">
        	<ul class="searchContent">
            	<li>
                	<label>查找范围：</label>
                    <select name="keytype">
                    	<option value="" selected>未选择</option>
                    	<option value="id" <?php if($_POST['keytype']== 'FID'): ?>selected<?php endif; ?>>id</option>
                      <option value="OR_INDEX" <?php if($_POST['keytype']== 'SORT'): ?>OR_INDEX<?php endif; ?>>OR_INDEX</option>
                      <option value="OR_TOP" <?php if($_POST['keytype']== 'LINK'): ?>selected<?php endif; ?>>OR_TOP</option>
                      <option value="GOOD_SORT" <?php if($_POST['keytype']== 'TYPE'): ?>selected<?php endif; ?>>GOOD_SORT</option>
                      <option value="TITLE" <?php if($_POST['keytype']== 'FNAME'): ?>selected<?php endif; ?>>TITLE</option>
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
        	<li><a class="add" href="/kuying/index.php/Admin/Goods/add/navTabId/<?php echo (strtolower(CONTROLLER_NAME)); ?>_<?php echo (strtolower(ACTION_NAME)); ?>" target="dialog" rel="goods_add" mask="true" maxable="false" width="800" height="800"><span>新增</span></a></li>
            <li><a class="delete" href="/kuying/index.php/Admin/Goods/foreverdelete/navTabId/<?php echo (strtolower(CONTROLLER_NAME)); ?>_<?php echo (strtolower(ACTION_NAME)); ?>" posttype="string" rel="id" target="selectedTodo" title="确定要删除选中的记录吗？" warn="请至少选择一位用户"><span>删除</span></a></li>
            <li><a class="edit" href="/kuying/index.php/Admin/Goods/edit/id/{sid_user}" target="dialog" mask="true" warn="请选择一条记录" width="800" height="800" rel="goods_edit"><span>编辑</span></a></li>
            <li class="line"></li>
            <li><a class="edit" href="/kuying/index.php/Admin/Goods/uploadimg/id/{sid_user}" target="dialog" mask="true" warn="请选择一条记录" width="650" height="450" rel="goods_uploadimg"><span>图片上传</span></a></li>
        </ul>
    </div>
    <!--操作按钮结束-->

    <!--数据显示-->
    <table class="list" width="100%" layoutH="115">
    	<thead>
        	<tr>
            	<th width="3%"><input type="checkbox" group="id" class="checkboxCtrl" /></th>
                <th width="6%">id</th>
                <th width="3%">是否首页</th>
                <th width="3%">是否置顶</th>
                <th width="3%">分类</th>
                <th width="15%">名称</th>
                <th width="22%">文字介绍</th>
                <th width="20%">图片链接</th>
                <th width="12%">商品链接</th>
                <th width="10%">上传时间</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid_user" rel="<?php echo ($vo['id']); ?>" ondblclick="$.getInfo(<?php echo ($vo['id']); ?>)">
                    <td><input type="checkbox" name="id" value="<?php echo ($vo['id']); ?>" /></td>
                    <td><?php echo ($vo['id']); ?></td>
                    <td><?php echo ($vo['OR_INDEX']); ?></td>
                    <td><?php echo ($vo['OR_TOP']); ?></td>
                    <td><?php echo ($vo['GOOD_SORT']); ?></td>
                    <td><?php echo ($vo['TITLE']); ?></td>
                    <td><?php echo substr($vo['INFO_TXT'],0,40); ?></td>
                    <td><?php echo ($vo['INFO_IMG']); ?></td>
                    <td><?php echo ($vo['GOOD_SRC']); ?></td>
                    <td><?php echo ($vo['TIME']); ?></td>
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