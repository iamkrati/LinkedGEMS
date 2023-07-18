<?php

require_once("config.php");
if(!isset($_SESSION["login_sess"]))
{
  header("location:loginstudent.php");
}
$email=$_SESSION["login_email"];
$findresult=mysqli_query($dbc,"select*from users where email='$email'");
if($res=mysqli_fetch_array($findresult))
{
  $oldusername =$res['name']; 
  $name=$res['name'];
  $email=$res['email'];
  $course=$res['course'];
  $branch=$res['branch'];
  $section=$res['section'];
  $roll=$res['roll'];
  $batch=$res['batch'];
  // $image=$res['image'];
  $gender=$res['gender'];
  $textarea=$res['textarea'];
  $dcomp=$res['dcomp'];
  $foi=$res['foi'];

}
if(isset($_POST['updateStudent']))
{
        $dcomp=$_POST['dcomp'];
        $foi=  $_POST['foi'];
        $textarea=$_POST['textarea'];
        $name=$_POST['name'];
        $roll=$_POST['roll'];
        $batch=$_POST['batch'];
        $gender=$_POST['gender'];
        $branch=$_POST['branch'];
        $section=$_POST['section'];
        $course=$_POST['course'];
       
      
      $sql="SELECT * from users where name='$name'";
      $res=mysqli_query($dbc,$sql);
      
      if (mysqli_num_rows($res) > 0) {
          $row = mysqli_fetch_assoc($res);
          if($oldusername!=$name){
            if($name==$row['name'])
            {
           $error[] ='Username alredy Exists. Create Unique username';
          } 
   }
}

if(!isset($error)){ 
  
   $result = mysqli_query($dbc,"UPDATE users SET name='$name',course='$course',branch='$branch',section='$section',roll='$roll',batch='$batch',gender='$gender',textarea='$textarea',foi='$foi',dcomp='$dcomp' WHERE email='$email'");
   if($result)
   {
    
    header("location:studentProfile.php?profile_updated=1");

   }
   else 
   {
    $error[]='Something went wrong';
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
    <title>EditProfile</title>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <link rel="stylesheet" href="studentProfile.css">
</head>
<body>
  <?php 
if(isset($error)){ 
  
  foreach($error as $error){ 
    echo '<p class="">'.$error.'</p>'; 
  }
  }

?>
  <form action="" enctype='multipart/form-date' method="POST">
<div class="student-profile py-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="card shadow-sm">
              <div class="card-header bg-transparent text-center">
              <?php
                // if($image==NULL)
                // {
                  echo '<img class="profile_img" src="images/studentpng.png " alt="student dp">';
                // }
                // else{
                  // echo'<img class="profile_img" src="upload/'.$image.'" alt="student dp">';
                // }
              ?>
                <br>
                <h3><input style="width: 65%;" type="text" name="name" id="" value="<?php echo $name ?>"></h3>
              </div>
              <div class="card-body">
              <table class="table table-bordered">
                  <!-- <tr>
                    <th width="30%">Student ID</th>
                    <td width="2%">:</td>
                    <td>
                      <input style="width: 85%;" type="number" name="studentid" id="" value="<?php echo 12345  ?>">
                    </td>
                  </tr> -->
                  <tr>
                    <th width="30%">Course</th>
                    <td width="2%">:</td>
                    <td><input style="width: 85%;" type="text" name="course" id="" value="<?php echo $course?>"></td>
                  </tr>
                  <tr>
                    <th width="30%">Branch</th>
                    <td width="2%">:</td>
                    <td><input style="width: 85%;" type="text" name="branch" id="" value="<?php echo $branch ?>"></td>
                  </tr>
                  <tr>
                    <!-- <th width="30%">Reputation</th>
                    <td width="2%">:</td>
                    <td>6</td> -->
                  </tr>
                  <tr>
                    <th width="30%">Field Of interest</th>
                    <td width="2%">:</td>
                    <td><input style="width: 85%;" type="text" name="foi" id="" value="<?php echo $foi?>"></td>
                  </tr>
                  <tr>
                    <th width="30%">Dream Company</th>
                    <td width="2%">:</td>
                    <td><input style="width: 85%;" type="text" name="dcomp" id="" value="<?php echo $dcomp ?>"></td>
                  </tr>
                  <tr>
                    <th width="30%">Section</th>
                    <td width="2%">:</td>
                    <td><input style="width: 85%;" type="text" name="section" id="" value="<?php echo $section ?>"></td>
                  </tr>
                </table>
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
                    <td><input style="width: 85%;" type="text" name="roll" id="" value="<?php echo $roll ?>"></td>
                  </tr>
                  <tr>
                    <th width="30%">Batch</th>
                    <td width="2%">:</td>
                    <td><input style="width:85%" ; type="text" name="batch" id="" value="<?php echo $batch ?>"></td>
                  </tr>
                  <tr>
                    <th width="30%">Gender</th>
                    <td width="2%">:</td>
                    <td><input style="width:85%" ; type="text" name="gender" id="" value="<?php echo $gender ?>"></td>
                  </tr>
                  <tr>
                    <!-- <th width="30%">Reputation</th>
                    <td width="2%">:</td>
                    <td>6</td> -->
                  </tr>
                  <tr>
                    <th width="30%">Email</th>
                    <td width="2%">:</td>
                    <td>manvendra.singh_cs20@gla.ac.in</td>
                  </tr>
                </table>
                <h1 align="right" style="margin-right:5px;margin-top:5px; "><button class="btn btn-primary" name="updateStudent">Update</button>
              </div>
            </div>

              <div style="height: 26px"></div>
              <div class="card shadow-sm">
              <div class="card-header bg-transparent border-0">
                <h3 class="mb-0"><i class="far fa-star pr-1"></i>Reputation</h3>
              </div>
              <div class="card-body pt-0">
                <br>
                <table class="table table-bordered">
                  <tr>
                    <form method="POST">
                    <label>Leetcode ID : </label>
                    <input id="leetcodeid" type=text name="lid" placeholder="Enter your leetcode id">
                    <button type="submit" name="submit"> Submit </button>
                </form>
                  </tr>
                </table>
              </div>
            </div>
            <div style="height: 26px"></div>
            <div class="card shadow-sm">
              <div class="card-header bg-transparent border-0">
                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Who I am</h3>
              </div>
              
                <textarea name="textarea" id="" cols="50" rows="10" placeholder=""><?php echo $textarea ?></textarea>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

 <?php

   if(isset($_POST['submit']))
   {
      $lid=$_POST['lid'];
      $result = mysqli_query($dbc,"update users set leetcode='$lid' WHERE email='$email'");
      header("location:studentProfile.php");
   }
     
 ?>

</body>
</html>