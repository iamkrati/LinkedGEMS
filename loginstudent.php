<?php include('conn.php') ?>
<?php
session_start();
$_SESSION["status1"]=false;
//  $_SESSION['userLogin']='';
if (isset($_POST['submit'])) {
    $roll = $_POST['rollno'];
    $p = $_POST['password'];
    $sql = "select * from studentlogin where rollno='".$roll."' AND pass='" .$p. "'
    limit 1";
   
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_num_rows($result);
        if ($row) {
            // $crow=mysqli_fetch_assoc($result);
            $_SESSION["status1"] = true;
            header("Location: Student.php");
            exit();
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
    <link rel="icon" type="image/x-icon" href="Page_Logo.png">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <img src="146.jpg" alt="">
    <div class="form">
        <h2>WELCOME! Student</h2>
        <br><br>
        <form method="post">
            <label>University Roll No</label>
            <input type="number" name="rollno" placeholder="Enter University Roll No" required>
            <br><br>
            <label>Enter Password</label>
            <input type="password" name="password" placeholder="Enter Password Here" required>
            <button class="btnn" type="submit" name="submit">Login</button>
        </form>
    </div>
</body>

</html>