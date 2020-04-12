<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $massage = $_POST['massage'];

    $errorEmpty = false;
    $errorEmail = false;

    if(empty($name) || empty($email) || empty($massage)) {
        echo "<span class='from-error'> Fill in all fields!</span>";
        $errorEmpty = true; 
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<span class='from-error'> Write a valid e-mail address!</span>";
        $errorEmail = true; 
    }else{
        echo "<span class='form-success'> E-mall has been sent! </span>";
    }

}else{
    echo "There was an error!";
}


?>



<script> 
$("#mail-name, #mail-email, #mail-massage, #mail-gender").removeClass("input-error")


 var errorEmpty = "<?php echo $errorEmpty;?>";
 var errorEmail = "<?php echo $errorEmail;?>";

if(errorEmpty == true){
    $("#mail-name, #mail-email, #mail-massage").addClass("input-error");
}
if(errorEmail == true){
    $(" #mail-email").addClass("input-error");
}
if(errorEmpty == false && errorEmail==false){
    $("#mail-name, #mail-email, #mail-massage").val("") ;
}

</script>