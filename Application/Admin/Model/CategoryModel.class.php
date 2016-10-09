<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class CategoryModel extends RelationModel
{
	protected $_link = array(
		'Category' => array(
			'mapping_type'=>self::HAS_MANY,
			'mapping_name'=>'_child', //自定义
			'mapping_order'=>'cat_sort',
			'parent_key'=>'cat_pid',//很关键
		),
		
	);
}

?>