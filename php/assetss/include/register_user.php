

 <?php ob_start(); ?>

<?php session_start(); ?>



<?php include "config.php";  ?>
<?php include "function.php"; ?>
   




<?php
    if (isset($_POST['Register'])) {
        
   $fname =  $_POST['fname'];
   $lname =  $_POST['lname'];
   $sex =  $_POST['sex'];
   $phone =  $_POST['phone'];
   $email =  $_POST['email'];
   $username =  $_POST['username'];
   $Password =  $_POST['Password'];
   $confirm_Password =  $_POST['confirm_Password'];

if ($Password!==$confirm_Password) {
    $_SESSION["ErrorMessage"]="your password is not the same !!!";
      Redirect_to("../register.php");
}
$query = "INSERT INTO users (fname,lname,sex,phone,email,username,password)";
$query .="VALUES('$fname','$lname', '$sex','$phone','$email','$username','$password')";

$query_exe = mysqli_query($connection,$query);
if ($query_exe) {

      $_SESSION["SuccessMessage"]= "your are registered seccessfuly!!!";
      Redirect_to("../login.php");
    
}else{
     die(mysqli_error($connection));
}



    }
?>