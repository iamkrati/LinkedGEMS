

 <?php ob_start(); ?>

<?php session_start(); ?>



<?php include "config.php";  ?>
<?php include "function.php"; ?>
   




<?php
    if (isset($_POST['login'])) {
        

   $username =  $_POST['username'];
   $Password =  $_POST['Password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password '";
$query_exe = mysqli_query($connection,$query);
$query_count = mysqli_num_rows($query_exe);


if ($query_count==1) {
    
while ($row = mysqli_fetch_assoc($query_exe)) {

   $id =  $row['id'];
   $fname =  $row['fname'];
   $lname =  $row['lname'];
   $sex =  $row['sex'];
   $phone =  $row['phone'];
   $email =  $row['email'];
   $username =  $row['username'];
   $Password =  $row['Password'];

   $_SESSION['id']=$id;
   $_SESSION['fname']=$fname;
   $_SESSION['lname']= $lname;
   $_SESSION['sex']= $sex;
   $_SESSION['phone']= $phone;
   $_SESSION ['email']=$email;
   $_SESSION['username']=$username;
   $_SESSION['Password']=$Password;

}
Redirect_to("../index.php");

}else{

     $_SESSION["ErrorMessage"]="  not valid account !!!";
      Redirect_to("../login.php");

}


    }
?>