<?php  session_start(); 
 $b_id;
 $b_title;
 $b_author;
 $b_isbn;
 $b_publisher;
 $b_py;
 $b_img;
 $b_cat_id;
 $b_lang;
 $b_desc;
 $b_status;
if(isset($_GET['id'])){
   $id=$_GET['id'];
}
$conn=mysqli_connect("localhost","root","","db_lms");
$sql="SELECT * FROM books where book_id=$id";
$res=mysqli_query($conn,$sql);
$num=mysqli_num_rows($res);
if($num>0) {

 while ($row=mysqli_fetch_assoc($res)) {
   $b_id=$row['book_id'];
   $b_title=$row['book_title'];
   $b_author=$row['book_author'];
   $b_isbn=$row['book_isbn'];
   $b_publisher=$row['book_publisher'];
   $b_py=$row['book_pb_year'];
   $b_img=$row['book_cover'];
   $b_cat_id=$row['book_category'];
   $b_lang=$row['book_language'];
   $b_desc=$row['book_desc'];
   $b_status=$row['status'];

 


 }}
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Admin | View Books</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <?php include("admin_css.php")  ?>
     
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <?php include("admin_sidebar.php")   ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <?php include("admin_topbar.php")   ?>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>View Book Details</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                               <div class="row">
                                 <div class="heading1 margin_0 col-4 ">
                                    <h2>Book Details</h2>
                                 </div>
                                 <div class="heading1 margin_0 col-4">
                                    <h2></h2>
                                 </div>
                                 
                              </div>
                                 
                                 
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <!-- user profile section --> 
                                    <!-- profile image -->
                                    <div class="col-lg-12">
                                       <div class="full dis_flex center_text">
                                          <div class="profile_img"><img width="180" class="rounded-circle" src="uploads/<?php echo $b_img;   ?>" alt="#"></div>
                                          <div class="profile_contant">
                                             <div class="contact_inner">
                                                <h3><?php echo $b_title;  ?></h3>
                                                <p><strong>Publisher: </strong><?php echo $b_publisher;  ?></p>
                                                <p><strong>Publication Year: </strong><?php echo $b_py;  ?> </p>
                                                
                                             </div>
                                             
                                          </div>
                                       </div>
                                       <!-- profile contant section -->
                                       <div class="full inner_elements margin_top_30">
                                          <div class="tab_style2">
                                             <div class="tabbar">
                                                <nav>
                                                   <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#recent_activity" role="tab" aria-selected="true">Other Details</a>
                                                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#project_worked" role="tab" aria-selected="false">Book Description</a>
                                                   </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                   <div class="tab-pane fade show active" id="recent_activity" role="tabpanel" aria-labelledby="nav-home-tab">
                                                      <div class="msg_list_main">
                                                         <ul class="msg_list">
                                                            <li>
                                                               <span>
                                                               <span class="name_user">Book Author</span>
                                                               <span class="msg_user"><?php  echo $b_author; ?></span>
                                                               </span>
                                                            </li>
                                                            <li>
                                                               <span>
                                                               <span class="name_user">Book ISBN</span>
                                                               <span class="msg_user"><?php  echo $b_isbn; ?></span>
                                                               </span>
                                                            </li>
                                                            <li>
                                                               <span>
                                                               <span class="name_user">Book Language</span>
                                                               <span class="msg_user"><?php  echo $b_lang; ?></span>
                                                               </span>
                                                            </li>
                                                            <li>
                                                               <span>
                                                               <span class="name_user">Book Status</span>
                                                               <span class="msg_user"><?php  echo $b_status; ?></span>
                                                               </span>
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                   <div class="tab-pane fade" id="project_worked" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                      <p><?php echo $b_desc; ?>
                                                      </p>
                                                   </div>
                                                   
                                                </div>
                                             </div>
                                          </div>
                                          <div class="heading1 margin_0 col-4">
                                            <h2><a href="view-books.php" class="btn btn-compose">Back to Books List</a></h2>
                                          </div>
                                       </div>
                                       <!-- end user profile section -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2"></div>
                        </div>
                        <!-- end row -->
                     </div>

                 
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <?php include("admin_scripts.php")  ?>
   </body>
</html>