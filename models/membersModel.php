<?php

  class membersModel extends model
  {
      const NUM_ROWS = 'num_rows';

      function __construct()
      {
          parent::__construct();
      }

      public function saveUserTime($data){

		 $result =  $this->save('user_time_table', $data);

          if ($result) {
              return mysql_insert_id();
          } else {
              return false;
          }
	  }
  public function checkout($timeTableId,$checkOut){
$sql="UPDATE user_time_table SET checkout = '$checkOut' , state=0 where id= '$timeTableId'";

 $result = mysql_query($sql);

          if ($result) {
              return mysql_insert_id();
          } else {
              return false;
          }
  }

  public function getUserTime($user_id){
	$sql="SELECT *
    FROM user_time_table
    WHERE user_id = '$user_id'
    ORDER BY id DESC LIMIT 1";
		$result = mysql_query($sql);
	if ($result) {
			while ($row = mysql_fetch_assoc($result)) {
				$return[] = $row;
			}
		}
		return $return;
  }

  public function updateState($timeTableId,$state){

	  $sql="UPDATE user_time_table SET state='$state' where id= '$timeTableId'";

 $result = mysql_query($sql);

          if ($result) {
              return mysql_insert_id();
          } else {
              return false;
          }
  }




  }

