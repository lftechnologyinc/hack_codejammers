<?php

  class happeningsController extends controller
  {

      function __construct()
      {
          parent::__construct();
      }

      function indexAction()
      {
          $OptionObj = new optionsModel();
          $ArticleModel = new articleModel();
          $this->view->articles = $ArticleModel->getArticleList('type="product"', 'publish_date DESC', $OptionObj->getOption('product_limit'));

          $this->setlayout('happenings');
          $this->render('happenings');
      }

      function descriptionAction()
      {
          $id = $_GET['id'];
          if (!is_numeric($id)) {
              redirect('index.php?controller=happenings&action=index');
          }

          $ArticleModel = new articleModel();

          $this->view->data = $ArticleModel->getArticle($id);
          $this->setlayout('happenings');
          $this->render('detail');
      }

  }

