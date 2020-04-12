<?php
     require_once('../.config/connect.php');
     session_start();
     if(!isset($_SESSION['Admin'])){
        echo "<script type='text/javascript'> document.location = 'Admincnx.php'; </script>";
        //echo "Ooops Cannot get any data";
     }
    
     $username = $_SESSION['user'];
     $id=$_SESSION['Admin'];
     //Loading data from database
     
     $query = "SELECT * FROM superuser WHERE PPR='$id'";
     $response = mysqli_query($db, $query);
     $row = mysqli_fetch_object($response);
     $id = $row->PPR;
     $name = $row->_NAME;
     $desc = $row->_DESCRIPTION;
     $fname = $row->_FNAME;  
     $username=$row->_USERNAME;     
     $image=$row->_PIC_PATH; 
?>
<!DOCTYPE html>
<html>
     <head>
          <meta charset="utf-8">
          <title>Laboratoire Matsi</title>
          <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
          <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
          <link rel="stylesheet" href="./css/Admin.css" >
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          </head>
 
     <body>
                        
           <div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="<?= $image ?>" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
                              <?= $username ?>
                              <input type="hidden" value="<?= $username ?>" id="hiddenusr">
                              <input type="hidden" value="<?= $id ?>" id="hiddenid">
					</div>
					<div class="profile-usertitle-job">
                              <?= $desc ?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm" id="Add-user"><a href="./Register.php">Add user</a></button>
                         <button type="button" class="btn btn-danger btn-sm" id="Log-out"><a href="../includes/logout.inc.php">Log out</a></button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<button id="overview">
							<i class="glyphicon glyphicon-home"></i>
							Overview </button>
						</li>
						<li>
							<button id="settings">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </button>
						</li>
						<li>
							<button id="courses">
							<i class="glyphicon glyphicon-ok"></i>
							User Infos </button>
                              </li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div> 
	  <div class="col-md-9">
           <div class="profile-content">
                       <!-- USER SETTINGS -->
                       <div id="username-cont">
                             
                        </div>
                        <div class="Addcourse">
                  
                         </div>
                         <hr>
              <!--    <div class="LoadItem">
                          <form action="../includes/loaditem.inc.php" method='POST'>
                           <input type="text" id="search">
                           <input type="submit" name="consult">
                          </form>  
                          <div class="ItemPlace"></div>
                   </div>   -->
                  <hr>

                   <div class="hidden-operation">

                   </div>


               </div>
		</div>
	</div>
</div>
          
<br>
<br>
<script src="./js/Admin.js"></script>
     </body>

</html>
<?php
   $db->close();
?>