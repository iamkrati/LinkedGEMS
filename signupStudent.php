<?php
require_once("config.php");
include('include/db_connect.php');
if(isset($_POST['signup']))
{
    extract($_POST);
    if(!isset($error))
    {
        $result= mysqli_query($dbc,"insert into users(name,email,password) values('$name','$email','$password')");
        $result1= mysqli_query($con,"insert into Signup(Username,Email,Password,pos) values('$name','$email','$password','Student')");
        
        if($result)
        {
            header("Location:loginstudent.php");
        }
        else
        {
            $error[]='Failed: Something went wrong';
            echo "cgh";
        }
    }


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SignUP</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="icon" type="image/x-icon" href="./images/Page_Logo.png">
</head>

<body>
    <img src="./images/147.jpg" alt="">
    <div class="form">
        <h2>WELCOME! Gem</h2>
        <!-- done div writebhere -->
        <form  enctype="multipart/form-data" method="post">
            <input type="text" name="name" placeholder="Enter name " required>
            <input type="email" name="email" placeholder="Enter Email " required>
            <input type="password" name="password" placeholder="Enter Password " required>
            <!-- <input type="password" name="cpassword" placeholder="Confirm Password " required> -->
            <!-- <div class="form-group">
                <h4 style="color:white">Upload File:</h4>
                <input type="file" class="form-control" id="uploadFile" name="uploadFile" >
                <br><span style="color:#f00;font-size:15px;"><b>Note:</b> Only JPG, PNG and JPEG images are allowed. Maximum -->
                    <!-- upload size is 50kb </span> -->
                <button type="submit" class="btnn" name="signup">Signup</button>
            </div>
            
        </form>
    </div>
</body>

</html>