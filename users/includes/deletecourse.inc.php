<?php

require_once('../.config/connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = mysqli_real_escape_string($db, $_GET['id']);
    $query = "DELETE FROM course WHERE ID = $id";
    if($db->query($query)){
        echo "DATA REMOVED";
    }else{
        echo "CANNOT REMOVE DATA";  
    }

}else{
    echo "CANNOT GET ANY DATA";
}


$db->close();

?>