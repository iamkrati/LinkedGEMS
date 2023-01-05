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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni_Profile</title>

    <link rel="icon" type="image/x-icon" href="Page_Logo.png">

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
            <h3>Add Experience <i class="closer fa fa-times" onclick="closer()"></i></h3>
            <input class="company" type="text" name="company_name" placeholder="Enter Company Name...">
            <textarea rows="8" cols="60"></textarea>
            <button id="share_btn" type="submit">Share</button>
        </div>
    </div>

    <div class="add_feedback popup-screen-feed" id="popup-screen-feed">
        <div class="popup-box-feed">
            <h3>Add FeedBack <i class="closer fa fa-times" onclick="closerfeed()"></i></h3>
            <form method="post">
                <textarea rows="8" cols="60" name="feedback"></textarea>
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
            <img id="admin_pic" src="Me.jpg">
            <h2>
                <?php echo "" . $_SESSION["name"] . "" ?>
            </h2>
            <h4>
                <?php echo "" . $_SESSION["jobrole"] . "" ?>
            </h4>
        </div>
        <div class="card alumni_details">
            <div id="name">
                <span>Full Name : </span>
                <span>
                    <?php echo "" . $_SESSION["name"] . "" ?>
                </span>
            </div>
            <hr>
            <div id="email">
                <span>Email ID : </span>
                <span>
                    <?php echo "" . $_SESSION["email"] . "" ?>
                </span>
            </div>
            <!-- <hr> -->
            <hr>
            <div id="branch">
                <span>Branch: </span>
                <span>
                    <?php echo "" . $_SESSION["branch"] . "" ?>
                </span>
            </div>
            <hr>
            <div id="session">
                <span>Session: </span>
                <span>
                    <?php echo "" . $_SESSION["ses"] . "" ?>
                </span>
            </div>
        </div>
        <div class="card alumni_linkss">
            <div class="alumni_links">
                <a href="https://www.linkedin.com/in/krati-goyal-910a39212/" target="_blank"><i
                        class="fa-brands fa-linkedin-in"></i></a>
                <a href="#"><i class="fa-brands fa-github"></i></a>
                <a href="#"></a><i class="fa-brands fa-instagram"></i></a>
            </div>
            <div id="feedback">
                <button type="submit" onclick="openerfeed()">Add Feedback</button>
                <button type="submit" onclick="opener()">Add New Experiences</button>
            </div>
        </div>
        <div class=" card experiences">
            <h2 class="text">My Experiences</h2>
            <div class="exp">
                <h4>Amazon</h4>
                <textarea cols="150" rows="20" wrap="hard">
Hiring Process :

Online Assessment Round
Technical Interview Round 1
Technical Interview Round 2
Hiring Manager Interview
Online Assessment Round: Platform: HackerRank.
                        
Assessment consists of two sections:
                        
Coding Challenge – It consists of two easy coding problems that you need to solve in 105 minutes alongwith explaining the approach and time complexity.
I don’t remember the exact problems, but the topic covered was generally arrays(insertion in sorted array using binary search, sorting array based on 
a condition).
                        
Amazon Work Style Survey – This takes approx. 10-15 minutes to be completed and contains questions to assess your work ethics and principles. It also 
tests how you approach work in general and whether you are a good fit for the company as per Amazon Leadership Principles. 
Each question consists of two parts where you have to choose from options like most like me, somewhat like me, etc.
                        
The next day I received a mail that I successfully passed the online assessment round and got information about the next three rounds along with some 
preparatory materials and tips. My next two rounds were scheduled on the same day with a gap of around 3-4 hours between them.
                        
Technical Round 1 (60 minutes): Initially, the interviewer introduced himself and asked me to do the same. Then he asked me to explain a situation 
where I learned something new or from scratch. This discussion took 5 minutes. After that interviewer jumped to the coding question.
                        
Question 1:  Devise a sorting algorithm
                        
I started with a brute force algorithm and the interviewer asked me to think of an optimized way. After some hints, I was able to solve it using 
heap and wrote the code for the same. I accidentally made a mistake which I corrected on a dry run myself. 
                </textarea>
            </div>
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