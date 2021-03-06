<?php 
/**
 *	description:ZMAX媒体管理组件 标签组列表布局文件
 *  author：min.zhang
 *  Email:zhang19min88@163.com
 *	Url:http://www.zmax99.com
 *  copyright:南宁市程序人软件科技有限责任公司保留所有权利
 *  date:2015-10-11
 * 	@license GNU General Public License version 3, or later
 *  check date:2016-07-11
 *  checker :min.zhang
 *  modified:min.zhang
 *  modify date:2017-06-21
 */
defined('_JEXEC') or die('you can not access this file!');
class zmaxcdnViewTaggroups extends JViewLegacy
{
     
     public  function display($tpl = null)	 
	 {
		$this->items = $this->get('Items');
		$this->pagination =$this->get('Pagination');
		$this->state =$this->get('State');
		$this->filterForm    = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');
		
		$this->listOrder = $this->state->get('list.ordering'); //需要排序的
		$this->listDir = $this->state->get('list.direction');//需要排序的方向
		
		if(count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />',$errors));
			return false;
		}
		
		if ($this->getLayout() !== 'modal')
		{
			zmaxcdnHelper::addSubmenu('taggroups');
		}
		
		$this->addToolBar();
		$this->sidebar = JHtmlSidebar::render();
		
		parent::display($tpl);
		
	 }
	 
	protected function addToolBar()
	{
		JToolBarHelper::title(JText::_("ZMAX媒体 - 标签组"),'filter');
		JToolBarHelper::addNew('taggroup.add');
		JToolBarHelper::editList('taggroup.edit');
		JToolBarHelper::deleteList('','taggroups.delete' );
		if (JFactory::getUser()->authorise('core.admin', 'com_zmaxcdn'))
		{
			JToolBarHelper::preferences('com_zmaxcdn');
		}
	}
	  
}