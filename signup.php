<?php include('conn.php') ?>
<?php
// session_start();
include('include/db_connect.php');
if (isset($_POST['btnSubmit'])) {

    // move_uploaded_file($file_tmp, "upload/" . $file_name);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqlc = "select * from alumnilogin where email='" . $email . "' limit 1";
    $result = mysqli_query($conn, $sqlc);
    if ($result) {
        $row = mysqli_num_rows($result);
        if (!$row) {
                $sql = "insert into alumnisignup(name,email,password) Values ('$name','$email','$password')";
                $result = mysqli_query($conn, $sql);
                $sql1 = "insert into alumnilogin(email,pass) Values('" . $email . "','" . $password . "')";
                $result1 = mysqli_query($conn, $sql1);
                $sql2 = "insert into Signup(Username,Email,Password,pos) Values('$name','" . $email . "','" . $password . "','Alumni')";
                $result2= mysqli_query($con, $sql2);
                
                header("Location:login.php");
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
             <strong>Hey !</strong>  Alumni You are already registered
         </div>';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signup</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="icon" type="image/x-icon" href="./images/Page_Logo.png">
</head>

<body>
    <img src="./images/147.jpg" alt="">
    <div class="form">
        <h2>WELCOME!!! Alumni</h2>
        <form enctype="multipart/form-data" method="post">
            <input type="text" name="name" placeholder="Enter name " required>
            <input type="email" name="email" placeholder="Enter Email " required>
            <input type="password" id="myInput" name="password" placeholder="Enter Password " required>
            <input type="checkbox" onclick="myFunction()">
            <h5> Show Password</h5>
            <button type="submit" class="btnn" name="btnSubmit">Signup</button>
        </form>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>