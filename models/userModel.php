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
		if ($username === "admin" && $password === "admin") {
			$user = array('username' => $username, 'access_level' =>'admin', 'user_id' => 1);
			session::set('user', $user);
			notification::setMessage('Well Come ! Back ' . ucfirst($username), 'success');
			redirect('index.php?controller=admin&action=index');
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
	    
	    if(!$where){
	    $where = 'ut.date ='.date('Y-m-d');
	    }
	    else{
		$where = 'ut.date between "'.session::get('from_date').'" and "'.session::get('to_date').'"';
	    }
	    
	    $query = "Select u.* from users as u inner join user_time_table as ut on u.id=ut.user_id";

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

}

