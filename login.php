<?php include('conn.php') ?>
<?php
session_start();
$_SESSION["status"]=false;
// $_SESSION['user_name']="";
// $_SESSION['session']="";
//  $_SESSION['userLogin']='';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "select * from alumnilogin where email='" . $email . "' AND pass= '" . $password . "'
    limit 1";
    $sql1 = "select * from alumnisignup where email='" . $email . "' AND password= '" . $password . "'
    limit 1";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    if ($result) {
        $row = mysqli_num_rows($result);
        if ($row) {
            $crow=mysqli_fetch_assoc($result1);
            // $row = mysqli_fetch_assoc($result)
            $_SESSION['name']=$crow["name"];
            $_SESSION['Roll']=$crow["UnivRN"];
            $_SESSION['ses']=$crow["session"];
            $_SESSION['email']=$crow["email"];
            $_SESSION['jobposition']=$crow["jobposition"];
            $_SESSION['jobrole']=$crow["jobrole"];
            $_SESSION['branch']=$crow["branch"];
            $_SESSION['uploadFile'] = $crow["User"];
            $_SESSION["ts"]=$crow["ts"];
            $_SESSION["status"]=true;
            header("Location: admin_profile.php?loginsuccess");
            exit();
        } else {
    echo '<div class="alert alert-danger" role="alert">
        User Not Found Go to <strong>Sign Up <strong>
     </div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/x-icon" href="./images/Page_Logo.png">

</head>

<body>
    <img src="./images/146.jpg" alt="">
    <div class="form">
        <h2>WELCOME! Alumni</h2>
        <br><br>
        <form method="post">
            <label>Enter Email</label>
            <input type="email" name="email" placeholder="Enter Email Here" required>
            <br><br>
            <label>Enter Password</label>
            <input type="password" name="password" placeholder="Enter Password Here" required>
            <button class="btnn" type="submit" name="submit">Login</button>
        </form>
        <p class="link">Don't have an account<br>
            <a href="signup.php">Sign up </a> here</a>
        </p>
    </div>
</body>

</html>