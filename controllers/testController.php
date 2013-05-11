<?php

class testController extends controller
{

	function __construct()
	{
		parent::__construct();
		$this->setlayout('admin/dashboard');
		//$this->view->page = 'Dashboard';
	}

	function indexAction()
	{
		$this->setlayout('custom');
		$this->view->myvar = "this is test this test";


		$model = new myModel();



		$this->view->arr = $model->test();
		$this->render('test');
	}

}

