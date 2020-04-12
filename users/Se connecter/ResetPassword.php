<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php
 
 require_once('../.config/connect.php');
 session_start();
 $_SESSION = array();
 setcookie(session_name(), '', time()-1);


$PPR = $_GET['id'];
$cpp = 0;
$Erreur = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $pass_1 = $db->real_escape_string($_POST['password_1']);
    $pass_2 = $db->real_escape_string($_POST['password_2']); 

    if(empty($pass_1) or empty($pass_2)){
        $cpp++;
        $Erreur="CANNOT RESET PASSWORD VERIFY YOUR INPUTS!";
    }
    if($pass_1 != $pass_2){
        $cpp++;
        $Erreur="CANNOT RESET PASSWORD VERIFY YOUR INPUTS!";
    }
    if($cpp == 0){ 
        $pass = md5($pass_1);

        $insertq = "UPDATE user SET _PASSWORD = '$pass' WHERE PPR=$PPR";

        if($db->query($insertq) === true){ 
            echo "<script type='text/javascript'> document.location = 'Se connecter.php'; </script>";
            exit;
        }else{
            $Erreur="CANNOT RESET PASSWORD VERIFY YOUR INPUTS!";
        }

    }
}

?>
<body style="background-color: #021578;" >
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card card-signin my-5">
					<div class="card-body">
						<h5 class="card-title text-center">Changer votre mot de passe</h5>
						<br>
						<form  class="form-signin" method="post" action="ResetPassword.php?id=<?php echo $PPR ?>">
							<div class="form-label-group">
								<label for="inputEmail">Nouveau mot de passe</label>
								<input type="password" id="inputEmail" name="password_1" class="form-control"required autofocus>
							</div>
							<br>
							<div class="form-label-group">
								<label for="inputPassword">Confirmer</label>
								<input type="password" id="inputPassword" name="password_2" class="form-control" required>
							</div>
							<br>
							<button class="btn btn-lg btn-primary btn-block text" type="submit" name="button">Confirmer</button>
							<hr class="my-4">

                            <span style="color: red;font-size: 13px;" id="erreur"><?php echo $Erreur; ?></span>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</body>
</html>

<?php

$db->close();
session_destroy();
?>