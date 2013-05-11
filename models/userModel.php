<?php

class userModel extends model
{

	function __construct()
	{
		parent::__construct();
	}

	public function logout()
	{
		session::delete('user');
		session::flush();
		redirect('index.php?controller=user&action=login');
	}

	public function doLogin($username, $password)
	{	
	    
		$query = "Select user_group_id,id from users where username = '".$username. "' AND password = '".md5($password)."'";

		
		$result = mysql_query($query);

		$row = mysql_fetch_assoc($result);
			
		
	   
		if ($row) {
			$user = array('username' => $username, 'access_level' =>($row['user_group_id'] == 1)?'admin':'registered', 'user_id' => $row['id']);
			session::set('user', $user);
			notification::setMessage('Well Come ! Back ' . ucfirst($username), 'success');
			//redirect('index.php?controller=admin&action='.($row['user_group_id'] == 1)?'attendencelist':'index');
			if($row['user_group_id'] == 1){
			redirect('index.php?controller=admin&action=attendencelist');
			}
			elseif($row['user_group_id'] == 2){
			  redirect('index.php?controller=members&action=index');  
			}
		} else {
			notification::setMessage('Invalid username or password !');
			redirect('index.php?controller=user&action=login');
		}
	}

	public function loginCheck()
	{
		if (!session::check('user')) {
			redirect('index.php?controller=user&action=login');
		}
	}

	public function getUsers($where = '', $order = '', $limit = 20)
	{
		$query = "Select * from users";

		if ($where) {
			$query = $query . ' WHERE ' . $where;
		}

		if ($order) {
			$query = $query . ' ORDER BY ' . $order;
		}

		if ($limit) {
			$query = $query . ' LIMIT 0,' . $limit;
		}


		$result = mysql_query($query);

		$rows = array();
		while ($row = mysql_fetch_assoc($result)) {
			$rows[] = $row;
		}

		return $rows;
	}

	public function getAttendences($where = '', $order = 'u.fullname', $limit = 20)
	{   if(isset($_POST) && ($_POST['from_date'] || $_POST['to_date'])){
	    session::set('from_date', $_POST['from_date']);
	    session::set('to_date', $_POST['to_date']);
	    }

	    if(!session::get('from_date')){
	    $where = "ut.date ='".date('Y-m-d')."'";
	    }
	    else{
		$where = 'ut.date between "'.session::get('from_date').'" and "'.session::get('to_date').'"';
	    }

	    $query = "Select u.*,ut.checkin,ut.checkout,ut.date,ut.work_from from users as u inner join user_time_table as ut on u.id=ut.user_id";

		if ($where) {
			$query = $query . ' WHERE ' . $where;
		}

		if ($order) {
			$query = $query . ' ORDER BY ' . $order;
		}

		if ($limit) {
			$query = $query . ' LIMIT 0,' . $limit;
		}


		$result = mysql_query($query);

		$rows = array();
		while ($row = mysql_fetch_assoc($result)) {
			$rows[] = $row;
		}

		return $rows;
	}

	public function addUser($post)
	  {


		  unset($post['submit']);
		  unset($post['rePassword']);


		  $result = " INSERT INTO users (fullname, email, address, phone_no,username, password, employee_id, created_date, login_time,state, user_group_id)
		  VALUES ( '" . $post['fullname'] . "', '" . $post['email'] . "', '" . $post['address'] . "', '" . $post['phone_no'] . "', '" . $post['username'] . "', '" . md5($post['password']) . "', '" . $post['employee_id'] . "', '', '','1', '2')";

		  return mysql_query($result);
	  }
}

