<?php

  class homeController extends controller
  {

	  function __construct()
	  {
		  parent::__construct();
	  }

	  function indexAction()
	  {
		  $this->setlayout('home');
		  $this->render('blank');
	  }

  }

