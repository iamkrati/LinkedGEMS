<?php
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
  // exit();
}
$sql = "select * from feedback";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GLA'S Feedbacks</title>
  <link rel="icon" type="image/x-icon" href="Page_Logo.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="swaper.css">
</head>

<body>
  <!-- swiper section -->
  <div class="text">
    <h1>FEEDBACK THAT MATTERS</h1>
  </div>
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="swiper-slide">
        <br>
        <strong class="head1">
          <?php echo $row['name']; ?>
        </strong><strong class="head2">🧑‍🎓
          <?php echo $row['session']; ?>
        </strong>
        <br>
        <p>
          <?php echo $row['feed']; ?>
        </p>
      </div>
      <?php
      }
      ?>
    </div>
    <!-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> -->
    <div class="swiper-pagination"></div>
  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <marquee class="marque" scrollamount="3" width="100%" behavior="" direction="left">
    <h2 class="text">Have tomorrow in mind whenever you make choices and commitments,
      Plan before you take action</h2>
  </marquee>


  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="swaper.js"></script>


</body>

</html>