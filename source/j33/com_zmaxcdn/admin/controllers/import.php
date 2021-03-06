<?php
/**
 *	description:ZMAX媒体管理组件 资料导入控制器
 *  author：min.zhang
 *  Email:zhang19min88@163.com
 *	Url:http://www.zmax99.com
 *  copyright:南宁市程序人软件科技有限责任公司保留所有权利
 *  date:2015-08-24
 *  check date:2016-07-11
 *  checker :min.zhang
 *  @license GNU General Public License version 3, or later
 */
defined('_JEXEC') or die('you can not access this file!');

jimport('joomla.application.component.controllerform');
class zmaxcdnControllerImport extends JControllerForm
{	
	public function import()
	{
		$model = $this->getModel("import");
		if($model->import())
		{
			$message =JText::_("导入成功!");
			$type ="Message";	
		}
		else
		{
			$message = $model->getError();
			$type="Warning";
		}
		$this->setRedirect("index.php?option=com_zmaxcdn&view=items" ,$message ,$type);
	}
 }	
	

?>