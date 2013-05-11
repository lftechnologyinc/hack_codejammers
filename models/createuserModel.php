<?php

  class createuserModel extends model
  {

	  function __construct()
	  {
		  parent::__construct();
	  }

	  public function addUser($post)
	  {


		  unset($post['submit']);
		  unset($post['rePassword']);



		  $result = " INSERT INTO users (fullname, email, address, phone_no,username, password, employee_id, created_date, login_time, user_group_id)
		  VALUES ( '" . $post['fullname'] . "', '" . $post['email'] . "', '" . $post['address'] . "', '" . $post['phone_no'] . "', '" . $post['username'] . "', '" . md5($post['password']) . "', '" . $post['employee_id'] . "', '".date('Y-m-d H:i:s')."', '', '2')";


		  return mysql_query($result);
	  }

  }

