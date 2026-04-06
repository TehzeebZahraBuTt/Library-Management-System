<?php  session_start(); 
$id=$_SESSION['id'];

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
      <title> Librarian Profile</title>
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
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>

                     <?php 

$conn=mysqli_connect("localhost","root","","db_lms");
   $query="SELECT * FROM users WHERE user_id='$id'";
   $getdata=mysqli_query($conn,$query);


   if ($getdata->num_rows>0) {

   while ($row=mysqli_fetch_assoc($getdata)) {
       $ad_name=$row['user_name'];
       $ad_email=$row['user_email'];
       
       $ad_password=$row['user_password'];
       $ad_profile=$row['user_profile'];

  

?>

<div class="row d-flex justify-content-center">
<div class="col-md-6 ">
    <div class="white_shd full margin_bottom_30">
       <div class="full graph_head ">
          <div class="row"> 
               <div class="col-4"></div>
                <div class="col-4 rounded-circle d-flex">

                   
                   <img src="<?php  
                   if(isset($ad_profile)){
                     echo 'images/admin/'.$ad_profile; 
                   }else{
                     echo "images/layout_img/user_img.jpg";
                   }
                   ?>" class="rounded-circle" alt="Cinque Terre" height="100%" width="100%">
                </div>
                 <div class="col-4"></div>
          </div>
          <div class="heading1 margin_0 ">
             <h2>Librarian Profile</h2>
          </div>
       </div>
       <div class="full inner_elements">
          <div class="row">
             <div class="col-md-12">
                <div class="tab_style2">
                   <div class="tabbar padding_infor_info">
                      <nav>
                         <div class="nav nav-tabs" id="nav-tab1" role="tablist">
                            <a class="nav-item nav-link" id="nav-home-tab2" data-toggle="tab" href="#nav-home_s2" role="tab" aria-controls="nav-home_s2" aria-selected="false">Home</a>
                            <a class="nav-item nav-link active show" id="nav-profile-tab2" data-toggle="tab" href="#nav-profile_s2" role="tab" aria-controls="nav-profile_s2" aria-selected="false">Profile</a>
                           
                         </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent_2">
                         <div class="tab-pane fade" id="nav-home_s2" role="tabpanel" aria-labelledby="nav-home-tab">
                            <p>
                               User With role as Librarian Have more permissions then users
                            </p>
                         </div>
                         <div class="tab-pane fade active show" id="nav-profile_s2" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <p>
                               <span style="font-weight: bold; color:orange">Name: </span> &nbsp &nbsp &nbsp &nbsp
                               <?php echo $ad_name;  ?>
                               <hr>
                                <span  style="font-weight: bold; color:orange">Email: </span> &nbsp &nbsp &nbsp &nbsp
                               <?php echo $ad_email;  ?>
                               <hr>
                               <span  style="font-weight: bold; color:orange">Password: </span> &nbsp &nbsp &nbsp &nbsp
                               <?php echo $ad_password;  ?>
                               <hr>
                            </p>
                         </div>

                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

 </div>


<?php }}  ?>
 
</div>
                  
                  <!-- footer -->
                
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <?php include("admin_scripts.php")  ?>
   </body>
</html>