<?php if (!defined('THINK_PATH')) exit();?><!--查询条件-->
<div class="pageHeader">
</div>

<div class="pageContent">
    <!--操作按钮-->
    <div class="panelBar">
    	<ul class="toolBar">
            <li><a class="delete" href="/kuying/index.php/Admin/Toppic/foreverdelete/id/{sid_user}" posttype="string" rel="id" target="selectedTodo" title="确定要删除选中的记录吗？" warn="请至少选择一位用户"><span>删除</span></a></li>
            <li class="line"></li>
            <li><a class="edit" href="/kuying/index.php/Admin/Toppic/uploadimg/id/{sid_user}" target="dialog" mask="true" warn="请选择一条记录" width="650" height="450" rel="toppic_uploadimg"><span>图片上传</span></a></li>
            <li><a class="edit" href="/kuying/index.php/Admin/Toppic/uploadmusic" target="dialog" mask="true" warn="请选择一条记录" width="650" height="450" rel="toppic_uploadmusic"><span>首页背景音乐上传</span></a></li>
        </ul>
    </div>
    <!--操作按钮结束-->

    <!--数据显示-->
    <table class="list" width="100%" layoutH="115">
    	<thead>
        	<tr>
            	<th width="10%"><input type="checkbox" group="id" class="checkboxCtrl" /></th>
                <th width="40%">编号</th>

            </tr>
        </thead>
        <tbody>
        	<tr target="sid_user" rel="1" ondblclick="$.getInfo(1)">
                    <td><input type="checkbox" name="id" value="1" /></td>
                    <td>高清电影list顶部图片</td>
          </tr>
          <tr target="sid_user" rel="2" ondblclick="$.getInfo(2)">
                    <td><input type="checkbox" name="id" value="2" /></td>
                    <td>高清综艺list顶部图片</td>
          </tr>
          <tr target="sid_user" rel="3" ondblclick="$.getInfo(3)">
                    <td><input type="checkbox" name="id" value="3" /></td>
                    <td>小容量电影BTlist顶部图片</td>
          </tr>
          <tr target="sid_user" rel="4" ondblclick="$.getInfo(4)">
                    <td><input type="checkbox" name="id" value="4" /></td>
                    <td>高清电视剧list顶部图片</td>
          </tr>
          <tr target="sid_user" rel="5" ondblclick="$.getInfo(5)">
                    <td><input type="checkbox" name="id" value="5" /></td>
                    <td>网站首页进入图片</td>
          </tr>
        </tbody>
    </table>
    <!--数据显示结束-->

</div>