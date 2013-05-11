<?php

class membersController extends controller
{

	function __construct()
	{
		parent::__construct();
		$this->setlayout('admin/members');
		//$this->view->page = 'Dashboard';
	}

	function indexAction()
	{
		$this->view->myvar = "this is test this test";
		$this->view->test = "this is test var";
		$this->render('members');
	}

}

