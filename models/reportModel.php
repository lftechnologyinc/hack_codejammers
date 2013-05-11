<?php

class reportModel extends model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getReportById($id)
	{

		r($id);exit;
		$sql = "SELECT * FROM user_time_table WHERE id = $id";
		$result = mysql_query($sql);

		return mysql_fetch_assoc($result);

		//$return = array();

		//if ($result) {
			//while ($row = mysql_fetch_assoc($result)) {
				//$return[] = $row;
			//}
		//}
		//return $return;
	}

}

