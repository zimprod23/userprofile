<?php
     session_start();
     $_SESSION = array();
     setcookie(session_name(), '', time()-1);
     session_destroy();
     echo "<script type='text/javascript'> document.location = '../Se connecter/Se connecter.php'; </script>";
?>