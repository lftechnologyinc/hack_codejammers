<?php

class errorController extends controller
{

	function __construct()
	{
		parent::__construct();
		$this->setlayout('error');
	}

	function indexAction()
	{
		$this->view->msg = "Page not found!!";
		$this->render('error');
	}

	function noprivilegeAction()
	{
		$this->view->msg = "Sorry ! you don't have privilege to access this page...try after <a href='index.php?controller=user&action=login'>Login</a>";
		$this->render('error');


		//redirect('index.php?controller=user&action=login');
	}

}

