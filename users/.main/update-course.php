<?php
     require_once('../.config/connect.php');
     session_start();
     if(!isset($_SESSION['id'])){
      echo "<script type='text/javascript'> document.location = '../Se connecter/Se connecter.php'; </script>";
     }else{
     $cpp=0;
     $id = $_GET['id'];
     $message = "";
     
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
          $title = $db->real_escape_string($_POST['title']); 
          $branche = $db->real_escape_string($_POST['branche']);
          $semester = $db->real_escape_string($_POST['semester']);  
          $description = $db->real_escape_string($_POST['description']);  
          $type = $db->real_escape_string($_POST['type']); 
          $coursepath = $db->real_escape_string('./courses/'.basename($_FILES['coursepath']['name']));
          
          if(empty($title) or empty($branche) or empty($semester) or empty($type) or empty($coursepath)){
              $cpp++;
              $message = "Please fill the missing informations";
          }
        
          if($cpp == 0){
                     
               if(move_uploaded_file($_FILES['coursepath']['tmp_name'], $coursepath)){

                    $query = "UPDATE course SET _TITLE=?,_BRANCHE=?,_SEMESTER=?,_TYPE=?,_DESCRIPTION=?,_COURSE_PATH=? WHERE ID=$id";

                    //prepare the statment
                    $stmt = $db->prepare($query);
                    $stmt->bind_param("ssssss",$title,$branche,$semester,$type,$description,$coursepath);
                                 
                   if( $stmt->execute()){
                       $_SESSION['message'] = "COURSE UPDATED !" ;
                       echo "<script type='text/javascript'> document.location = 'Home.php'; </script>";
   
                   }else{
                       echo "ENABLE TO UPDATE COURSE";
                   }
               }else{
                   echo "ENABLE TO UPLOAD FILE";
               }
          }else{
              echo "Oooops something went wrong";
           }
      }
    }
?>




<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="./Styling/update-course.css">
  </head>
  <body>
      <div class="title">
          <h1>UPDATE YOUR COURSE</h1>
      </div>
    <form
      action="update-course.php?id=<?php echo $id ?>"
      method="POST"
      enctype="multipart/form-data"
    >
       <p><?php  echo $message; ?></p>
      <input type="text" name="title" required placeholder="Entrez Le titre du cour"/>
      <select name="branche" id="ESTO">
        <option value="DAI">DAI</option>
        <option value="ASR">ASR</option>
        <option value="TEC">TEC</option>
        <option value="GBA">GBA</option>
      </select>
      <select name="semester" id="sem">
        <option value="S1">S1</option>
        <option value="S2">S2</option>
        <option value="S3">S3</option>
        <option value="S4">S4</option>
      </select>
     <select name="type" id="kind">
        <option value="media">video/audio</option>
        <option value="document">document</option>
        <option value="autre">autre</option>
      </select>
      <textarea name="description" id="" cols="30" rows="10" placeholder="Entrez une discription"></textarea>
      <input type="hidden" name="MAX_FILE_SIZE" value="512000">
      <input type="file" name="coursepath" required />
      <input type="submit" name="sendInfo" value="sendInfo" required />
    </form>
  </body>
</html>