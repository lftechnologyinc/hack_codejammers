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
$user = session::get('user');
$user_id=$user['user_id'];

		if (!empty($_POST)){
			if(isset($_POST['checkIn'])){
		$data['user_id']=$user_id;
		$data['checkin']=date('Y-m-d H:i:s');
		$data['date']=date('Y-m-d');
		$data['state']=1;


		$timeTableobj=new membersModel();
		$timeTableobj->saveUserTime($data);
			}elseif($_POST['checkOut']){
                             $data['checkout']=date('Y-m-d H:i:s');
				$timeTableobj=new membersModel();
		$timeTableobj->checkout(1,$data['checkout']);
			}
		}
		$this->render('members');
	}

	function checkinoutAction(){

	}

}

