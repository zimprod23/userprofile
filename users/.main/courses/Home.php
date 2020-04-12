<?php
     require_once('../.config/connect.php');
     session_start();
 
     if(!isset($_SESSION['username'])){
      echo "<script type='text/javascript'> document.location = '../Se connecter/Se connecter.php'; </script>";
     }

     $username = $_SESSION['username'];
     //Loading data from database
     $query = "SELECT * FROM user WHERE _USERNAME='$username'";

     $response = mysqli_query($db, $query);
     $row = mysqli_fetch_object($response);
     $image = $row->_PIC_PATH;
     $deb = 17;
     $length = strlen($image)-$deb;
     $image = substr($image,$deb,$length);
?>

<html>
     <head>
          <meta charset="utf-8">
          <title>Laboratoire Matsi</title>
          <style>
               @import url("Styling/profile.css");
          </style>
     </head>
 
     <body>
           <header>
                <div class="Desc">
                     <div class="Pic-container">
                     <img src="./pictures/<?= $image ?>" alt="nothing found">
                     </div>
                     <div class="Name-container">
                      <?= $_SESSION['username'] ?>
                     </div>
                </div>
           </header>       
           <div><a href="../includes/logout.inc.php">Deconnexion</a></div> 
     </body>

</html>
