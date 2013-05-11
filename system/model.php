<?php

class model
{

	function __construct()
	{
		database::dbConnect();
	}

	protected function _getFiledList($table)
	{
		$where = "";
		$return = array();

		$result = mysql_query("SHOW COLUMNS FROM `$table` WHERE `Key`!='PRI' $where");

		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$return[] = $row;
			}
		}
		return $return;
	}

	/**
	 * copied from a fhf import..project
	 * @param type $table
	 * @param type $data
	 */
	public function save($table, $data)
	{
		$table = trim($table);
		/**
		 * Get all the columns of the table
		 */
		$fields = $this->_getFiledList($table);

		/**
		 * Now map the values with the database table columns
		 */
		$d = array();
		foreach ($fields as $field) {
			if (!isset($data[$field['Field']]) || empty($data[$field['Field']])) {
				if ($field['Null'] != 'YES') {
					$default = "";
					if (strpos("double", $field['Type']) !== false || strpos("int", $field['Type']) !== false || strpos("float", $field['Type']) !== false || strpos("tinyint", $field['Type']) !== false) {
						$default = 0;
					}
					$d[] = "`" . $field['Field'] . "`='$default'";
				}
			} else {
				$value = $data[$field['Field']];
				$d[] = "`" . $field['Field'] . "`='$value'";
			}
		}

		/**
		 * Prepare the query to be executed
		 */
		$sql = "INSERT INTO `$table` SET " . implode(",\n", $d);

		return mysql_query($sql);
	}

	public function update($table, $data, $where)
	{
		$table = trim($table);

		/**
		 * Return false if
		 */
		if (empty($where))
			return false;

		/**
		 * Prepare the query to be executed
		 */
		$sql = "UPDATE `$table` SET " . implode(",\n", $data) . " WHERE $where";

		return mysql_query($sql);
	}

}