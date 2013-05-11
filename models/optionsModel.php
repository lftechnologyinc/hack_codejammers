<?php

  class optionsModel extends model
  {
      const NUM_ROWS = 'num_rows';

      function __construct()
      {
          parent::__construct();
      }

      /**
       * save options
       * @param type $key
       * @param type $value
       * @return boolean
       */
      public function saveOption($key, $value = '')
      {
          if (!$key) {
              return false;
          }

          $count = $this->getOption($key, self::NUM_ROWS);

          if($count > 0) {
              $sql = "UPDATE options SET option_value = '$value'  WHERE option_name='$key'";
          } else {
               $sql = "INSERT INTO
                            options (id, option_name , option_value)
                      VALUES ( NULL , '" . $key . "', '" . $value . "');";
          }

          $result = mysql_query($sql);

          if ($result) {
              return mysql_insert_id();
          } else {
              return false;
          }
      }

      public function getOption($key, $returnType = '')
      {
          $sql = "SELECT option_value FROM options WHERE option_name ='" . $key . "'";
          $result = mysql_query($sql);
          $row = mysql_fetch_assoc($result);

          if ($returnType == self::NUM_ROWS) {
              return mysql_num_rows($result);
          }

          if (isset($row['option_value'])) {
              return $row['option_value'];
          } else {
              return '';
          }
      }

  }

