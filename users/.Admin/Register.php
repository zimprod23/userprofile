<?php
     //ADDING USERS
     require_once('../.config/connect.php');
     session_start();
     if(!isset($_SESSION['Admin'])){
      echo "<script type='text/javascript'> document.location = '../Se connecter/Se connecter.php'; </script>";
     }else{
     $cpp=0;
     $message = "";
     
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $name = $db->real_escape_string($_POST['name']); 
      $fname = $db->real_escape_string($_POST['fname']);
      $email = $db->real_escape_string($_POST['email']);  
      $username = $db->real_escape_string($_POST['username']); 
      $password_1 = $db->real_escape_string($_POST['password_1']);
      $password_2 = $db->real_escape_string($_POST['password_2']);
      $picpath = $db->real_escape_string('../.main/pictures/'.basename($_FILES['picpath']['name']));
      
      if(empty($name) or empty($fname) or empty($email) or empty($username) or empty($password_1)){
          $cpp++;
      }
      if($password_1 != $password_2){
          $cpp++;
      }
      

      if($cpp == 0){
             //checking file type
       $password = md5($password_1);
       
       if(preg_match("!image!", $_FILES['picpath']['type'])){
           //Copy image to directory
           if(move_uploaded_file($_FILES['picpath']['tmp_name'], $picpath)){
               $_SESSION['username'] = $username;
               $_SESSION['picpath'] = $picpath;

               $query = " INSERT INTO user(_NAME,_FNAME,_USERNAME,_EMAIL,_PASSWORD,_PIC_PATH) values ('$name', '$fname', '$username', '$email', '$password', '$picpath')";

               if($db->query($query) === true){
                   $_SESSION['message'] = "USER SUCCEEFJN ADDED" ;
                   echo "<script type='text/javascript'> document.location = 'AdminProfile.php'; </script>";

               }else{
                   $message = "Enable to add user";
               }
           }else{
               $message = "Enable to upload file";
           }

       }    
      }else{
          $message = "The password did not match or miss data";
       }
      
      }else{
       // echo "Ooops something went wrong";
      }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="./css/Adduser.css">
  </head>
  <body>
  <div class="title">
          <h1>ADD USER</h1>
      </div>
      
    <form
      action="Register.php"
      method="POST"
      enctype="multipart/form-data"
    >
       <p class="failed"><?php  echo $message; ?></p>
      <input type="text" name="name" required placeholder="ENTER NAME"/>
      <input type="text" name="fname" required placeholder="ENTER FAMILY NAME"/>
      <input type="email" name="email" required placeholder="ENTER EMAIL"/>
      <input type="text" name="username" required placeholder="ENTER USERNAME"/>
      <input type="password" name="password_1" required placeholder="ENTER PASSWORD"/>
      <input type="password" name="password_2" required placeholder="REPEATE PASSWORD"/>
      <textarea name="description" id="" cols="30" rows="10" placeholder="Entrez une discription"></textarea>
      <input type="hidden" name="MAX_FILE_SIZE" value="512000">
      <input type="file" name="picpath" required />
      <input type="submit" name="sendInfo" value="sendInfo" required />
    </form>
  </body>
</html>
<?php

$db->close();

?>