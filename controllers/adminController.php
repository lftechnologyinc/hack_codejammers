<?php

class adminController extends controller
{

	function __construct()
	{
		parent::__construct();
		$this->setlayout('admin/dashboard');
		$this->view->page = 'Dashboard';
	}

	function setupAction()
	{
		database::dbConnect();

		$query = "CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";





		mysql_query($query);
	}

	private function isLogedIn()
	{
		$UserModel = new userModel();
		$UserModel->loginCheck();
	}

	function indexAction()
	{
		$this->isLogedIn();
		$this->view->page = 'Article Listing';
		$ArticleModel = new articleModel();
		$this->view->articles = $ArticleModel->getArticleList();
		$this->render('admin/index');
	}

	function saveAction()
	{
		$this->isLogedIn();
		$ArticleModel = new articleModel();

		if ($ArticleModel->saveArticle($_POST)) {
			$msg = 'Article saved successfully !';
			notification::setMessage($msg, 'success');
		} else {
			$msg = 'Article could not be saved !';
			notification::setMessage($msg);
		}

		redirect('index.php?controller=admin&action=index');
	}

	function addAction()
	{
		$this->isLogedIn();
		$this->view->page = 'Add Article';
		$this->render('admin/add');
	}

	function editAction()
	{
		$this->isLogedIn();
		$id = $_GET['id'];
		if (!is_numeric($id)) {
			redirect('index.php?controller=admin&action=index');
		}

		$ArticleModel = new articleModel();

		$data = $ArticleModel->getArticle($id);

		if ((!is_array($data)) || (count($data) <= 0)) {
			notification::setMessage('Article with ' . $id . ' not found!!');
			redirect('index.php?controller=admin&action=index');
		}
		$this->view->page = 'Edit Article';
		$this->view->data = $data;
		$this->render('admin/add');
	}

	function deleteAction()
	{
		$this->isLogedIn();
		$id = $_GET['id'];
		if (!is_numeric($id)) {
			redirect('index.php?controller=admin&action=index');
		}

		$ArticleModel = new articleModel();

		if ($ArticleModel->deleteArticle($id)) {
			$msg = 'Article deleated successfully !';
			notification::setMessage($msg, 'success');
		} else {
			$msg = 'Article could not be deleated !';
			notification::setMessage($msg);
		}

		$this->view->articles = $ArticleModel->getArticleList();
		$this->render('admin/index');
	}

	public function settingsAction()
	{

		$this->view->page = 'Settings';
		$OptionObj = new optionsModel();

		$this->view->product_limit = $OptionObj->getOption('product_limit');
		$this->view->new_product_limit = $OptionObj->getOption('new_product_limit');
		$this->view->event_limit = $OptionObj->getOption('event_limit');

		$this->render('admin/settings');
	}

	public function savesettingsAction()
	{
		$OptionObj = new optionsModel();

		$options = $_POST['options'];
		foreach ($options as $key => $value) {
			$result = $OptionObj->saveOption($key, $value);
		}

		notification::setMessage('Settings saved successfully !', 'success');

		redirect('index.php?controller=admin&action=settings');
	}

}

