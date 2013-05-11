<?php
class controller
  {

	  public function __construct()
	  {
		  $this->view = new view();
	  }

	  public function render($view)
	  {
		  $this->view->setView($view);
		  $this->view->renderLayout();
	  }

	  public function setlayout($layout)
	  {
		  $this->view->layout = $layout;
	  }

  }