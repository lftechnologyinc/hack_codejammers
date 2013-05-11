<?php

  class membersModel extends model
  {
      const NUM_ROWS = 'num_rows';

      function __construct()
      {
          parent::__construct();
      }

      public function saveUserTime($data){

		  $sql = 'insert into user_time_table  (user_id,checkin,checkout,date,state) values ('.$data["user_id"].','.$data["checkin"].','.$data["checkout"].','.$data["date"].','.$data["state"].');';

$result = mysql_query($sql);

          if ($result) {
              return mysql_insert_id();
          } else {
              return false;
          }




	  }


  }

