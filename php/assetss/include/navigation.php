  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="index.php" ">
          <strong class="blue-text">Student</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item active">
              <a class="nav-link waves-effect" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="post.php" target="_blank">Post</a>
            </li>

           <li class="nav-item">
              <a class="nav-link waves-effect" href="create_post.php" target="_blank">Create Post</a>
            </li>
          

          </ul> -->
         

                        <?php
                            if (isset($_SESSION['fname'])) {

                            
              ?>
                  
                            <li class="nav-item">
                                <a class="fa fa-user mr-2 " href="includes/logout.php" >Logout</a>
                          
                                </li>
                              
                               
                          <?php       
                              
                            }else{
?>
 <li class="nav-item">
                                <a class="fab fa fa-user mr-2" href="login.php">login</a>
                          
                                </li>
                                <?php
                                    
                                
                            }

                        ?>
                       
            
                      
                            
                              
             
                
            
              <!-- Modal -->
              <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      Body
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div>

        

        </div>

      </div>
    </nav>
    <!-- Navbar -->

  </header>