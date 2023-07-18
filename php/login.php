
 <?php ob_start(); ?>

<?php session_start(); ?>


<?php require_once("assetss/include/session.php");  ?>
<?php require_once("assetss/include/function.php");  ?>
      
    <?php include "includes/header.php";?>


  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 

<!-- Custom styles for this template
<link href="css/modern-business.css" rel="stylesheet">

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

         
          <!--Grid column-->

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
                <h4 class="card-title">Login</h4>
                 <?php  echo Message();
                echo SuccessMessage();
                ?>
               <form action="../include/login_user.php" method="post">
                  <div class="form-group">
                  <label for="">username</label>
                  <input type="text" name="username" id="" class="form-control" placeholder="" aria-describedby="helpId">
                
                </div>
                   <div class="form-group">
                  <label for="">Password</label>
            <input type="Password" name="Password" id="" class="form-control" placeholder="" aria-describedby="helpId">
                
                </div>
                    <div class="form-group">
                  
            <input type="submit" name="login" id="" class="btn btn-primary" placeholder="" aria-describedby="helpId" value="login">
         
                </div>
                <a href="register.php"><span>don't have an account Register</span></a>
               </form>
               
              </div>

            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->

         

      
        <!--Pagination-->

      </section>
       <?php include "includes/footer.php";?>