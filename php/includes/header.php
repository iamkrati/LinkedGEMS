<header class="p-3  text-white" >


    <nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-to " style="background-color: #37517e;">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="images/GLA_University_logo.png" height="50"></a>
            <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                            <svg class="bi me-2" width="5" height="5" role="img" aria-label="Bootstrap">
                                <use xlink:href="#bootstrap" />
                            </svg>
                        </a>




                        <!-- Categories Widget -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-link  text-right">

                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>

                                <?php $query = mysqli_query($con, "select id,CategoryName from tblcategory");
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>

                                <li class="nav-link text-right">

                                    <a class="nav-link text-white"
                                        href="category.php?catid=<?php echo htmlentities($row['id']) ?>"><?php echo htmlentities($row['CategoryName']); ?></a>


                                </li>
                            <?php } ?>

                        </ul>
                        <!-- <li>

                            <a href="http://www.facebook.com/share.php?u=<?php echo $currenturl; ?>" target="_blank"
                                class="fa fa-facebook"></a><br>
                            <a href="https://twitter.com/share?url=<?php echo $currenturl; ?>" target="_blank"
                                class="twitter"></a><br>
                            <a href="https://web.whatsapp.com/send?text=<?php echo $currenturl; ?>" target="_blank"
                                class="fa fa-Whatsapp"></a><br>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $currenturl; ?>"
                                target="_blank" class="fa fa-Linkedin"></a>
                        </li>
 -->


                        <!-- <li><a class="nav-link px-2 text-white" href="admin/">Admin</a></li> -->

                        <br>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- 
<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
   
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
     
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
      <li><a class="dropdown-item" href="#">My Profile</a></li>
      <li><a class="dropdown-item" href="logout.php">Logout</a></li>
      
    </ul>
  </li>
 
  <li class="nav-item">
    <a class="nav-link" href="login.php">Login</a>
  </li><li class="nav-item">
    <a class="nav-link" href="register.php">Register</a>
  </li>


</ul> -->

                        </div>

                        </ul>


                    </div>
                </div>
            </div>
    </nav>
</header>