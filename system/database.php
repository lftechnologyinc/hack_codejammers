<?php
class database
{
	public static function dbConnect()
	{
		try {
			mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		} catch (Exception $exc) {
			$msg = $exc->getTraceAsString();
			displayErrorMsg($msg, true);
		}

		try {
			mysql_select_db(DB_NAME);
		} catch (Exception $exc) {
			$msg = $exc->getTraceAsString();
			displayErrorMsg($msg, true);
		}
	}

}