<?php
session_start();
if ($_SESSION["status"] != true) {
    $_SESSION["status"] = false;
    header("Location: login.php");
    // die();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "gla";
// error_reporting(E_ERROR | E_PARSE);
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
    // exit();
}
if (isset($_POST['feedback'])) {
    $data = $_POST['feedback'];
    $name = $_SESSION['name'];
    $ses = $_SESSION['ses'];
    $sql = "insert into feedback(name,session,feed) Values('" . $name . "','" . $ses . "','" . $data . "')";
    $result = mysqli_query($conn, $sql);
}
if (isset($_POST['experience'])) {
    $data = $_POST['experience'];
    $name = $_SESSION['name'];
    $ses = $_SESSION['ses'];
    $img = $_SESSION['uploadFile'];
    $cname = $_POST['company_name'];
    $e=$_SESSION["email"];
    $date = date('Y-m-d H:i:s');
    $status = 'pending';
    $sql = "insert into alumni_experience(name,session,company_name,experience,user,request_date,status,email) Values('" . $name . "','" . $ses . "','" . $cname . "','" . $data . "','" . $img . "','" . $date . "','" . $status . "','" . $e . "')";
    $result = mysqli_query($conn, $sql);
}
$check=$_SESSION["name"];
$sqls = "select * from alumni_experience where name='$check'";
$results = mysqli_query($conn, $sqls);
// 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni_Profile</title>

    <link rel="icon" type="image/x-icon" href="./images/Page_Logo.png">

    <!-- CSS Link -->
    <link href="admin_profile.css" rel="stylesheet">
    <!-- CSS Link -->

    <!-- Kit Link -->
    <script src="https://kit.fontawesome.com/81831682c9.js" crossorigin="anonymous"></script>
    <!-- Kit Link -->
</head>

<body>
    <div class="add_feedback popup-screen-exp" id="popup-screen-exp">
        <div class="popup-box-exp">
            <h3>Add Your Interview Experience <i class="closer fa fa-times" onclick="closer()"></i></h3>
            <form method="post">
                <input class="company" type="text" name="company_name" placeholder="Enter Company Name..." required>
                <textarea rows="8" cols="60" name="experience" required></textarea>
                <button id="share_btn" type="submit">Share</button>
            </form>
        </div>
    </div>

    <div class="add_feedback popup-screen-feed" id="popup-screen-feed">
        <div class="popup-box-feed">
            <h3>Add GLA's FeedBack <i class="closer fa fa-times" onclick="closerfeed()"></i></h3>
            <form method="post">
                <textarea rows="8" cols="60" name="feedback" required></textarea>
                <button id="share_btn" type="submit">Share</button>
            </form>
        </div>
    </div>


    <header id="placed">
        <span class="placement">Placed at <span id="company">
                <?php echo "" . $_SESSION["jobposition"] . "" ?>
            </span>as <span id="position">
                <?php echo "" . $_SESSION["jobrole"] . "" ?>
            </span></span>
        <button type="submit" id="alumni_logout" name="logout"><a href="./logout.php">Log Out</a></button>
    </header>
    <div class="alumni_main">
        <div class="card alumni_photo">
            <img id="admin_pic" src="./images/alumnipng.png">
            <h2>
                <?php echo "" . $_SESSION["name"] . "" ?>
            </h2>
            <h4>
                <?php echo "" . $_SESSION["jobrole"] . "" ?>
            </h4>
            <a  class="btn btn-primary" href="editprofile.php"><button >Edit profile</button></a>
        </div>
        <div class="card alumni_details">
        <table class="table table-bordered">
                  <tr>
                    <th width="30%">Full Name</th>
                    <td width="2%">:</td>
                    <td> <?php echo "" . $_SESSION["name"] . "" ?></td>
                  </tr>
                  <tr>
                    <th width="30%">Batch</th>
                    <td width="2%">:</td>
                    <td><?php echo "" . $_SESSION["ses"] . "" ?></td>
                  </tr>
                  <tr>
                    <th width="30%">Branch</th>
                    <td width="2%">:</td>
                    <td><?php echo "" . $_SESSION["branch"] . "" ?></td>
                  </tr>
                  <tr>
                    <th width="30%">Univ.RN</th>
                    <td width="2%">:</td>
                    <td><?php echo "" . $_SESSION["Roll"] . "" ?></td>
                  </tr>
                  <tr>
                    <th width="30%">Email</th>
                    <td width="2%">:</td>
                    <td><?php echo "" . $_SESSION["email"] . "" ?></td>
                  </tr>
                  <tr>
                    <th width="30%">Tech Stack</th>
                    <td width="2%">:</td>
                    <td><?php echo $_SESSION["ts"] ?></td>
                  </tr>
                  <tr>
                    <th width="30%">Job Profile</th>
                    <td width="2%">:</td>
                    <td><?php echo "" . $_SESSION["jobrole"] . "" ?></td>
                  </tr>
                  <tr>
                    <th width="30%">Company</th>
                    <td width="2%">:</td>
                    <td><?php echo "" . $_SESSION["jobposition"] . "" ?></td>
                  </tr>
                </table>
        </div>
        <div class="card alumni_linkss">
            <div class="alumni_links">
                <a href="https://www.linkedin.com/in/krati-goyal-910a39212/" target="_blank"><i
                        class="fa-brands fa-linkedin-in"></i></a>
                <a href="#"><i class="fa-brands fa-github"></i></a>
                <a href="#"></a><i class="fa-brands fa-instagram"></i></a>
            </div>
            <div id="feedback">
                <button type="submit" onclick="openerfeed()">Add GLA's Feedback</button>
                <button type="submit" onclick="opener()">Add Your Interview Experience </button>
                <a href="./php/admin/alumni_dashboard.php"><button type="submit">Add Your Blog/Job_Post </button></a>
                <a href="chatwithstu.php"><button type="submit"> Connect with Students </button></a>
            </div>
        </div>
        <div class=" card experiences">
            <h2 class="text">My Experiences</h2>
            <?php
            while ($row = mysqli_fetch_assoc($results)) {
                ?>
                <div class="exp">
                    <h4>
                        <?php echo $row['company_name']; ?>
                    </h4>

                    <textarea cols="150" rows="20" wrap="hard" readonly>
                        <?php echo $row['experience']; ?>
                        </textarea>
                    <div style="background-color: #37517e; margin-top: -30px; height: 41px;">
                        <p style="color:white; float:right; margin-right:10px">
                            Status : <?php echo $row['Status']; ?>
                        </p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <!--  -->
    <script type="text/javascript">
        //    const popupscreen=document.querySelector(".popup-screen");
        function opener() {
            document.getElementById('popup-screen-exp').style.visibility = 'visible';
        }

        function closer() {
            document.getElementById('popup-screen-exp').style.visibility = 'hidden';
        }
        function openerfeed() {
            document.getElementById('popup-screen-feed').style.visibility = 'visible';
        }

        function closerfeed() {
            document.getElementById('popup-screen-feed').style.visibility = 'hidden';
        }
    </script>
</body>

</html>