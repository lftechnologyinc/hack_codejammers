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

		if (!empty($_POST)){
			$newStatus=$_POST['newStatus'];
		$data['user_id']=1;
		$data['checkin']=2;
		$data['checkout']=3;
		$data['date']=4;
		$data['state']=1;


		$timeTableobj=new membersModel();
		$timeTableobj->saveUserTime($data);
		}
		$this->render('members');
	}

	function checkinoutAction(){

	}

}

