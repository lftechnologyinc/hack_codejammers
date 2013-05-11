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






  }

