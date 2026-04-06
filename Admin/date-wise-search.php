
<?php  session_start();
$num=0; ?>
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
      <title>Librarian Profile Settings</title>
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


          <form action="" method="post">
                    <div class="row">
                                <div class="col-4"><h1>Users</h1></div>
                                <div class="col-8"> </div>
                    </div>
                    <div class="row mb-3">
                                <div class="col-sm-3 mt-5">

                                    <h6 class="mb-0">Select Date to see inserted User at that date</h6>
                                </div>
                                <div class="col-sm-6 text-secondary mt-5">
                                <input type="date" name="date" class="form-group form-control" style="height:100%;">

                                 </div>
                            <div class="col-sm-3 text-secondary mt-5">
                                     <input type="submit" name="view-user" class="btn btn-compose px-4" value="View Record">
                            </div>
                    </div>
                     <div class="row mb-5">
                                        <div class="col-sm-3"></div>
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-3"></div>
                                        <div class="col-sm-3 text-secondary">
                                        </div>
                                        </div>

                                        <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th >No</th>
                                                   <th >User Name</th> 
                                                   <th>User Role</th>
                                                   <th> Created at </th>
                                                   
                                                </tr>
                                             </thead>
                                             <tbody>



                                            <?php  
                                           
                                        if(isset($_POST['view-user'])):
                                         
                                            $conn=mysqli_connect("localhost","root","","db_lms");
                                            extract($_POST);
                                           
                                           $start = $date . " 00:00:00";
                                           $end   = $date . " 23:59:59";
                                       
                                           $sql = "SELECT * FROM users WHERE created_at BETWEEN '$start' AND '$end'";
                                            
                                            $res= mysqli_query($conn, $sql);
                                            $num=mysqli_num_rows($res);
                                        
                                            $sr=1;

                                            ?>
                                             <?php if($num== 0):   ?>
                                                    <div class="col-md-12">
                                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                                <strong>Warning!</strong> No User Found
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                </div>
                                            <?php endif;  ?>
                                            
                                            <?php  
                                            foreach($res as $row):
                                               
                                        
                                        

                                              ?>
                                                <tr>
                                               
                                                   <td><?php  echo $sr++; ?></td>
                                                   <td>
                                                      <?php
                                                    
                                                        echo $row['user_name']; ?>
                                                   </td>
                                                   <td> <?php
                                                        echo $row['user_role']; ?></td>
                                                 <td> <?php
                                                        echo $row['created_at']; ?></td>
                                                   
                                                   
                                                </tr>

                                                   <?php  endforeach;  endif;?>
    </tbody>
   </table>
                                       </div>
                                    </div>
                                 </div>

                    </form>
                    <hr>
                    <!-- ======================== -->
                     
          <form action="" method="post">
                    <div class="row">
                                <div class="col-4"><h1>Books</h1></div>
                                <div class="col-8"> </div>
                    </div>
                    <div class="row mb-3">
                                <div class="col-sm-3 mt-5">

                                    <h6 class="mb-0">Select Date to see inserted Book at that date</h6>
                                </div>
                                <div class="col-sm-6 text-secondary mt-5">
                                <input type="date" name="date" class="form-group form-control" style="height:100%;">

                                 </div>
                            <div class="col-sm-3 text-secondary mt-5">
                                     <input type="submit" name="view-books" class="btn btn-compose px-4" value="View Record">
                            </div>
                    </div>
                     <div class="row mb-5">
                                        <div class="col-sm-3"></div>
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-3"></div>
                                        <div class="col-sm-3 text-secondary">
                                        </div>
                                        </div>

                                        <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th >No</th>
                                                   <th >Book Title</th> 
                                                   <th>Book Status</th>
                                                   <th> Created At </th>
                                                   
                                                </tr>
                                             </thead>
                                             <tbody>



                                            <?php  
                                           
                                        if(isset($_POST['view-books'])):
                                            $conn=mysqli_connect("localhost","root","","db_lms");
                                            extract($_POST);
                                           
                                           $start = $date . " 00:00:00";
                                           $end   = $date . " 23:59:59";
                                       
                                           $sql = "SELECT * FROM books WHERE created_at BETWEEN '$start' AND '$end'";
                                            
                                            $res= mysqli_query($conn, $sql);
                                            $num=mysqli_num_rows($res);
                                            $sr=1;?>
                                            
                                            <?php if($num == 0):   ?>
                                                    <div class="col-md-12">
                                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                                <strong>warning!</strong> no Record Found                                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                </div>
                                            <?php endif;  ?>
                                            
                                            <?php
                                            foreach($res as $row):
                                               
                                        
                                        

                                              ?>
                                                <tr>
                                              
                                                   <td><?php  echo $sr++; ?></td>
                                                   <td>
                                                      <?php
                                                    
                                                        echo $row['book_title']; ?>
                                                   </td>
                                                   <td> <?php
                                                        echo $row['status']; ?></td>
                                                 <td> <?php
                                                        echo $row['created_at']; ?></td>
                                                   
                                                   
                                                </tr>

                                                   <?php  endforeach;  endif;?>
    </tbody>
   </table>
                                       </div>
                                    </div>
                                 </div>

                    </form>

<hr>

                    <!-- ====================== -->

                     <!-- ======================== -->
                     
          <form action="" method="post">
                    <div class="row">
                                <div class="col-4"><h1>Borrowed Books</h1></div>
                                <div class="col-8"> </div>
                    </div>
                    <div class="row mb-3">
                                <div class="col-sm-3 mt-5">

                                    <h6 class="mb-0">Select Date to see Borrowed Book at that date</h6>
                                </div>
                                <div class="col-sm-6 text-secondary mt-5">
                                <input type="date" name="date" class="form-group form-control" style="height:100%;">

                                 </div>
                            <div class="col-sm-3 text-secondary mt-5">
                                     <input type="submit" name="view-borrow-book" class="btn btn-compose px-4" value="View Record">
                            </div>
                    </div>
                     <div class="row mb-5">
                                        <div class="col-sm-3"></div>
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-3"></div>
                                        <div class="col-sm-3 text-secondary">
                                        </div>
                                        </div>

                                        <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th >No</th>
                                                   <th >Book Title</th> 
                                                   <th>Book Status</th>
                                                   <th>Member</th>
                                                   <th> Created At </th>
                                                   
                                                </tr>
                                             </thead>
                                             <tbody>



                                            <?php  
                                           
                                        if(isset($_POST['view-borrow-book'])):
                                            $conn=mysqli_connect("localhost","root","","db_lms");
                                            extract($_POST);
                                           
                                           $start = $date . " 00:00:00";
                                           $end   = $date . " 23:59:59";
                                       
                                           $sql = "SELECT * FROM borrowed_books bb join books b on  b.book_id=bb.book_id
                                           join users as u on u.user_id=bb.member_id
                                           WHERE bb.created_at BETWEEN '$start' AND '$end'";
                                            
                                            $res= mysqli_query($conn, $sql);
                                            $num=mysqli_num_rows($res);
                                            $sr=1;?>
                                            
                                            <?php if($num== 0):  ?>
                                                    <div class="col-md-12">
                                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                                <strong>warning!</strong> no Record Found                                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                </div>
                                            <?php endif;  ?>
                                            
                                            <?php
                                            foreach($res as $row):
                                               
                                        
                                        

                                              ?>
                                                <tr>
                                               
                                                   <td><?php  echo $sr++; ?></td>
                                                   <td>
                                                      <?php
                                                    
                                                        echo $row['book_title']; ?>
                                                   </td>
                                                  
                                                   <td> <?php
                                                        echo $row['status']; ?></td>
                                                         <td>
                                                      <?php
                                                    
                                                        echo $row['user_name']; ?>
                                                   </td>
                                                 <td> <?php
                                                        echo $row['created_at']; ?></td>
                                                   
                                                   
                                                </tr>

                                                   <?php  endforeach;  endif;?>
    </tbody>
   </table>
                                       </div>
                                    </div>
                                 </div>

                    </form>

<hr>

                    <!-- ====================== -->


                   <!-- ======================== -->
                     
          <form action="" method="post">
                    <div class="row">
                                <div class="col-4"><h1>Returned Books</h1></div>
                                <div class="col-8"> </div>
                    </div>
                    <div class="row mb-3">
                                <div class="col-sm-3 mt-5">

                                    <h6 class="mb-0">Select Date to see Returned Book at that date</h6>
                                </div>
                                <div class="col-sm-6 text-secondary mt-5">
                                <input type="date" name="date" class="form-group form-control" style="height:100%;">

                                 </div>
                            <div class="col-sm-3 text-secondary mt-5">
                                     <input type="submit" name="view-returned-book" class="btn btn-compose px-4" value="View Record">
                            </div>
                    </div>
                     <div class="row mb-5">
                                        <div class="col-sm-3"></div>
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-3"></div>
                                        <div class="col-sm-3 text-secondary">
                                        </div>
                                        </div>

                                        <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th >No</th>
                                                   <th >Book Title</th> 
                                                   <th>Book Status</th>
                                                   <th>Member</th>
                                                   <th> Created At </th>
                                                   
                                                </tr>
                                             </thead>
                                             <tbody>



                                            <?php  
                                           
                                        if(isset($_POST['view-returned-book'])):
                                            $conn=mysqli_connect("localhost","root","","db_lms");
                                            extract($_POST);
                                           
                                           $start = $date . " 00:00:00";
                                           $end   = $date . " 23:59:59";
                                       
                                           $sql = "SELECT * FROM returned_books bb join books b on  b.book_id=bb.book_id
                                           join users as u on u.user_id=bb.member_id
                                           WHERE bb.created_at BETWEEN '$start' AND '$end'";
                                            
                                            $res= mysqli_query($conn, $sql);
                                            $num=mysqli_num_rows($res);
                                            $sr=1;?>
                                             <?php if($num == 0):  ?>
                                                    <div class="col-md-12">
                                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                                <strong>warning!</strong> no Record Found                                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                </div>
                                            <?php endif;  ?>
                                            
                                            <?php
                                            
                                            foreach($res as $row):
                                               
                                        
                                        

                                              ?>
                                                <tr>
                                               
                                                   <td><?php  echo $sr++; ?></td>
                                                   <td>
                                                      <?php
                                                    
                                                        echo $row['book_title']; ?>
                                                   </td>
                                                  
                                                   <td> <?php
                                                        echo $row['status']; ?></td>
                                                         <td>
                                                      <?php
                                                    
                                                        echo $row['user_name']; ?>
                                                   </td>
                                                 <td> <?php
                                                        echo $row['created_at']; ?></td>
                                                   
                                                   
                                                </tr>

                                                   <?php  endforeach;  endif;?>
    </tbody>
   </table>
                                       </div>
                                    </div>
                                 </div>

                    </form>

<hr>

                    <!-- ====================== -->


                  
                  <!-- footer -->
                
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <?php include("admin_scripts.php")  ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    // Fetch columns when table changes
    $('#table').change(function() {
        var table = $(this).val();
        $.ajax({
            url: 'indexing-ajax.php',
            method: 'POST',
            data: { type: 'tables', val: table },
            success: function(data) {
                $('#cols').html(data);
            }
        });
    });

   
        });
  
</script>
<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


   </body>
</html>