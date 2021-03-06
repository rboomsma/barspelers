<?php
/*------------------------------------------------------------------------
# Copyright (C) 2005-2012 WebxSolution Ltd. All Rights Reserved.
# @license - GPLv2.0
# Author: WebxSolution Ltd
# Websites:  http://www.webxsolution.com
# Terms of Use: An extension that is derived from the JoomlaCK editor will only be allowed under the following conditions: http://joomlackeditor.com/terms-of-use
# ------------------------------------------------------------------------*/ 

// no direct access
defined( '_JEXEC' ) or die();

class InstallerViewinstall extends JViewLegacy
{
	protected $canDo;
	protected $app;
	protected $form;
	protected $state;
	protected $paths;
	public $showMessage = false;

	function display($tpl=null)
	{
		$paths = new stdClass();
		$paths->first = '';
		
		$this->canDo	= JCKHelper::getActions();
		$this->app		= JFactory::getApplication();
		$this->form		= $this->get('Form');
		$this->state	= $this->get('State');
		$this->paths	= $paths;

		if(!$this->canDo->get('jckman.install'))
		{
			$this->app->redirect( JRoute::_( 'index.php?option=com_jckman&view=cpanel', false ), JText::_( 'COM_JCKMAN_PLUGIN_PERM_NO_INSTALL' ), 'error' );
			return false;
		}//end if

		// Check for errors.
		if(count($errors = $this->get('Errors')))
		{
			JCKHelper::error( implode("\n", $errors));
			return false;
		}

		JHTML::_('behavior.tooltip');

		$this->addToolbar();
		parent::display($tpl);
	}

	protected function addToolbar()
	{
		$bar = JToolBar::getInstance('toolbar');

		JToolBarHelper::title( JText::_( 'COM_JCKMAN_SUBMENU_INSTALL_NAME' ), 'plugin.png' );

		// Add a Link button for Control Panel
		$bar->appendButton( 'Link', 'cpanel', JText::_( 'COM_JCKMAN_SUBMENU_CPANEL_NAME' ), 'index.php?option=com_jckman&view=cpanel');
		JToolBarHelper::help( $this->app->input->get( 'view' ), false,'http://www.joomlackeditor.com/installation-guide?start=16#installer_help');

		JCKHelper::addSubmenu( $this->app->input->get( 'view' ) );

		$this->sidebar = JHtmlSidebar::render();
	}//end function
}