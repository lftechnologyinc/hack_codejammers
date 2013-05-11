<?php

class acl
{

	private function hasPrivilage($userAcessLevel = 'guest')
	{

		/**
		 *  Prepare allowed controller list
		 */
		$allowedList = array();

		switch ($userAcessLevel) {
			case 'admin':
				$adminAllowedList = array('admin');
				$allowedList = array_merge($allowedList, $adminAllowedList);
			case 'registered':
				$registeredAllowedList = array('index');
				$allowedList = array_merge($allowedList, $registeredAllowedList);
			default :
				$defaultAllowedList = array('error', 'index', 'user','members');
				$allowedList = array_merge($allowedList, $defaultAllowedList);
				break;
		}

		/**
		 * check if requested controller is on allowed list or not
		 */
		$controller = (isset($_REQUEST['controller'])) ? $_REQUEST['controller'] : DEFAULT_CONTROLLER;

		if (in_array($controller, $allowedList)) {
			return true;
		}

		return false;
	}

	public function isAllowed()
	{
		$user = session::get('user');

		$user_access_level = isset($user['access_level']) ? $user['access_level'] : '';

		$has_privilage = $this->hasPrivilage($user_access_level);

		if (!$has_privilage) {
			redirect('index.php?controller=error&action=noprivilege');
		}
	}

}