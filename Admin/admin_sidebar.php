<nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="starter.php"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src= <?php  if(isset($_SESSION['profile'])){

                              echo "uploads/".$_SESSION['profile'];

                        } else{
                           echo "images/layout_img/user_img.jpg";
                        }
                        
                        
                        
                        ?> alt="#" /></div>
                        <div class="user_info">
                           <h6><?php echo $_SESSION["name"];  ?></h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  
                  <?PHP if($_SESSION['role']=="Admin"): ?>
                  <h4>Admin Features</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user yellow_color"></i> <span>Manage Librarians</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                           <li>
                              <a href="add-librarian.php"> <span>Add Librarian</span></a>
                           </li>
                           <li>
                              <a href="view-librarians.php"><span>View All Librarian</span></a>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users purple_color"></i> <span>Manage Members</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="add-member.php"> <span>Add Members</span></a></li>
                           <li><a href="view-members.php"> <span>View All Members</span></a></li>
                           
                        </ul>
                     </li>
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-book blue2_color"></i> <span>Manage Books</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="add-book.php"><span>Add Books</span></a></li>
                           <li><a href="view-books.php"><span>View Books</span></a></li>
                           <li><a href="add-book-categories.php"><span>Add Books Categories</span></a></li>
                           <li><a href="view-books-categories.php"><span>View Books Categories</span></a></li>
                         
                        </ul>
                     </li>
                     
                     <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone red_color"></i> <span>Issue book Management</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                           <li>
                           <a href="lib_borrow-requests.php">> <span> Process Requests Requests </span></a>
                           </li>
                           <li>
                           <a href="lib_issued.php">> <span>Issued Books</span></a>
                           </li>
                           <li>
                           <li><a href="lib_requests.php">> <span>Requests</span></a></li>
                           </li>
                           <li>
                           <a href="lib_books-status.php">> <span>Books Status</span></a>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a href="roles-management-page.php" ><i class="fa fa-male orange_color"></i> <span>Manage Roles</span></a>
                        
                     </li>
                     <li><a href="indexing-page.php"><i class="fa fa-briefcase blue_color"></i> <span>Indexing</span></a></li>
                     <li><a href="date-wise-search.php"><i class="fa fa-calendar blue1_color"></i> <span>Date wise search</span></a></li>


                     
                  </ul>
                  <?php endif;  ?>
                  <?PHP if($_SESSION['role']=="Librarian"): ?>
                     
                  <ul class="list-unstyled components">
                  <h4>Librarian Features</h4>
                     <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-child yellow_color"></i> <span>Manage Members</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                           <li>
                              <a href="add-member.php">> <span>Add Members</span></a>
                           </li>
                           <li>
                              <a href="view-members.php">> <span>View All Members</span></a>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-book purple_color"></i> <span>Issue book Management</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="lib_borrow-requests.php">> <span> Process Requests Requests </span></a></li>
                           <li><a href="lib_issued.php">> <span>Issued Books</span></a></li>
                           <li><a href="lib_requests.php">> <span>Requests</span></a></li>
                           <li><a href="lib_books-status.php">> <span>Books Status</span></a></li>
                        </ul>
                     </li>
                     <li>
                        <!-- <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Manage Fines</span></a>
                        <ul class="collapse list-unstyled" id="apps"> -->
                           <!-- <li><a href="email.html">> <span>Email</span></a></li>
                           <li><a href="calendar.html">> <span>Calendar</span></a></li>
                           <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li> -->
                        <!-- </ul> -->
                     </li>
                     
                     
                     
                  </ul>
                  <?php endif;  ?>
               </div>
            </nav>