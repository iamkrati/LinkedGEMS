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
$roll="";
$ses="";
$id = 1;
// $e="xyz";
$sql = "select * from alumni_experience where status='pending'";
$result = mysqli_query($conn, $sql);


// $nsql="select * from alumni_signup where email='pending'";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interviews Verification</title>
    <link rel="icon" type="image/x-icon" href="./images/Page_Logo.png">
    <link rel="stylesheet" href="verifyinterview.css">
    <script src="https://kit.fontawesome.com/81831682c9.js" crossorigin="anonymous"></script>
</head>

<body>


    <!-- <div class="popup-screen-exp" id="popup-screen-exp">
        <div class="popup-box-exp">
            <i class="closer fa fa-times" onclick="closer()"></i>
            <h1 style="text-align: center;">Cname</h1>
            <textarea name="experience" required>
            <?php echo $row['session'] ?>
            </textarea>
        </div>
    </div> -->

    <div style="background-color:#37517e; width: 100%; height: 50px;">
        <a style="float:right; text-decoration: none; color: white; cursor: pointer; margin-top: 10px;
        margin-right: 20px; font-size: 20px;" href="./logout.php">Log Out</a>
    </div>


    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        $em=$row['email'];
        // echo $e;
        ?>
        <div class="whole-request">
            <?php
            
            // echo $e ;
            $nsql = "select UnivRN,session from alumnisignup where email='$em' limit 1";
            $result1 = mysqli_query($conn,$nsql);
            if (!$result1)
            {    
                echo "Error running query : " . mysqli_error($conn);
               exit();
           }
        //    echo "fdh";
           if ($result1->num_rows > 0) 
           {
                // echo "fdh";
               while($row1 = $result1->fetch_assoc())
               {
                $roll=$row1['UnivRN'];
                $ses=$row1['session'];
                // echo "fdh";
               }
           } 
                    // $row1 = mysqli_fetch_assoc($result1); 
                    
            ?>
            <div class="alumni_info">
                <h3> Name :
                    <?php echo $row['name'] ?>
                </h3>
                <h5>University Roll No :  <?php echo $roll ?> </h5>
                <h5> Session :
                    <?php echo $ses ?>
                </h5>
            </div>
            <hr>
            <br>
            <div class="alumni_int">
                <h2 class="cname">
                    Company :
                    <?php echo $row['company_name']; ?>
                </h2>
                <textarea id=<?php echo $id ?> readonly><?php echo $row['experience']; ?></textarea>
            </div>
            <div class="r_or_a">
                <h6>Request on :
                    <?php echo $row['request_date'] ?>
                </h6>
                <div class="flex1">
                    <button id="btn1" class="<?php echo $row['uid']; ?>" type="submit">
                        <h6><img src="./images/yes.png"> Accept</h6>
                    </button>
                    <button id="btn2" class="<?php echo $row['uid']; ?>" type="submit">
                        <h6><img src="./images/no.png"> Reject</h6>
                    </button>
                </div>
            </div>
            <?php $id++ ?>
        </div>
        <?php
    }
    ?>
    <br><br><br>
    <script>

        let txt = "";
        console.log(txt);
        document.getElementById("btn1").addEventListener('click',(e)=>{
            console.log("h");
            if (confirm("Do you really want to accept this interview experience")) {
                txt = "Ayes";
            }
            else {
                txt = "Ano";
            }
            let id=document.getElementById("btn1").className;
            console.log(id);
            // const exp = document.getElementById(id).textContent;
            // console.log(exp);
            // window.location.href = window.location.href + '?a='+id;
            if (txt == "Ayes") {
            //     console.log(txt);
                document.cookie = "e="+id;
            //     console.log(exp);
            //     <?php
                $myphpVar = $_COOKIE['e'];
                // echo $myphpVar;
                $sql1 = "update alumni_experience set status='ACCEPTED' where uid=$myphpVar";
                // $sql1 = "update alumni_experience set Status='accepted' where Status='nbfjf'";
                $result1 = mysqli_query($conn, $sql1);

            //     // if($result1>0)
            //     //  echo "yes";
            //     ?>
                window.location.reload(true);
                window.location.reload(true);
                window.location.reload(true);
                window.location.reload(true);
            }
        });
        document.getElementById("btn2").addEventListener('click',(e)=>{
            if (confirm("Do you really want to reject this interview experience")) {
                txt = "Ryes";
            }
            else {
                txt = "Rno";
            }
            let id=document.getElementById("btn2").className;
            console.log(id);
            // const exp = document.getElementById(id).textContent;
            // console.log(exp);
            // window.location.href = window.location.href + '?a='+id;
            if (txt == "Ryes") {
            //     console.log(txt);
                document.cookie = "ee="+id;
            //     console.log(exp);
            //     <?php
                $myphpVar1 = $_COOKIE['ee'];
                // echo $myphpVar;
                $sql2 = "update alumni_experience set status='REJECTED' where uid=$myphpVar1";
                // $sql1 = "update alumni_experience set Status='accepted' where Status='nbfjf'";
                $result2 = mysqli_query($conn, $sql2);

            //     // if($result1>0)
            //     //  echo "yes";
            //     ?>
                window.location.reload(true);
                window.location.reload(true);
                window.location.reload(true);
                window.location.reload(true);
            }
        });
    </script>
    <script>
        document.addEventListener("visibilitychange", function () {
            if (document.hidden) {
                console.log("Browser tab is hidden")
            } else {
                console.log("Browser tab is visible")
                location.reload();
            }
        });
    </script>
</body>

</html>