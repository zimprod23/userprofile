<?php
 require_once('../.config/connect.php');
 session_start();

 //STYLE DANS Admin.css

 if(!isset($_SESSION['Admin'])){
  echo "<script type='text/javascript'> document.location = '../Se connecter/Se connecter.php'; </script>";
 }


 if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $word =  mysqli_real_escape_string($db, $_POST['search']);
     // $PPR =  mysqli_real_escape_string($db, $_GET['id']);
      $cpp = 0;
      $message = "";
      $index = false;
      if(empty($word)){
          $cpp++;
          $message='<p id="failed">No Valid input<p>';
          $index = !$index;
      }
      if($cpp ==0){
          $sql = "SELECT * FROM user WHERE _USERNAME LIKE '%$word%'";
          $response = mysqli_query($db, $sql);
          if(mysqli_num_rows($response) >= 1){
              while($row = mysqli_fetch_object($response)){
              $name = $row->_NAME;
              $fname = $row->_FNAME;
              $email = $row->_EMAIL;
              $description = $row->_DESCRIPTION;
              $id = $row->PPR;
              $pic = $row->_PIC_PATH;

              echo '<div class="Self-pres">';
              echo '<div class = "Item">';
              echo '<div class="Picture">';
              echo '<img src="'.$pic.'">';
              echo '</div>';
              echo '<div class = "Desc">';
              echo '<p class="course">NAME        : '.$name.'</p>';
             // echo "<br>";
              echo '<p class="course">FAMILY NAME : '.$fname.'</p>';
             // echo "<br>";
              echo '<p class="course">EMAIL       : '.$email.'</p>';
             // echo "<br>";
              echo '<p class="course">DESCRIPTION : '.$description.'</p>';
              echo '<input type="hidden" value='.$id.' id="hiddenid">';
             // echo "<br>";
              echo '<button class="rmv-button" onclick="bindid('.$id.')">delete</button>"';
              echo '<button class="update-button" onclick="getid('.$id.')">update</button>"';
              echo '</div>';
              echo "</div>";
             // echo "<br>";
              }
          }else{
              $index = !$index;
              $message='<p id="failed">No Data Found<p>';
              echo $message;
          }
      }else{
        echo $message;
      }
}

 ?>

 <?php
  $db->close();
 ?>