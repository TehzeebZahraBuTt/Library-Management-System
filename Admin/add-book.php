<?php  
$res=0;
$src="";
session_start();
if(isset($_POST['save'])){

    $conn=mysqli_connect("localhost","root","","db_lms");
    extract($_POST);
    $filename=$_FILES['book_cover']['name'];
    $tmp_name=$_FILES['book_cover']['tmp_name'];
    $file=$_FILES['book_cover']['tmp_name'];

    // Get original dimensions
    list($width, $height) = getimagesize($file);

    // New dimensions
    $new_width = 555; // width you want
    $new_height =370; // keep aspect ratio

    $file_type = $_FILES['book_cover']['type']; // Get the MIME type
    
    if($file_type == "image/jpeg" || $file_type == "image/jpg"){
        $src = imagecreatefromjpeg($file); // use imagecreatefrompng() for PNGs
    } elseif($file_type == "image/png"){
        $src = imagecreatefrompng($file); // use imagecreatefrompng() for PNGs
    } else {
        echo "Unsupported file type!";
        exit;
    }

    // Load the uploaded image
   

    // Create a blank image with new size
    $dst = imagecreatetruecolor($new_width, $new_height);

    // Resize
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    // Save the resized image
    imagejpeg($dst,  'uploads/'.$filename); // save wherever you want

    // Free up memory
    imagedestroy($src);
    imagedestroy($dst);

    
    // $res1=move_uploaded_file($tmp_name, 'uploads/'.$filename);
  
    $sql="insert into books(book_title,book_author,book_isbn,book_publisher	,book_pb_year,book_cover,book_category,book_language,book_desc,status,added_by) values('$title','$author','$isbn','$publisher','$pb_year','$filename','$categories','$language','$book_desc','$status','$added_by')";
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
      <title>Admin | Add Book</title>
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
                              <h2>Add New Book</h2>
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
                                      <strong>Success!</strong>New Book Added Successfully!
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                 </div>
                             <?php endif;  ?>

<!-- alert end -->
                                <h3 class="register-heading"> Add New Book </h3>
                                <div class="row register-form">

                                    <div class="col-md-12">
                                        <hr>
                                        <div class="form-group">
                                          <label>Book Title<sup style="color: red;">*</sup></label>
                                            <input type="text" class="form-control" placeholder="Book Title" value="" name="title" />
                                        </div>
                                        <div class="form-group">
                                          <label>Book Publisher<sup style="color: red;">*</sup></label>
                                            <input type="text" class="form-control" placeholder="Book Publisher" value="" name="publisher" />
                                        </div>
                                        <div class="form-group">
                                          <label>Book Publication Year<sup style="color: red;">*</sup></label>
                                            <input type="text" class="form-control" placeholder="Publication Year" value="" name="pb_year" />
                                        </div>
                                        <div class="form-group">
                                          <label>Book Language<sup style="color: red;">*</sup></label>
                                            <input type="text" class="form-control" placeholder="Book Language" value="" name="language" />
                                        </div>
                                        <div class="form-group">
                                          <label>Added By<sup style="color: red;">*</sup></label>
                                            <input type="text" class="form-control" placeholder="Added By" value="<?php echo $_SESSION['role']; ?>" name="added_by" readonly />
                                        </div>
                                         
                                        <div class="form-group">
                                          <label>Book Author<sup style="color: red;">*</sup></label>
                                            <input type="text" class="form-control" placeholder="Book Author" value="" name="author" />
                                        </div>
                                        <div class="form-group">
                                          <label>Book ISBN<sup style="color: red;">*</sup></label>
                                            <input type="text" class="form-control" placeholder="Book ISBN" value="" name="isbn" />
                                        </div>
                                        <div class="form-group">
                                          <label>Book Cover<sup style="color: red;">*</sup></label>
                                            <input type="file" class="form-control" placeholder="Book Cover" value="" name="book_cover" />
                                        </div>
                                        <div class="form-group">
                                          <label>Book Description<sup style="color: red;">*</sup></label>
                                          <textarea class="form-control" rows="5" placeholder="Enter description..." style="height: 200px; overflow-y: auto;" name="book_desc"></textarea>
                                          </div>
                                        <div class="form-group">
                                            <label> Book status<sup style="color: red;">*</sup></label>
                                            <select class="form-control form-control-md" name="status">
                                            <option>--Select Status--</option>
                                            
                                             <option value="available">Available</option>
                                             <option value="issued">Issued</option>
                                             <option value="reserved">Reserved</option>
                                             <option value="removed">Removed </option>
                                          
                                            </select>
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label> Book Category<sup style="color: red;">*</sup></label>
                                            <select class="form-control form-control-md" name="categories">
                                            <option>--Select Category--</option>
                                             <?php 
                                             $conn=mysqli_connect("localhost","root","","db_lms");
                                              $q="select * from book_categories";
                                              $cats=mysqli_query($conn,$q);
                                              foreach($cats as $c): ?>
                                            
                                             <option value="<?php echo $c['cat_id']; ?>"><?php echo $c['cat_name']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                            
                                        </div>

                                        
                                        <div class="form-group">
                                          <label><sup style="color: red;"></sup></label>
                                            <input type="submit" class="btn btn-compose" value="Add New Book" name="save" />
                                        </div>

                                        
                                       
                                        
                                    </div>
                                    
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
                

            </div>

               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <?php include("admin_scripts.php")  ?>
   </body>
</html>