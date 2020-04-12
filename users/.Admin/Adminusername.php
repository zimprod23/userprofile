<?php
//UPDATE ADMIN USERNAME
 require_once('../.config/connect.php');
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user =  mysqli_real_escape_string($db, $_POST['new_username']);
    $username = mysqli_real_escape_string($db, $_POST['curr_username']);
    $index = false;
    if(empty($user)){
        $index=!$index;
    }
    if($index == false){
        $query = "UPDATE superuser SET _USERNAME = '$user' WHERE PPR = '$username'";
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