<?php

  define('DB_USER', 'root');
  define('DB_HOST', 'localhost');
  define('DB_NAME', 'PFE');
  define('DB_PASS', '');

  $db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die('Could not connect '.mysqli_connect_error());

?>