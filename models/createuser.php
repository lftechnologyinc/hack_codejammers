<?php

  class createuserModel extends model
  {

	  public function __construct()
	  {
		  parent::__construct();
	  }

	  public function addNewUser($post)
	  {

		$dateNow = date("Y-m-d");

		  $query = "INSERT INTO `users` (
					`fullname` ,
					`email` ,
					`address` ,
					`phone_no` ,
					`username` ,
					`password` ,
					`employee_id` ,
					`created_date` ,
					`login_time` ,
					`user_group_id`
					)
			VALUES (
					'$post[fullName]',
					'$post[email]',
					'$post[address]',
					'$post[phone]',
					'$post[userName]',
					'$post[password]',
					'$post[employeeId]',
					'$dateNow',
					'2',
					)";

		  return mysql_query($query);
	  }

  }

