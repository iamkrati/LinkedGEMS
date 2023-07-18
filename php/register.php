
 <?php ob_start(); ?>

<?php session_start(); ?>

<?php require_once ("assetss/include/session.php");  ?>
<?php require_once ("assetss/include/function.php");  ?>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/modern-business.css" rel="stylesheet">

      
    <?php include "includes/header.php";?>

  <!--Main Navigation-->
<!-- <?php include "include/navigation.php";?> -->
  <!--Main Navigation-->
        <!-- Content -->
      </section>
        <section class="text-left">

        <!--Grid row-->
        <div class="row mb-4 wow fadeIn">

        
            <!--/.Card-->

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4 col-md-6 mb-4">

         

        </div> 
        <!--Grid row-->

        <!--Grid row-->
        <div class="row mb-4 wow fadeIn">

          <!--Grid column-->
             <div class="col-lg-3 col-md-12 mb-4">
             </div>
          <div class="col-lg-6 col-md-12 mb-4">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">
                <!--Title-->
                <h4 class="card-title">Register</h4>
             <?php  echo Message();
                echo SuccessMessage();
                ?>

               <form action="../include/register_user.php" method="post">

                  <div class="form-group">
                  <label for="">First name</label>
                  <input type="text" name="fname" id="" class="form-control" placeholder="" aria-describedby="helpId">
                
                </div>
                   <div class="form-group">
                  <label for="">Last name</label>
                  <input type="text" name="lname" id="" class="form-control" placeholder="" aria-describedby="helpId">
                
                </div>
                   <div class="form-group">
                  <label for="sex">Sex</label>
                <select name="sex" class="form-control" id="">
                <option value="Male">Male</option>
                 <option value="Male">Female</option>

                </select>
                
                </div>
                   <div class="form-group">
                  <label for="">Phone</label>
                  <input type="tel" name="phone" id="" class="form-control" placeholder="" aria-describedby="helpId">
                
                </div>
                      <div class="form-group">
                  <label for="">email</label>
                  <input type="email" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
                
                </div>      <div class="form-group">
                  <label for="">username</label>
                  <input type="text" name="username" id="" class="form-control" placeholder="" aria-describedby="helpId">
                
                </div>
                   <div class="form-group">
                  <label for="">Password</label>
            <input type="Password" name="Password" id="" class="form-control" placeholder="" aria-describedby="helpId">
                
                </div>
                   <div class="form-group">
                  <label for="">confirmPassword</label>
            <input type="Password" name="confirm_Password" id="" class="form-control" placeholder="" aria-describedby="helpId">
                
                </div>
                    <div class="form-group">
                  
            <input type="submit" name="Register" id="" class="btn btn-primary" value="register" placeholder="" aria-describedby="helpId" value="sign in">
         
                </div>
                <a href="register.php"><span>already have an account Register</span></a>
               </form>
               
              </div>

            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->

         

      
        <!--Pagination-->

      </section>
       <?php include "includes/footer.php";?>