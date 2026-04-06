<?php  
$res=0;
$conn=mysqli_connect("localhost","root","","db_lms");
session_start();
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
if(isset($_POST['save'])){

   
    extract($_POST);
    $sql="update book_categories set cat_name='$name'  where cat_id='$id'";
    $res=mysqli_query($conn,$sql);
    if($res==1){
        header("location:view-books-categories.php");
    }
   
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
      <title>Admin | Edit Librarian</title>
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
                              <h2>Update Categories Information</h2>
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
                                      <strong>Success!</strong>Category Information Updated Successfully!
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                 </div>
                             <?php endif;  ?>

<!-- alert end -->
                                <h3 class="register-heading"> Update Category Info</h3>
                                <div class="row register-form">

                                    <div class="col-md-12">
                                        <hr>
                                        <?php if(isset($_GET['id'])){
                                        $id=$_GET['id'];
                                        $q="select * from book_categories where cat_id=$id";
                                        $user=mysqli_query($conn,$q);
                                        foreach($user as $u){?>
                                        <div class="form-group">
                                          <label>Category name<sup style="color: red;">*</sup></label>
                                            <input type="text" class="form-control" placeholder="Category name" value="<?php echo $u['cat_name'] ; ?>" name="name" />
                                        </div>
                                        <div class="form-group">
                                          <label><sup style="color: red;"></sup></label>
                                            <input type="submit" class="btn btn-compose" value="Update category Info" name="save" />
                                            <br><br>
                                            <a href="view-books-categories.php" class="btn btn-compose" value="Cancel" >Cancel</a>
                                        </div>

                                     
                                        <?php }
                                            }
                                         ?>             
                                        
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