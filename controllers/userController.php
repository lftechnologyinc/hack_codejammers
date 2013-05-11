<?php

class userController extends controller
{

	function __construct()
	{
		parent::__construct();
		$this->setlayout('admin/login');
	}

	function indexAction()
	{
		$this->setlayout('admin/login');
		$this->render('admin/login');
	}

	function logoutAction()
	{
		$UserModel = new userModel();
		$UserModel->logout();
	}

	function loginAction()
	{
		$this->render('admin/login');
	}

	function doLoginAction()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$UserModel = new userModel();
		$UserModel->doLogin($username, $password);
	}

}

