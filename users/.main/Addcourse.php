<?php
     require_once('../.config/connect.php');
     session_start();
     if(!isset($_SESSION['id'])){
      echo "<script type='text/javascript'> document.location = '../Se connecter/Se connecter.php'; </script>";
     }else{
     $cpp=0;
     $id = $_GET['id'];
     $name = $_GET['name'];
     $fname = $_GET['fname'];
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

                    $query = "INSERT INTO course(PPR,_PUB_NAME,_PUB_FNAME,_TITLE,_BRANCHE,_SEMESTER,_TYPE,_DESCRIPTION,_COURSE_PATH) values (?,?,?,?,?,?,?,?,?)";

                    //prepare the statment
                    $stmt = $db->prepare($query);
                    $stmt->bind_param("issssssss",$id,$name,$fname,$title,$branche,$semester,$type,$description,$coursepath);
                                 
                   if( $stmt->execute()){
                       $_SESSION['message'] = "Course SUCCEEFJN ADDED" ;
                       echo "<script type='text/javascript'> document.location = 'Home.php'; </script>";
   
                   }else{
                       $message = "Enable to add course";
                   }
               }else{
                   $message ="Enable to upload file";
               }
          }else{
              $message = "Oooops something went wrong";
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
          <h1>ADD YOUR COURSE</h1>
      </div>
    <form
      action="Addcourse.php?id=<?php echo $id ?>&name=<?php echo $name ?>&fname=<?php echo $fname ?>"
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
        <option value="presentation">presentation</option>
        <option value="document">document</option>
        <option value="zipped">fichier compressee</option>
        <option value="autre">autre</option>
      </select>
      <textarea name="description" id="" cols="30" rows="10" placeholder="Entrez une discription"></textarea>
      <input type="hidden" name="MAX_FILE_SIZE" value="512000">
      <input type="file" name="coursepath" required />
      <input type="submit" name="sendInfo" value="sendInfo" required />
    </form>
  </body>
</html>
<?php

$db->close();

?>