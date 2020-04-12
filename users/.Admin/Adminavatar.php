<?php

require_once('../.config/connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$id = mysqli_real_escape_string($db, $_GET['id']);
$filename = mysqli_real_escape_string($db,basename($_FILES['file']['name']));


$location = "./AdminPics/".$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);


$deb = 9;
$length = strlen($location)-$deb;
$new_location = substr($location,$deb,$length);

$valid_extensions = array("jpg","jpeg","png");

if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo 0;
}else{

    $query = "UPDATE superuser SET _PIC_PATH = '$location' WHERE PPR = '$id'";
    if($db->query($query)){
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
      echo "YOUR AVATAR IS UPDATED";
   }else{
      echo "CANNOT UPDATE";
   }
}else{
    echo "CANNOT UPLOAD DATA";
}
}
}else{
    echo "CANNOT GET ANY RESPONSE";
}

?>