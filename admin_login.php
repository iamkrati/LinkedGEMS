<?php include('conn.php') ?>
<?php
session_start();
$_SESSION["status2"]=false;
//  $_SESSION['userLogin']='';
if (isset($_POST['submit'])) {
    $email = $_POST['a_email'];
    $p = $_POST['password'];
    $sql = "select * from adminlogin where emailid='".$email."' AND pass='" .$p. "'
    limit 1";
   
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_num_rows($result);
        if ($row) {
            $crow=mysqli_fetch_assoc($result);
            $_SESSION["a_name"] = $crow["name"];
            $_SESSION["status2"] = true;
            header("Location: admin.php");
            // exit();
        } else {
    echo '<div class="alert alert-danger" role="alert">
        User Not Found <strong> Try Again <strong>
     </div>';
        }
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
        <h2>WELCOME! Admin</h2>
        <br><br>
        <form method="post">
            <label>Enter your name</label>
            <input type="email" name="a_email" placeholder="Enter Your Email Id" required>
            <br><br>
            <label>Enter Password</label>
            <input type="password" name="password" placeholder="Enter Password Here" required>
            <button class="btnn" type="submit" name="submit">Login</button>
        </form>
    </div>
</body>

</html>