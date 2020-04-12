<?php

require_once('../.config/connect.php');
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $valid = true;
    $mail = $_POST['email'];

    $mail = htmlentities(strtolower(trim($mail)));
    if(empty($mail)){
        $valid = false;
    }
    if($valid){
        $query = "SELECT * FROM user WHERE _EMAIL='$mail'";
        $response = mysqli_query($db, $query);
        $row = mysqli_fetch_object($response);

        if(mysqli_num_rows($response) == 1){

            $PPR=$row->PPR;  
            //generer un nouveau mot de pass
            //$new_pass = rand();
            //encrypte password
            //$new_pass_md5 = md5($new_pass);

            $objet = 'New Password';
            $to = $row->_EMAIL;

            //header creation
            $header = "From: NOM_DE_LA_PERSONNE <no-reply@test.com> \n";
            $header .= "Reply-To: ".$to."\n";
            $header .= "MIME-version: 1.0\n";
            $header .= "Content-type: text/html; charset=utf-8\n";
            $header .= "Content-Transfer-Encoding: 8bit";

            $link = 'http://localhost:8080/Training/Se%20connecter/ResetPassword.php?id='.$PPR;
            //Message Content
            $content = "<html>".
            "<body>".
            "<p style='text-align: center; font-size: 18px'><b>Bonjour Mr, Mme".$row->_NAME."</b>,</p><br/>".
            "<p style='text-align: justify'><i><b>RESET YOUR PASSWORD : </b></i>".$link."</p><br/>".
            "</body>".
            "</body>".
            "</html>";

            //Sending mail
            mail($to,$objet,$content,$header);

  /*          $insertq = "UPDATE user SET _PASSWORD = '$new_pass_md5' WHERE _EMAIL='$mail'";

            if($db->query($insertq) === true){ 
                echo "<script type='text/javascript'> document.location = '../Se connecter/Se connecter.php'; </script>";
                exit;
            }
            
*/
        }

    }

}else{
    //echo "Ooops somthing went wrong";
}

?>





<!DOCTYPE html>
<html>
<head lang="fr">
  <meta charset="utf-8">
  <title>Laboratoires | Université Mohammed Premier Oujda</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/Preloader.css">
  <link rel="shortcut icon" type="image/png" href="../img/logo-esto.ico"/>
</style>
</head>
<body>
  <!-- Preloader -->
  <div id="loading">
    <div id="loading-center">
      <div id="loading-center-absolute">
        <div class="object" id="object_one"></div>
        <div class="object" id="object_two"></div>
        <div class="object" id="object_three"></div>
        <div class="object" id="object_four"></div>
      </div>
    </div>
  </div>
  <!--End off Preloader -->
  <img class="wave" src="img/wave.png">
  <div class="container">
    <div class="img">
     <img src="img/bg.svg">
   </div>
   <div class="login-content">
     <form name="Forgot_Pass" method="POST" action="Mot de passe.php">
      <h3>
        <font class="text-cyan">Récupération</font> 
        de Mot de passe
      </h3>
      <p>
        <small>
          <br>
          Nous vous enverrons des instructions par e-mail
        </small>
      </p>
      <br><br><br><br>
      <div class="input-div one">
        <div class="i">
          <i class="fas fa-user"></i>
        </div>
        <div class="div">
          <h5 class="e-mail">E-mail Adresse</h5>
          <input type="email" class="input" name = "email" required="">
        </div>
      </div>
      <br>
      <input type="submit" class="btn" value="Réinitialiser">
      <div class="Droit">&copy; 2020 UMP. Tous droits réservés</div>
    </form>
  </div>
</div>
<script type="text/javascript" src="js/main.js"></script>
<script src="../assets/js/vendor/jquery-1.11.2.min.js"></script>
<script src="../assets/js/vendor/bootstrap.min.js"></script>
<script src="../assets/js/plugins.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>

<?php
 $db->close();

?>