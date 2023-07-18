<?php
session_start();
if ($_SESSION["status2"] != true) {
    $_SESSION["status2"] = false;
    header("Location: admin_login.php");
    // die();
}
$host = "localhost";
$user = "root";
$password = "";
$db = "gla";
error_reporting(E_ERROR | E_PARSE);
$conn = mysqli_connect($host, $user, $password, $db);
// header("Location : error.php");
if ($conn) {
    $err = "t";
    // echo "Successfull";
    // exit();
} else {
    // include 'error.php';
    echo '<div class="alert alert-danger" role="alert">
      Error - found databse not connected
     </div>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
    </style>
    <link rel="icon" type="image/x-icon" href="./images/Page_Logo.png">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav hoo ms-auto">
                    <li class="nav-item">
                        <img style="width:40px; height: 50px;" src="./images/Stu_Avatar.png">
                        <span style="color: white;">
                            <?php echo "" . $_SESSION["a_name"] . "" ?>
                        </span>
                        <button><a class="nav-link  active" href="logout.php">Log Out</a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="bg-image">
        <div class="bg-content" data-aos="fade-up">
            <h3>Accomplishing the impossible</h3>
            <!-- <p> means only the boss will add it to your regular duties</p> -->
            <br>
        </div>
        <section class="blogs" id="blogs">
            <div class="box-container">
                <a href="verfication_int.php">
                    <div class="box" data-aos="fade-up">
                        <div class="image">
                            <img src="images/pexels-fauxels-3184418.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3>Interview Experience's Request</h3>
                        </div>
                    </div>
                </a>
                <a href="in.html">
                    <div class="box" data-aos="fade-up">
                        <div class="image">
                            <img src="images/pexels-pavel-danilyuk-7944234.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3>Alumni's Request</h3>
                        </div>
                    </div>
                </a>
                <a href="./all_alumni_here.php">
                    <div class="box" data-aos="fade-up">
                        <div class="image">
                            <img src="images/pexels-krivec-ales-547117.jpg" alt="">
                        </div>
                        <div class="content">
                                <h3>Registered Alumni Info!!!</h3>
                        </div>
                    </div>
                </a>
                <a href="./php/admin/dashboard.php">
                    <div class="box" data-aos="fade-up">
                        <div class="image">
                            <img src="images/blog_bg.png" alt="">
                        </div>
                        <div class="content">
                                <h3>Manage Alumni Blogs!!!</h3>
                        </div>
                    </div>
                </a>
            </div>

        </section>
    </div>

    <script>

        AOS.init({
            duration: 800,
            delay: 400
        });
    </script>
    <script>
document.addEventListener("visibilitychange", function() {
   if (document.hidden){
       console.log("Browser tab is hidden")
   } else {
       console.log("Browser tab is visible")
       location.reload();
   }
});
</script>
</body>

</html>