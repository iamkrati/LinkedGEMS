<?php include('conn.php') ?>
<?php
// session_start();
if (isset($_POST['name'])) {
    $name=$_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $session=$_POST['session'];
    $branch=$_POST['branch'];
    $jobpos=$_POST['jobpos'];
    $jobrole=$_POST['jobrole'];

    $sql = "insert into alumnisignup Values ('".$name."','".$email."','".$password."','".$session."','".$branch."',
    '".$jobpos."','".$jobrole."')";

    $result = mysqli_query($conn, $sql);
      
    $sql1="insert into alumnilogin(email,pass) Values('".$email."','".$password."')";
    $result1 = mysqli_query($conn, $sql1);

    header("Location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signup</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="icon" type="image/x-icon" href="Page_Logo.png">
</head>

<body>
    <img src="147.jpg" alt="">
    <div class="form">
        <h2>WELCOME! Alumni</h2>
        <form method="post">
            <input type="text" name="name" placeholder="Enter name " required>
            <input type="email" name="email" placeholder="Enter Email " required>
            <input type="password" name="password" placeholder="Enter Password " required>
            <input type="text" name="session" placeholder="Enter session " class="bb" required>
            <input type="text" name="branch" placeholder="Enter branch " required>
            <input type="text" name="jobpos" placeholder="Enter your Company Name " required>
            <input type="text" name="jobrole" placeholder="Enter your job role " required>
            <button type="submit" class="btnn">Signup</button>
        </form>
    </div>
</body>

</html>