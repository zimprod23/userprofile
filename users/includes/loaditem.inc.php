<?php
 require_once('../.config/connect.php');
 session_start();

 if(!isset($_SESSION['username'])){
  echo "<script type='text/javascript'> document.location = '../Se connecter/Se connecter.php'; </script>";
 }


 if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $word =  mysqli_real_escape_string($db, $_POST['search']);
      $PPR =  mysqli_real_escape_string($db, $_GET['id']);
      $cpp = 0;
      $message = "";
      $index = false;
      if(empty($word)){
          $cpp++;
          $message='<p id="failed">No Valid input<p>';
          $index = !$index;
      }
      if($cpp ==0){
          $sql = "SELECT * FROM course WHERE _TITLE LIKE '%$word%' AND PPR = $PPR";
          $response = mysqli_query($db, $sql);
          //$row1 = mysqli_fetch_object($response);
          if(mysqli_num_rows($response) >= 1){
              while($row = mysqli_fetch_object($response)){
              $coursepath = $row->_COURSE_PATH;
              $title = $row->_TITLE;
              $branche = $row->_BRANCHE;
              $description = $row->_DESCRIPTION;
              $type = $row->_TYPE;
              $semester = $row->_SEMESTER;
              $coursepath = $row->_COURSE_PATH;
              $date = $row->_RELEASE_DATE;
              $id = $row->ID;
              //file name
              $deb = 10;
              $length = strlen($coursepath)-$deb;
              $coursepath = substr($coursepath,$deb,$length); 
              //
              $link = '<a href="../includes/download.php?id='.$id.'">TELECHARGER</a>';
              echo '<div class="course-container">';
              echo '<p class="course">TITRE       : '.$title.'</p>';
              echo "<br>";
              echo '<p class="course">TYPE        : '.$type.'</p>';
              echo "<br>";
              echo '<p class="course">BRANCHE     : '.$branche.'</p>';
              echo "<br>";
              echo '<input type="hidden" value='.$id.' id="hiddenid">';
              echo '<p class="course">SEMESTRE    : '.$semester.'</p>';
              echo "<br>";
              echo '<p class="course">RELEASE DATE: '.$date.'</p>';
              echo "<br>";
              echo '<p class="course">DESCRIPTION : '.$description.'</p>';
              echo "<br>";
              echo '<p class="course">'.$link.'</a></p>';
              echo '<button class="rmv-button" onclick="bindid('.$id.')">delete</button>"';
              echo '<button class="update-button" onclick="getid('.$id.')">update</button>"';
              echo "</div>";
              echo "<br>";
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