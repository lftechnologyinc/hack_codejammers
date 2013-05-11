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

		  $user = session::get('user');
		  $user_id = $user['user_id'];
		  $timeTableobj = new membersModel();
		  $timeTable = $timeTableobj->getUserTime($user_id);
				  if (isset($timeTable[0]['state']) &&$timeTable[0]['state'] ==1) {
			  $this->view->checkIn = 1;
			  $this->view->CheckedInDate=$timeTable[0]['checkin'];
			  $this->view->work_from=$timeTable[0]['work_from'];
		  }
		  if (!empty($_POST)) {
			  if (isset($_POST['checkIn'])) {
				  //checking the ip
				  //getting the ip of office
				  $officeIp=$timeTableobj->getOfficeIp();
				  $currentIp=$timeTableobj->GetIP();
				  if($officeIp!=$currentIp)$data['work_from']=0;else $data['work_from']=1;
				  $data['user_id'] = $user_id;
				  $data['checkin'] = date('Y-m-d H:i:s');
				  $data['date'] = date('Y-m-d');
				  $data['state'] = 1;

				  if (isset($timeTable) && $timeTable[0]['date'] == date('Y-m-d')) {//do not add  the new row

					  $timeTableobj = new membersModel();
					  $timeTableobj->updateState($timeTable[0]['id'],1);
				  } else {
					  $timeTableobj = new membersModel();
					  $timeTableobj->saveUserTime($data);
				  }
				  header('Location: ' . $_SERVER['REQUEST_URI']);
			  } elseif ($_POST['checkOut']) {
				  $data['checkout'] = date('Y-m-d H:i:s');
				  $timeTableobj = new membersModel();
				  $timeTableobj->checkout($timeTable[0]['id'], $data['checkout']);
				  header('Location: ' . $_SERVER['REQUEST_URI']);
			  }
		  }

		  $this->render('members');
	  }

	  function checkinoutAction()
	  {

	  }

  }

