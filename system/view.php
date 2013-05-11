<?php
 class view
{

	public $view;
	public $layout = false;

	public function setView($view)
	{
		$this->view = $view;
	}

	public function getContent()
	{
		if ($this->view) {
			if (file_exists('views/' . $this->view . '.php')) {
				include 'views/' . $this->view . '.php';
			} else {
				$msg = 'views/' . $this->view . '.php not found!';
				displayErrorMsg($msg, true);
			}
		} else {
			echo 'View not defined';
		}
	}

	public function getPartialLayout($layout = '')
	{
		if ($layout && (file_exists('layout/' . $layout . '.php'))) {
			include 'layout/' . $layout . '.php';
		} else {
			displayErrorMsg("View file layout/$layout.php not found !");
		}
	}

	public function getPartialView($view = '')
	{
		if ($view && (file_exists('views/' . $view . '.php'))) {
			include 'views/' . $view . '.php';
		} else {
			displayErrorMsg("View file views/$view.php not found !");
		}
	}

	public function renderLayout()
	{
		if ($this->layout) {
			if (file_exists('layout/' . $this->layout . '.php')) {
				include 'layout/' . $this->layout . '.php';
			} else {
				$msg = 'layout/' . $this->layout . '.php not found!';
				displayErrorMsg($msg, true);
			}
		} else {
			include 'layout/index.php';
		}
	}

}