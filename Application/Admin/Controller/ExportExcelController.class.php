<?php
namespace Admin\Controller;
use Think\Controller;
class ExportExcelController extends Controller
{
	public function index()
	{
		//取出需要导出的数据
		//$user=M('User'); //此方法不通用
		$model = M(I('module_name'));
		$map = $this->_search(I('module_name')); //生成Map查询对象
		//排序字段，默认为主键名
		$order = I('_order') != '' ? I('_order') : $model->getPk();
		//排序方式，默认倒序排列，首次显示时因为不会接收到提交数据，所以都是显示的默认值
		$sort = I('_sort') == 'asc' ? 'asc' : 'desc';
		$modellist = $model->where($map)->order($order . ' ' . $sort)->select();
		
		//导入第三方扩展类库
		Vendor('PHPExcel179.PHPExcel');
		$objPHPExcel = new \PHPExcel(); //创建PHPExcel对象
		//设置属性
		$objPHPExcel->getProperties()->setCreator("StudyFox")->setLastModifiedBy("StudyFox")->setTitle("StudyFox.com")->setDescription("StudyFox.com")->setKeywords("StudyFox");
		//设置宽度
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(18);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(35);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);

		//设置行高
		$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
		$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
		//设置字体样式
		$objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10); //默认字体大小
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16)->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('A2:N2')->getFont()->setBold(true); //粗体
		
		//合并excel
		$objPHPExcel->getActiveSheet()->mergeCells('A1:N1');
		
		//设置垂直、水平居中
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()
			->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER)
			->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A2:N2')->getAlignment()
			->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER)
			->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
		//设置边框
		$objPHPExcel->getActiveSheet()->getStyle('A2:N2')->getBorders()->getAllBorders()
			->setBorderStyle(\PHPExcel_Style_Border::BORDER_THIN);
			
		//前两行单元格内容
		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1',I('module_name').'表查询记录汇总表')
			->setCellValue('A2','ID')
			->setCellValue('B2','用户名')
			->setCellValue('C2','密码')
			->setCellValue('D2','邮箱')
			->setCellValue('E2','性别')
			->setCellValue('F2','用户资金')
			->setCellValue('G2','注册时间')
			->setCellValue('H2','注册IP')
			->setCellValue('I2','最后登录时间')
			->setCellValue('J2','最后登录IP')
			->setCellValue('K2','QQ')
			->setCellValue('L2','手机号')
			->setCellValue('M2','状态')
			->setCellValue('N2','备注');
		
		//数据行设置
		for($i = 0;$i < count($modellist);$i++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue('A' . ($i+3), $modellist[$i]['id']);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . ($i+3), $modellist[$i]['username']);
			$objPHPExcel->getActiveSheet()->setCellValue('C' . ($i+3), $modellist[$i]['password']);
			$objPHPExcel->getActiveSheet()->setCellValue('D' . ($i+3), $modellist[$i]['email']);
			$objPHPExcel->getActiveSheet()->setCellValue('E' . ($i+3), $modellist[$i]['sex']=1?'男':'女');
			$objPHPExcel->getActiveSheet()->setCellValue('F' . ($i+3), $modellist[$i]['user_money']);
			$objPHPExcel->getActiveSheet()->setCellValue('G' . ($i+3), $modellist[$i]['reg_time']);
			$objPHPExcel->getActiveSheet()->setCellValue('H' . ($i+3), $modellist[$i]['reg_ip']);
			$objPHPExcel->getActiveSheet()->setCellValue('I' . ($i+3), $modellist[$i]['last_login']?date('Y-m-d H:i:s',$modellist[$i]['last_login']):'');
			$objPHPExcel->getActiveSheet()->setCellValue('J' . ($i+3), $modellist[$i]['last_ip']);
			$objPHPExcel->getActiveSheet()->setCellValue('K' . ($i+3), $modellist[$i]['qq']);
			$objPHPExcel->getActiveSheet()->setCellValue('L' . ($i+3), $modellist[$i]['mobile']);
			$objPHPExcel->getActiveSheet()->setCellValue('M' . ($i+3), $modellist[$i]['status']=1?'正常':'禁止');
			$objPHPExcel->getActiveSheet()->setCellValue('N' . ($i+3), $modellist[$i]['remark']);
			
			//设置垂直、水平居中
			$objPHPExcel->getActiveSheet()->getStyle('A' . ($i+3).':N'.($i+3))->getAlignment()
				->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER)
				->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
			$objPHPExcel->getActiveSheet()->getRowDimension($i+3)->setRowHeight(16);//行高
				
			//设置边框
			$objPHPExcel->getActiveSheet()->getStyle('A' . ($i+3).':N'.($i+3))->getBorders()->getAllBorders()
				->setBorderStyle(\PHPExcel_Style_Border::BORDER_THIN);
		}
		
		//sheet命名
		$objPHPExcel->getActiveSheet()->setTitle(I('module_name').'表');
		//默认打开的sheet
		$objPHPExcel->setActiveSheetIndex(0);
		
		//excel头参数
		header("Content-Type:application/vnd.ms-execl");
		header('Content-Disposition:attachment;filename='.I('module_name').'表查询结果('.date('YmdHis').').xls');//日期文件名后缀
		header('Cache-Control:max-age=0');
		
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); //excel2007为xlsx
		$objWriter->save('php://output');
	}
	public function _search($name)
	{
		$model = M($name);
		$fields = $model->getDbFields();
		//此处用于单个文本框搜索 user列表中用不到，通用方法
		foreach($fields as $key => $val)
		{
			if(I($val) != '')
			{
				$map[$val] = I($val);
			}
		}
		//适用下拉选择
		if(I('keytype') != '')
		{
			$map[I('keytype')] = I('keyword');
		}
		return $map;
	}
}
?>