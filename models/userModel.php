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

}

