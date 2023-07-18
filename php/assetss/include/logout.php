<?php
    include "db.php";?>
<?php
    include "function.php"; ?>
 

<?php session_start(); ?>


<?php
   $_SESSION['fname']=null;
   $_SESSION['lname']= null;
   $_SESSION['sex']= null;
   $_SESSION['phone']= null;
   $_SESSION ['email']=null;
   $_SESSION['username']=null;
   $_SESSION['Password']=null;


   Redirect_to("../index.php");
?>