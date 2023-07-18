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
$n=1;
$sql = "select * from alumnisignup";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="al_info.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

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
    
    <h3> All Registered Alumni !!! </h3>
    
    <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <!-- <th>Photo</th> -->
                                        <th>Email_Id</th>
                                        <th>University Roll No</th>
                                        <th>Branch</th>
                                        <th>Current Company</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td> <?php echo $n++ ?> </td>
                                            <td> <?php echo $row['name']; ?> </td>
                                            <!-- <td>  <img src="upload/<?php echo $row['User']; ?>" alt="error"> </td> -->
                                            <td> <?php echo $row['email']; ?> </td>
                                              <td> <?php echo $row['univrn']; ?> </td>
                                              <td> <?php echo $row['branch']; ?> </td>
                                            <td> <?php echo $row['jobposition']; ?> </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

    </body>

    </html>
</body>

</html>