

 <?php ob_start(); ?>

<?php session_start(); ?>



<?php include "db.php";  ?>
<?php include "function.php"; ?>
   




<?php
    if (isset($_POST['create_post'])) {
        
   $title =  $_POST['title'];
   $content =  $_POST['content'];
   $category =  $_POST['category'];
   
$user_id= $_SESSION['id'];

$query = "insert into post (author_id,title,content,category)";
$query .="VALUES('$user_id','$title','$content','$category')";

$query_exe = mysqli_query($connection,$query);
if ($query_exe) {

      $_SESSION["SuccessMessage"]= "post created !!!";
      Redirect_to("../create_post.php");
    
}else{
     
      $_SESSION["ErrorMessage"]= "something wrong!!!";
      Redirect_to("../create_post.php");
}



    }
?>