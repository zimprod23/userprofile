<?php
      require_once('../.config/connect.php');
      session_start();
      
      $error = ""; 

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    

        $password = md5($password);
        $query = "SELECT * FROM user WHERE _USERNAME='$username' AND _PASSWORD='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
           $row = mysqli_fetch_object($results);
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row->PPR;
            $_SESSION['message'] = "USER SUCCEEFJN ADDED" ;
            echo "<script type='text/javascript'> document.location = '../.main/Home.php'; </script>";
        }else{
            $error =  "Could not Find Such User";
        } 
    
}else{
    //echo "Ooops somthing went wrong";
}

?>


<!DOCTYPE html>
<html>
  <head lang="fr">
    <meta charset="utf-8" />
    <title>Laboratoires | Université Mohammed Premier Oujda</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap"
      rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../css/Preloader.css" />
    <link rel="shortcut icon" type="image/png" href="../img/logo-esto.ico" />
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
    <img class="wave" src="img/wave.png" />
    <div class="container">
      <div class="img">
        <img src="img/bg.svg" />
      </div>
      <div class="login-content">
        <form name="connexion" action="Se connecter.php" method="POST">
          <h3>
            <font class="text-cyan">
              USER
            </font>
            LOGIN
          </h3>
          <br />
          <p>
            <br />
            <small>
              Connectez-vous à votre compte
            </small>
          </p>
          <br /><br />
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5>Username</h5>
              <input type="text" class="input" required="" name="username" />
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h5>Mot de passe</h5>
              <input
                type="password"
                class="input"
                required=""
                name="password"
              />
            </div>
          </div>
          <strong style="color:red"><?= $error ?></strong>
          <a href="Mot de passe.php">Mot de passe oublié?</a>
          <a href="../.Admin/Admincnx.php">CONNECT AS ADMIN</a>
          <input
            type="submit"
            class="btn"
            value="Se connecter"
            name="Login-user"
          />
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
