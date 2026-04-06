<div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <!-- <a href="index.html"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a> -->
                           <a href="starter.php"><img class="img-responsive " src="images/logo/lms-logo2.png" alt="#" /></a>
                           <label for="" class="h4 mt-4 ms-n4 text-light">Library Management System</label>
                          <form action="" method="post">
                           
                          </form>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                           <?PHP if($_SESSION['role']=="Admin"): ?>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src= <?php  if(isset($_SESSION['profile'])){

                                    echo "uploads/".$_SESSION['profile'];

                                    } else{
                                    echo "images/layout_img/user_img.jpg";
                                    }

?>  alt="#" /><span class="name_user"><?php echo $_SESSION["name"]  ?></span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="admin-profile.php">My Profile</a>
                                       <a class="dropdown-item" href="admin-profile-setting.php">Settings</a>
                                       <a class="dropdown-item" href="admin_logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                              <?php endif;  ?>
                              <?PHP if($_SESSION['role']=="Librarian"): ?>
                                 <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src= <?php  if(isset($_SESSION['profile'])){

                                                echo "uploads/".$_SESSION['profile'];

                                                } else{
                                                echo "images/layout_img/user_img.jpg";
                                                }



?>  alt="#" /><span class="name_user"><?php echo $_SESSION["name"]  ?></span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="lib-profile.php">My Profile</a>
                                       <a class="dropdown-item" href="lib-profile-setting.php">Settings</a>
                                       <a class="dropdown-item" href="admin_logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                              <?php endif;  ?>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>