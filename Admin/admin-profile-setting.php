
<?php

   session_start();
$id=$_SESSION['id'];

$ad_password;


 $conn=mysqli_connect("localhost","root","","db_lms");
  $query="SELECT * FROM users WHERE user_id='$id'";
  $getdata=mysqli_query($conn,$query);


  if ($getdata->num_rows>0) {

  while ($row=mysqli_fetch_assoc($getdata)) {
     
      $ad_password=$row['user_password'];


  }
  
  }


$match='';
$confirm='';


if (isset($_POST['save'])) {
   extract($_POST);

if ($ad_password==$old_password) {


if ($new_password==$confirm_password) {

     $sql="UPDATE users SET user_password='$new_password' WHERE user_id='$id'";
     $res=mysqli_query($conn,$sql);

}else{
    $confirm='not_confirm';

}
  
    
}else{
  $match='error';
}

  
  
}


if(isset($_POST['pic'])){
    $filename=$_FILES['profile']['name'];
    $tmp_name=$_FILES['profile']['tmp_name'];
    $uploaded=move_uploaded_file($tmp_name, 'uploads/'.$filename);
    $conn=mysqli_connect("localhost","root","","db_lms");
    $sql2="update users set user_profile='$filename' where user_id=$id";
    $result=mysqli_query($conn,$sql2);
   

}



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
      <title>Admin Profile Settings</title>
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

                                     <!-- content -->
                         <!-- error alert -->
                         <?php if($match=='error'):  ?>
            <div class="col-md-12">
                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Error!</strong> Old Password not matched
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
           </div>
       <?php endif;  ?>
                         <!-- end error alert -->

                          <!-- error alert -->
                         <?php if($confirm=='not_confirm'):  ?>
            <div class="col-md-12">
                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Error!</strong> Confirm Password doesn't matched
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
           </div>
       <?php endif;  ?>
                         <!-- end error alert -->

                          <!-- error alert -->
                         <?php if(isset($res)):  ?>
            <div class="col-md-12">
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success!</strong> Password Updated Successfully
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
           </div>
       <?php endif;  ?>
                         <!-- end error alert -->

                         <div class="col-md-12">

               
                            <form action="" method="POST" >
                              


                            <div class="row mb-3">
                                <div class="col-sm-3">

                                    <h6 class="mb-0">Old Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" class="form-control " name="old_password" placeholder="Old Password "  value=""/>
                                   
                                </div>
                            </div>
                            <hr>

                            <div class="row mb-3">
                                <div class="col-sm-3">

                                    <h6 class="mb-0">New Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" class="form-control" name="new_password"  placeholder="New Password " value=""/>
                                    
                                </div>
                            </div>
                             <hr>

                            <div class="row mb-3">
                                <div class="col-sm-3">

                                    <h6 class="mb-0">Confirm Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" class="form-control" name="confirm_password" value="" placeholder="Confirm Password" />

                                </div>
                            </div>

                             <hr>

                             <div class="row">
                                <div class="col-sm-3"></div>
                                 <div class="col-sm-3"></div>
                                  <div class="col-sm-3"></div>
                                <div class="col-sm-3 text-secondary">
                                    <input type="submit" name="save" class="btn btn-compose px-4" value="Change Password  ">
                                </div>
                            </div>
                            

                           


                        </div>

                    </form>
                    
                    <form action="" method="post" enctype="multipart/form-data">
                   

                            <div class="row">
                                <div class="col-4"><h1>Upload Picture</h1></div>
                                <div class="col-8">

                                </div>
                                <?php if(isset($result)):  ?>
                                    <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Success!</strong> Profile Updated Successfully
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                </div>
                            <?php endif;  ?>

                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3 mt-5">

                                    <h6 class="mb-0">Select Picture</h6>
                                </div>
                                <div class="col-sm-9 text-secondary mt-5">
                                    <input type="file" class="form-control " name="profile" placeholder="">
                                   
                                </div>
                            </div>
                            <hr>

                                        <div class="row">
                                        <div class="col-sm-3"></div>
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-3"></div>
                                        <div class="col-sm-3 text-secondary">
                                            <input type="submit" name="pic" class="btn btn-compose px-4" value="Change Profile  ">
                                        </div>
                                        </div>

                    </form>

                  
                   
                  
                  <!-- footer -->
                
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <?php include("admin_scripts.php")  ?>
   </body>
</html>