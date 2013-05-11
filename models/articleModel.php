<?php

  class articleModel extends model
  {

	  public function __construct()
	  {
		  parent::__construct();
	  }

	  public function uploadImage($filename = '')
	  {
		  if ($_FILES["file"]["error"] > 0) {
			  notification::setMessage('Errors : ' . $_FILES["file"]["error"]);
			  redirect('index.php?controller=admin&action=index');
		  }

		  // check extension
		  if (!preg_match('/image/', $_FILES['file']['type'])) {
			  notification::setMessage('Article could not be saved!! Invalid file type : ' . $_FILES['file']['type']);
			  redirect('index.php?controller=admin&action=index');
		  }

		  //preprare new file name
		  if (!$filename) {
			  $array = explode('.', $_FILES["file"]["name"]);
			  $extension = end($array);
			  $newfilename = uniqid() . '.' . $extension;
		  } else {
			  $newfilename = $filename;
		  }

		  if (!move_uploaded_file($_FILES["file"]["tmp_name"], "userdata/images/" . $newfilename)) {
			  notification::setMessage('File upload failed!');
			  redirect('index.php?controller=admin&action=index');
		  }

		  return $newfilename;
	  }

	  public function deleteArticle($id)
	  {
		  $query = "DELETE FROM article WHERE id =$id";
		  return mysql_query($query);
	  }

	  public function getArticle($id)
	  {
		  $query = "Select * from article where id=" . $id;

		  $result = mysql_query($query);

		  return mysql_fetch_assoc($result);
	  }

	  public function getArticleList($where = '', $order = '', $limit = 20)
	  {
		  $query = "Select *, MONTHNAME(publish_date) as month, DAYOFMONTH(publish_date) as day from article";

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
		  if ($result) {
			  while ($row = mysql_fetch_assoc($result)) {
				  $rows[] = $row;
			  }
		  }


		  return $rows;
	  }

	  public function saveArticle($data)
	  {
		  if (isset($data['id']) && ($data['id'])) {
			  $filename = $data['filename'];

			  if (isset($_FILES['file']['name']) && ($_FILES['file']['name'])) {
				  $filename = $this->uploadImage($filename);
			  }

			  if (!isset($data['publish_date']) || (!$data['publish_date'])) {
				  $data['publish_date'] = date('Y-m-d H:i:s');
			  }

			  $query = "UPDATE article SET
						heading = '" . $data['heading'] . "',
						introduction='" . $data['introduction'] . "',
						description = '" . $data['description'] . "',
						image = '$filename',
						publish_date='" . $data['publish_date'] . "',
						type = '" . $data['type'] . "'
					WHERE id =" . (int) $data['id'];

			  return mysql_query($query);
		  } else {
			  $filename = $this->uploadImage(false);

			  if (!isset($data['publish_date']) || (!$data['publish_date'])) {
				  $data['publish_date'] = date('Y-m-d H:i:s');
			  }

			  $query = "INSERT INTO article (heading,introduction, description, image, type, publish_date, created)
						VALUES ('" . $data['heading'] . "','" . $data['introduction'] . "', '" . $data['description'] . "', '" . $filename . "', '" . $data['type'] . "','" . $data['publish_date'] . "',CURRENT_TIMESTAMP)";
			  return mysql_query($query);
		  }
	  }

  }

