<?php

class indexController extends controller
{

	function __construct()
	{
		parent::__construct();
		$this->setlayout('index');
	}

	function indexAction()
	{
		$this->view->myvar = "this is index page";
		$this->render('index');
	}

}

