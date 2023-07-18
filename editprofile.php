<?php
session_start();
if ($_SESSION["status"] != true) {
    $_SESSION["status"] = false;
    header("Location: login.php");
    // die();
}
include('include/db_connect.php');
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
$oldusername= $_SESSION['name'];
// echo $oldusername;
$email= $_SESSION["email"];
// echo $email;
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
    $sql = "insert into alumni_experience Values('" . $name . "','" . $ses . "','" . $cname . "','" . $data . "','" . $img . "')";
    $result = mysqli_query($conn, $sql);
}
$check = $_SESSION["name"];
$sqls = "select * from alumni_experience where name= '{$check}'";
$results = mysqli_query($conn, $sqls);
// 
?>

<?php

    if(isset($_POST["updateuser"]))
    {
        
        $name=$_POST['name'];
        $Roll=$_POST['Roll'];
        $jobrole=$_POST['jobrole'];
        $jobposition=$_POST['jobposition'];
        $ts=$_POST['ts'];
        $ses=$_POST['ses'];
        $branch=$_POST['branch'];
        $folder ='upload/';
        $file = $_FILES['img']['tmp_name'];
        $file_name=$_FILES['img']['name'];
        $file_name_array=explode(".",$file_name);
        $extension=end($file_name_array);
        $new_image_name='profile_'.rand().'.'.$extension;
        if($_FILES["img"]["size"]>1000000)
        {
            $error[]='image is too large,upload less than 1MB.';
        }
        if($file !="")
        {
            if($extension!="jpg" && $extension!="png" && $extension!="jpeg" && $extension!="gif" && $extension!="PNG" && $extension!="JPG" && $extension!="GIF" && $extension!="JPEG")
            {
                $error[]='Sorry formate not allow, only JPEG,JPG,PNG,GIF allowed';
            }
        }
        if(!isset($error))
        {
           
            
            if($file!="")
            {
                $stmt=mysqli_query($conn,"SELECT User FROM alumnisignup WHERE email='$email'");
                $row=mysqli_fetch_array($stmt);
                $deleteimage=$row['User'];
                unlink($folder.$deleteimage);
                move_uploaded_file($file,$folder.$new_image_name);
                mysqli_query($conn,"UPDATE alumnisignup SET img_url='$new_image_name' WHERE  email='$email'");
            }
            $result11 =mysqli_query($conn,"UPDATE `alumnisignup` SET `name`='$name',`session`='$ses',`branch`='$branch',UnivRN='$Roll',ts='$ts',jobposition='$jobposition',jobrole='$jobrole' WHERE email='$email'");
            $result22 =mysqli_query($con,"UPDATE `Signup` SET `Username`='$name',techstack='$ts',jobposition='$jobposition',jobrole='$jobrole' WHERE email='$email'");
            if($result11)
            {
                header("location:login.php");
            }
            else{
                $error[] ='something went wrong';
            }
        }

    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni_Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

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
            <!-- </span> <?php echo $oldusername ?></span> -->
        <button type="submit" id="alumni_logout" name="logout"><a href="./logout.php">Log Out</a></button>
    </header>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="alumni_main">
        <div class="card alumni_photo"> 
            <!-- <input type="image"> -->
            <img id="admin_pic" src="upload/<?php echo $_SESSION['uploadFile']; ?>">
            <label for="">Change Image</label>
            <input class="form-control" type="file" name="img" style="width:70%">
            <h2>
                <?php echo "" . $_SESSION["name"] . "" ?>
            </h2>
            <h4>
                <?php echo "" . $_SESSION["jobrole"] . "" ?>
            </h4>
            
        </div>
        <div class="card alumni_details">
        <table class="table table-bordered">
                  <tr>
                    <th width="30%">Full Name</th>
                    <td width="2%">:</td>
                    <td><input class="form-control" type="text" value=" <?php echo "" . $_SESSION["name"] . "" ?>" name="name" ></td>
                  </tr>
                  <tr>
                    <th width="30%">Batch</th>
                    <td width="2%">:</td>
                    <td><input class="form-control" type="text" value="<?php echo "" . $_SESSION["ses"] . "" ?>" name="ses" ></td>
                  </tr>
                  <!-- <tr>
                    <th width="30%">Gender</th>
                    <td width="2%">:</td>
                    <td><?php  //echo $gender?></td>
                  </tr> -->
                  <tr>
                    <th width="30%">Branch</th>
                    <td width="2%">:</td>
                    <td> <input class="form-control" type="text" value="<?php echo "" . $_SESSION["branch"] . "" ?>" name="branch" ></td>
                  </tr>
                  <tr>
                    <th width="30%">Roll Number</th>
                    <td width="2%">:</td>
                    <td><input class="form-control" type="text" value="<?php echo "" . $_SESSION["Roll"] . "" ?>" name="Roll" ></td>
                  </tr>
                  <tr>
                    <th width="30%">Tech stack</th>
                    <td width="2%">:</td>
                    <td><input class="form-control" type="text" value="<?php echo "" . $_SESSION["ts"] . "" ?>" name="ts" ></td>
                  </tr>
                  <tr>
                    <th width="30%">Job profile</th>
                    <td width="2%">:</td>
                    <td><input class="form-control" type="text" value="<?php echo "" . $_SESSION["jobrole"] . "" ?>" name="jobrole" ></td>
                  </tr>
                  <tr>
                    <th width="30%">Company </th>
                    <td width="2%">:</td>
                    <td><input class="form-control" type="text" value="<?php echo "" . $_SESSION["jobposition"] . "" ?>" name="jobposition" ></td>
                  </tr>
                  <tr>
                    <th width="30%">Email</th>
                    <td width="2%">:</td>
                    <td><?php echo "" . $_SESSION["email"] . "" ?></td>
                  </tr>
                </table>
            <h1 align="right" style="margin-right:10px;"><button type="submit" class="btn btn-primary" name="updateuser">Update</button>
        </div>
        

        
    </div>
</h1>    
    </form>

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