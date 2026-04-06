<?php  
$res=0;
session_start();
if(isset($_POST['save'])){

    $conn=mysqli_connect("localhost","root","","db_lms");
    extract($_POST);
    $sql="insert into users(user_name,user_email,user_password,user_role) values('$name','$email','$password','$role')";
    $res=mysqli_query($conn,$sql);
    // header("location:view-librarians.php");
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
      <title>Admin | Add Member</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <?php include("admin_css.php")  ?>
      <style type="text/css">
      

   .register{
    /* background: #15283c; */
    background: white;
    margin-top: 3%;
    padding: 3%;
    padding-left: 250px;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;

}

.register-right{
    /* background: white; */
    background: #15283c;

    
}

@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 5%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color:rgb(255, 255, 255);
}
label{
    color:white;
}

    </style>
     
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
                              <h2>Add New Member</h2>
                           </div>
                        </div>
                     </div>
                      <!-- form start -->
                      <div class="container register mt-0">
                <div class="row">
                   
                    <div class="col-md-9 register-right">
                        
                        <div class="tab-content" id="myTabContent">
                          <form action="" method="POST" enctype="multipart/form-data">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                                <!-- alert start -->
                                <?php if($res): ?>

                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                      <strong>Success!</strong> Member Added Successfully!
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                 </div>
                             <?php endif;  ?>

<!-- alert end -->
                                <h3 class="register-heading"> Register Member </h3>
                                <div class="row register-form">

                                    <div class="col-md-12">
                                        <hr>
                                        <div class="form-group">
                                          <label>Name<sup style="color: red;">*</sup></label>
                                            <input type="text" class="form-control" placeholder="Name" value="" name="name" />
                                        </div>
                                         
                                        <div class="form-group">
                                          <label>Email<sup style="color: red;">*</sup></label>
                                            <input type="email" class="form-control" placeholder="Email" value="" name="email" />
                                        </div>
                                        <div class="form-group">
                                          <label>Password<sup style="color: red;">*</sup></label>
                                            <input type="password" class="form-control" placeholder="Password" value="" name="password" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label> Role<sup style="color: red;">*</sup></label>
                                            <select class="form-control form-control-md" name="role" id="skills">
                                             <option>--Select Role--</option>
                                             <option value="Member">Member</option>
                                             <option value="Librarian">Librarian</option>
                                            
                                            </select>
                                            
                                        </div>

                                        
                                        <div class="form-group">
                                          <label><sup style="color: red;"></sup></label>
                                            <input type="submit" class="btn btn-compose" value="Register Member" name="save" />
                                        </div>

                                        
                                       
                                        
                                    </div>
                                    
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
                

            </div>


                    <!-- form end -->
                  
                  <!-- footer -->
                
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <?php include("admin_scripts.php")  ?>
   </body>
</html>