<?php
require_once("config.php");
if(isset($_POST['sublogin']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="select * from users where(email='$email')";
    $res=mysqli_query($dbc,$query);
    $numrows=mysqli_num_rows($res);
    if($numrows==1)
    {
        $row = mysqli_fetch_assoc($res);
        if(($password==$row['password']))
        {
            $_SESSION["login_sess"]="1";
            $_SESSION["login_email"]=$row['email'];
            header("location:Main_Student.php");
        }
        else{
            header("location:loginstudent.php");
        }
    }
    else{
        header("location:loginstudent.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="./images/Page_Logo.png">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <img src="./images/146.jpg" alt="">
    <div class="form">
        <h2>WELCOME! Student</h2>
        <br><br>
        <form method="post">
            <label>University Email</label>
            <input type="email" name="email" placeholder="Enter email" required>
            <br><br>
            <label>Enter Password</label>
            <input type="password" name="password" placeholder="Enter Password Here" required>
            <button class="btnn" type="submit" name="sublogin">Login</button>
        </form>
        <p class="link">Don't have an account<br>
            <a href="signupStudent.php">Sign up </a> here</a>
        </p>
    </div>
</body>

</html>