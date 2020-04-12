<?php
require_once('../.config/connect.php');
session_start();
?>


<!DOCTYPE html>
<html>

<head>
     <title>Espace etudiant</title>
     <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <style>
     
     @import url("./style/student.css");

     </style>
</head>

<body>
    <div class="container">
    
    <p>ESPACE ETUDIANT</p>
    <div class="search-form">

    <form method="post">
      <input type="text" name="search" id="search">
      <select name="type" id="type">
      <option value="all">All</option>
          <option value="document">document</option>
          <option value="presentation">presentation</option>
          <option value="zipped">*.zip/*.rar</option>
          <option value="autre">autre</option>
      </select>
      <input type="submit" value="Search">
    </form>

    </div>
    <!-- HERE WHERE THE ITEMS WILL DISPLAY-->
      <div class="load-course">
       
      </div>


    </div>
    <script src="./script/script.js"></script>
</body>

</html>



<?php

$db->close();

?>