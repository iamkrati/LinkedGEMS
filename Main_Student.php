<?php
require_once("config.php");
// session_start();
if (!isset($_SESSION["login_sess"])) {
    header("location:loginstudent.php");
}
$email = $_SESSION["login_email"];
$findresult = mysqli_query($dbc, "select * from users where email='$email'");
if ($res = mysqli_fetch_array($findresult)) {
    $name = $res['name'];
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
$sql = "select * from alumni_experience";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
    </style>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>


    <script src="https://kit.fontawesome.com/81831682c9.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="./images/Page_Logo.png">
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 80px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 9px 0px 0px 16px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>



    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student's Chamber</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav hoo ms-auto">
                    <li class="nav-item">
                        <img style="width:40px; height: 50px;" src="./images/Stu_Avatar.png">
                        <div class="dropdown">
                            <span style="color: white;">
                                <?php echo "$name" ?> <i class="fa-solid fa-caret-down"></i>
                            </span>
                            <div class="dropdown-content">
                                <a href="./studentProfile.php">
                                    <p style="color:black;">Profile</p>
                                </a>
                            </div>
                        </div>

                        <button><a class="nav-link  active" href="logout.php">Log Out</a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        

    <div class="bg-image">
        <div class="bg-content" data-aos="fade-up">
            <h3>TAKE THE FIRST STEP</h3>
            <!-- <p>TO KNOWLEDGE WITH US</p> -->
            <br>
            <a href="career.php"><p style="color:#000000f5; font size:30px; text-decoration: underline;">Career Opportunities</p></a>
        </div>
        <section class="blogs" id="blogs">
            <div class="box-container">
                <a href="Student.php">
                    <div class="box" data-aos="fade-up">
                        <div class="image">
                            <img src="images/pexels-fauxels-3184418.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3>Interview Experiences</h3>
                        </div>
                    </div>
                </a>
                <a href="chatpage.php">
                    <div class="box" data-aos="fade-up">
                        <div class="image">
                            <img src="images/pexels-pavel-danilyuk-7944234.jpg" alt="">
                        </div>
                        <div class="content">
                            <a href="chatpage.php">
                                <h3>Connect Alumni</h3>
                            </a>
                        </div>
                    </div>
                </a>
                <a href="./GroupChat/index.php">
                    <div class="box" data-aos="fade-up">
                        <div class="image">
                            <img src="./images/team.png" alt="">
                        </div>
                        <div class="content">
                            <h3>Team for Project</h3>
                        </div>
                    </div>
                </a>

                <a href="./php/index.php">
                    <div class="box" data-aos="fade-up">
                        <div class="image">
                            <img src="images/pexels-tirachard-kumtanom-733856.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3>Alumni Edu Blogs</h3>
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
</body>

</html>