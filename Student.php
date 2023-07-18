<?php
// session_start();
require_once("config.php");
if(!isset($_SESSION["login_sess"]))
{
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
$sql = "select * from alumni_experience where status='accepted'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Student's Chamber</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stupage.css">
  <link rel="icon" type="image/x-icon" href="./images/Page_Logo.png">
  <script src="https://kit.fontawesome.com/7eaaa8df92.js" crossorigin="anonymous"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
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
            <span style="color: white;">
            <?php echo "$name" ?>
            </span>
            <button><a class="nav-link  active" href="logout.php">Log Out</a></button>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <div class="filtering-box">
    <div class="filters">

      <h3>Filter</h3>
      <p><input type="checkbox" id="cbox1" onclick="myFunction1('Amazon')">Amazon</p>
      <p><input type="checkbox" id="cbox2" onclick="myFunction1('Flipkart')">Flipkart</p>
      <p><input type="checkbox" id="cbox3" onclick="myFunction1('Google')">Google</p>
      <div class="searcher">
        <img src="./images/searchicon.png">
        <input type="text" id="myInput" onkeyup="myFunction()"
          placeholder="type company name like (Amazon,Google,Accenture...)" title="Type in a name">

      </div>
    </div>


  </div>







  <?php
  while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="first1">
      <div class="inner">
        <div><img src="./images/alumnipng.png?>" alt="error"></div>
        <div id="usersession">
          <h3>
            <?php $n = $row['name'] ?>
            <?php echo $row['name']; ?>
          </h3>
          <div id="session"><span>🧑‍🎓</span><span>
              <?php echo $row['session']; ?>
            </span>
          </div>
        </div>
        <div class="icons1">
          <a href=""><i class="fa-brands fa-instagram"></i></a>
          <a href=""><i class="fa-brands fa-linkedin"></i></a>
          <a href="visit_alumni_profile.php?user=<?php echo $n?>"><button
              id="alumni_profile">Visit</button></a>
        </div>
      </div>
      <hr>
      <h2 class="cname">
        <?php echo $row['company_name']; ?>
      </h2>
      <textarea readonly>
              <?php echo $row['experience']; ?> </textarea>
    </div>
    <?php
  }
  ?>
  <br><br><br>

  <script>
    function myFunction() {
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      ul = document.getElementsByClassName("first1");
      li = document.getElementsByClassName("cname");
      // console.log(li[0],li[1]);
      for (i = 0; i < li.length; i++) {
        a = li[i];

        txtValue = a.textContent || a.innerText;
        // console.log(txtValue,filter);
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          // console.log(a);
          ul[i].style.display = 'block';
        } else {

          ul[i].style.display = 'none';
        }
      }
    }

    function myFunction1(e) {
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById("myInput");

      ul = document.getElementsByClassName("first1");
      li = document.getElementsByClassName("cname");
      // console.log(li[0],li[1]);

      var checkBox1 = document.getElementById("cbox1");
      var checkBox2 = document.getElementById("cbox2");
      var checkBox3 = document.getElementById("cbox3");

      if (checkBox1.checked) {
        filter = e.toUpperCase();
      }
      else if (checkBox2.checked) {
        filter = e.toUpperCase();
      }
      else if (checkBox3.checked) {
        filter = e.toUpperCase();
      }
      else {
        filter = "";
      }
      // filter = e.toUpperCase();

      for (i = 0; i < li.length; i++) {
        a = li[i];

        txtValue = a.textContent || a.innerText;
        // console.log(txtValue,filter);
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          // console.log(a);
          ul[i].style.display = 'block';
        }
        else if (filter === "") {
          ul[i].style.display = 'block';
        }
        else {

          ul[i].style.display = 'none';
        }
      }
      // e="";
    }
  </script>

</body>

</html>