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

		  $result = $this->save('users', $post);
		  r($result);die;
		  return $result;
	  }

  }

