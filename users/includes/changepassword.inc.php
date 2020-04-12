<?php
 require_once('../.config/connect.php');
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pass =  mysqli_real_escape_string($db, $_POST['new_password']);
    $username = mysqli_real_escape_string($db, $_POST['curr_username']);
    $index = false;
    if(empty($pass)){
        $index=!$index;
    }
    if($index == false){
        $pass=md5($pass);
        $query = "UPDATE user SET _PASSWORD = '$pass' WHERE PPR = '$username'";
        if($db->query($query)){
            echo '<p id="success">DATA UPDATED WITH SUCCESS</p>';
        }else{
            echo '<p id="failed">CANNOT UPDATE DATA </p>';
        }
    }else{
        echo '<p id="failed">INVALID INPUT TRY AGAIN</p>';
    }
    
 }else{
    echo '<p id="failed">OOOPS SOMTHING WENT WRONG</p>';
 }


 $db->close();
?>