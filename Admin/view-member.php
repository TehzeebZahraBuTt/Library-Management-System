<?php  session_start(); 

if(isset($_GET['id'])){
   $id=$_GET['id'];
}
$conn=mysqli_connect("localhost","root","","db_lms");
$sql="SELECT * FROM users where user_id=$id";
$users=mysqli_query($conn,$sql);
foreach($users as $u):

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
      <title>Admin | View Member</title>
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
                              <h2>View Member Details</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>User profile</h2>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <!-- user profile section --> 
                                    <!-- profile image -->
                                    <div class="col-lg-12">
                                       <div class="full dis_flex center_text">
                                          <div class="profile_img"><img width="180" class="rounded-circle" src="<?php if(!empty($u['user_profile'])){
                                              echo "uploads/".$u['user_profile'];
                                          }else{
                                                 echo "images/layout_img/user_img.jpg";
                                          }  ?>" alt="#"></div>
                                          
                                          <div class="profile_contant">
                                             <div class="contact_inner">
                                                <h3><?php echo $u['user_name'];  ?></h3>
                                                <p><strong>Role: </strong><?php echo $u['user_role'];  ?></p>
                                                <ul class="list-unstyled">
                                                <br>
                                                   <li><i class="fa fa-envelope-o"></i> : <?php echo $u['user_email'];  ?></li>
                                                   <br>
                                                   <li><i class="fa fa-lock"></i> : <?php echo $u['user_password'];  ?></li>

                                                </ul>
                                             </div>
                                             <br><br>
                                             <div class="user_progress_bar">
                                                <div class="progress_bar">
                                                   <!-- Skill Bars -->
                                                    
                                                   
                                                   </div>
                                                </div>
                                                <a href="view-members.php" class="btn btn-compose mt-5">Return to List</a>
                                             </div>
                                            
                                          </div>
                                       </div>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2"></div>
                        </div>
                        <!-- end row -->
                     </div>

                 <?php endforeach;  ?>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <?php include("admin_scripts.php")  ?>
   </body>
</html>