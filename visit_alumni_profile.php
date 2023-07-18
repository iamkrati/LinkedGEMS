<?php
session_start();

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
$check = $_GET['user'];
$ch=trim($check);
// echo $check;
$sqls = "select * from alumni_experience where name='{$ch}' and status='Accepted'";
$results = mysqli_query($conn, $sqls);

$sql="select * from alumnisignup where name='${ch}' limit 1";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

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

    <style>
        .alumni_linkss {
    background-color: rgba(255, 255, 255, 0.664);
    height: 80px;
     }
     </style>

</head>

<body>

    <header id="placed">
        <span class="placement">Placed at <span id="company">
                    <?php  echo "" . $row["jobposition"] . "" ?>
            </span>as <span id="position">
               <?php  echo "" . $row["jobrole"] . "" ?>
            </span></span>
    </header>
    <div class="alumni_main">
        <div class="card alumni_photo">
            <img id="admin_pic" src="upload/<?php echo $_SESSION['uploadFile']; ?>">
             <h2>
                 <?php echo $check ?>
            </h2>
            <h4>
            <?php  echo "" . $row["jobrole"] . "" ?>
            </h4>
        </div>
        <div class="card alumni_details">
        <table class="table table-bordered">
                  <tr>
                    <th width="30%">Full Name</th>
                    <td width="2%">:</td>
                    <td>   <?php echo "" . $row["name"] . "" ?></td>
                  </tr>
                  <tr>
                    <th width="30%">Batch</th>
                    <td width="2%">:</td>
                    <td>     <?php  echo "" . $row["session"] . "" ?></td>
                  </tr>
                  <tr>
                    <th width="30%">Branch</th>
                    <td width="2%">:</td>
                    <td>   <?php  echo "" . $row["branch"] . "" ?> </td>
                  </tr>
                  <tr>
                    <th width="30%">Univ.RN</th>
                    <td width="2%">:</td>
                    <td>     <?php  echo "" . $row["UnivRN"] . "" ?></td>
                  </tr>
                  <tr>
                    <th width="30%">Email</th>
                    <td width="2%">:</td>
                    <td> <?php  echo "" . $row["email"] . "" ?></td>
                  </tr>
                  <tr>
                    <th width="30%">Tech Stack</th>
                    <td width="2%">:</td>
                    <td>     <?php  echo "" . $row["ts"] . "" ?></td>
                  </tr>
                  <tr>
                    <th width="30%">Job Profile</th>
                    <td width="2%">:</td>
                    <td>     <?php  echo "" . $row["jobrole"] . "" ?></td>
                  </tr>
                  <tr>
                    <th width="30%">Company</th>
                    <td width="2%">:</td>
                    <td>       <?php  echo "" . $row["jobposition"] . "" ?> </td>
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