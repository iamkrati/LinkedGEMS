<?php
require_once("config.php");
if (!isset($_SESSION["login_sess"])) {
  header("location:loginstudent.php");
}
$email = $_SESSION["login_email"];
$findresult = mysqli_query($dbc, "select*from users where email='$email'");
if ($res = mysqli_fetch_array($findresult)) {
  $name = $res['name'];
  $email = $res['email'];
  $course = $res['course'];
  $branch = $res['branch'];
  $section = $res['section'];
  $roll = $res['roll'];
  $batch = $res['batch'];
  $image = $res['image'];
  $gender = $res['gender'];
  $textarea = $res['textarea'];
  $dcomp = $res['dcomp'];
  $foi = $res['foi'];
  $lid = $res['leetcode'];

}

if (isset($_POST['p_desc'])) {
  $data = $_POST['p_desc'];
  $name = $_POST['p_name'];
  $link = $_POST['p_link'];
  $sql = "insert into project(email,p_name,p_link,p_desc) Values('" . $email . "','" . $name . "','" . $link . "','" . $data . "')";
  $result = mysqli_query($dbc, $sql);
}






?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StudentProfile</title>
  <!-- Google Fonts -->
  <link rel="icon" type="image/x-icon" href="./images/Page_Logo.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <!-- Font Awesome CSS -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
  <link rel="stylesheet" href="studentProfile.css">
  <link rel="stylesheet" href="admin_profile.css">
</head>

<body>
  <div class="add_feedback popup-screen-exp" id="popup-screen-exp">
    <div class="popup-box-exp">
      <h3 style="color:black;">Add Your Project <i class="closer fa fa-times" style="color:black;"
          onclick="closer()"></i></h3>
      <form method="post">
        <input class="company" type="text" name="p_name" placeholder="Enter Project Name..." required>
        <input class="company" type="text" name="p_link" placeholder="Enter Project Link..." required>
        <textarea rows="8" cols="60" name="p_desc" required></textarea>
        <button id="share_btn" type="submit">Share</button>
      </form>
    </div>
  </div>
  <div class="student-profile py-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent text-center">

              <?php
              if ($image == NULL) {
                echo '<img class="profile_img" src="images/studentpng.png " alt="student dp">';
              } else {
                echo '<img class="profile_img" src="upload/' . $image . '" alt="student dp">';
              }
              ?>
              <h3>
                <?php echo $name ?>
              </h3>
              <a href="StudentEditProfile.php"><button class="btn btn-primary">Edit profile</button></a>
            </div>
            <div class="card-body">
              <!-- <p class="mb-0"><strong class="pr-1">Student ID:</strong>321000001</p> -->
              <p class="mb-0"><strong class="pr-1">Course:</strong>
                <?php echo $course ?>
              </p>
              <p class="mb-0"><strong class="pr-1">Branch:</strong>
                <?php echo $branch ?>
              </p>
              <p class="mb-0"><strong class="pr-1">Feild of Interest:</strong>
                <?php echo $foi ?>
              </p>
              <p class="mb-0"><strong class="pr-1">Dream Company</strong>
                <?php echo $dcomp ?>
              </p>
              <p class="mb-0"><strong class="pr-1">Section:</strong>
                <?php echo $section ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent border-0">
              <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
            </div>
            <div class="card-body pt-0">
              <table class="table table-bordered">
                <tr>
                  <th width="30%">Roll</th>
                  <td width="2%">:</td>
                  <td>
                    <?php echo $roll ?>
                  </td>
                </tr>
                <tr>
                  <th width="30%">Batch</th>
                  <td width="2%">:</td>
                  <td>
                    <?php echo $batch ?>
                  </td>
                </tr>
                <tr>
                  <th width="30%">Gender</th>
                  <td width="2%">:</td>
                  <td>
                    <?php echo $gender ?>
                  </td>
                </tr>
                <!-- <tr>
                    <th width="30%">Reputation</th>
                    <td width="2%">:</td>
                    <td>6</td>
                  </tr> -->
                <tr>
                  <th width="30%">Email</th>
                  <td width="2%">:</td>
                  <td>
                    <?php echo $email ?>
                  </td>
                </tr>
              </table>
            </div>
          </div>

          <br>
          <div class="card shadow-sm">
            <div class="card-header bg-transparent border-0">
              <h3 class="mb-0"><i class="far fa-star pr-1"></i>Reputation
            <span id="totalranking">
              <span>

              </h3>
            </div>
            <div class="card-body pt-0">
              <br>
              <table class="table table-bordered">
                <tr>
                  <label style="color:black !important;">Leetcode ID : </label>
                  <span style="color:black !important;">
                    <?php echo $lid ?>
                  </span>
                </tr>
                <br>
                <tr>
                  <label style="color:black !important;">Ranking of Leetcode : </label>
                  <span id="lrank" style="color:black !important;">

                  </span>
                </tr>
                <br>
                <button type="submit" onclick="opener()">Add Projects</button>
                <br>
                <!--  -->
                <?php
                $result = mysqli_query($dbc, "select * from project where email='$email'");
                $rowcount = mysqli_num_rows($result);
                if ($rowcount > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <br>
                    <h3 style="color:black;text-align:center;">Project</h3>
                    <p style="color:black;">
                      Project Name : <?php echo $row['p_name']; ?>
                  </p>
                    <p style="color:black;">
                    Project Link : <a href="<?php echo $row['p_link']?>" target="_blank">Link</a>
                  </p>
                    <p  style="color:black;">
                    Project Description : <?php echo $row['p_desc']; ?>
                  </p>
                    <p  style="color:black;">
                    Rating : <span id="p_rank"><?php echo $row['rated']; ?></span>
                  </p>
                    <br>
                    <?php
                  }
                }
                else
                {
                  ?><span id="p_rank">0</span><?php
                }
                ?>


                <!--  -->




              </table>
            </div>
          </div>

          <div style="height: 26px"></div>
          <div class="card shadow-sm">
            <div class="card-header bg-transparent border-0">
              <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Who I am</h3>
            </div>
            <div class="card-body pt-0">
              <p>
                <?php echo $textarea ?>
              </p>
            </div>
          </div>
          <h1 align="right" style="margin-right:5px;margin-top:5px; "><a href="logoutstudent.php"><button type="submit"
                class="btn btn-primary" name="logout">LogOut</button></a></h1>
        </div>
      </div>
    </div>
  </div>

  <script>
    

    function load()
    {
      fetch('https://leetcode-stats-api.herokuapp.com/<?php echo $lid ?>').then(response => {
      return response.json();
    }).then(data => {
      const t = parseFloat(data.totalQuestions);
      const s = parseFloat(data.totalSolved);
      let a1 = parseFloat((s / t).toFixed(2));
      // console.log(a1);
      const r = parseFloat(data.ranking);
      let a2 = parseFloat((500000.0/r).toFixed(2));
      // console.log(a2);
      let ans = ((a1) + (a2)) * 10;
      // console.log(ans);
      document.getElementById("lrank").innerHTML = ans.toFixed(2);
      

    document.getElementById("totalranking").innerHTML=parseFloat(document.getElementById("lrank").innerHTML)+parseFloat(document.getElementById("p_rank").innerHTML);
    let repu= document.getElementById("totalranking").innerText;
    console.log(repu);
    // console.log("xyz");
    
    })
    .catch(error => {
        console.log(error);
      });
  }
      
    load();

    console.log("DONE");

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