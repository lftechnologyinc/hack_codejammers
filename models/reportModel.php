<?php

class reportModel extends model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getReportById($id)
	{
		$sql = "SELECT * FROM user_time_table WHERE user_id = $id";
		$result = mysql_query($sql);

		$rows = array();
		if ($result) {
			while ($row = mysql_fetch_assoc($result)) {
				$rows[] = $row;
			}
		}

		return $rows;
	}

}

