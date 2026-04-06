<?php  session_start(); 
$res1=0;
$res2=0;

$res3=0;
$res4=0;
if(isset($_POST['issue'])){
   extract($_POST);
   $conn=mysqli_connect("localhost","root","","db_lms");
   $sql="update books set status='issued' where book_id=$book_id";
   $sql2="update borrowed_books set status = 'issued' where id=$request_id";
   $res1=mysqli_query($conn,$sql);
   $res2=mysqli_query($conn,$sql2);


}


if(isset($_POST['cancel'])){
   extract($_POST);
   $conn=mysqli_connect("localhost","root","","db_lms");
   $sql="update books set status='available' where book_id=$book_id";
   $sql2="update borrowed_books set status = 'available' where id=$request_id";
   $res3=mysqli_query($conn,$sql);
   $res4=mysqli_query($conn,$sql2);


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
      <title>Librarian | Borrow Requests</title>
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
                              <h2>All Books</h2>
                           </div>
                        </div>
                     </div>

                                          <!-- projects table start -->

                                          <div class="row column1">
                     
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Borrow Requests <small>( Listing All Requests )</small></h2>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                        <!-- alert start -->
                                <?php if($res1): ?>

                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> Book Issued Successfully!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif;  ?>

                                <?php if($res3): ?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Book Request Cancel Successfully!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif;  ?>

                                <!-- alert end -->
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th style="width: 2%">No</th>
                                                   <th style="width: 30%">Book Title</th>
                                                   <th style="width: 30%">Member </th>
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <tbody>

                                            <?php  
                                            $sr=1;
                                                 $conn=mysqli_connect("localhost","root","","db_lms");
                                                  $sql="SELECT bb.*,u.user_name,b.book_title FROM borrowed_books as bb 
                                                  join users as u on u.user_id=bb.member_id 
                                                  join books as b on bb.book_id=b.book_id 
                                                  where bb.status='Requested'
                                                  ";
                                                  $res_b=mysqli_query($conn,$sql);
                                                  $num=mysqli_num_rows($res_b);
                                                  if($num>0) {

                                                   while ($row=mysqli_fetch_assoc($res_b)) {
                                                   


                                              ?>
                                                <tr>
                                                   <td><?php  echo $sr++; ?></td>
                                                   <td>
                                                      <a><?php
                                                        echo $row['book_title']; ?></a>
                                                   </td>
                                                   <td><?php
                                                        echo $row['user_name']; ?></td>
                                                   <td>
                                                       
                                                       <?php if($row['status'] == 'issued'): ?>
                                                      <button class="btn btn-success" disabled>Issued</button>
                                                         <?php else: ?>
                                                            <form action="" method="post">
                                                               <input type="submit" class="btn btn-primary" name="issue" value="Issue Book">
                                                               <input type="submit" class="btn btn-danger" name="cancel" value="Cancel Request">
                                                               <input type="hidden" value="<?php echo $row['id']; ?>" name="request_id">
                                                               <input type="hidden" value="<?php echo $row['book_id']; ?>" name="book_id">
                                                            </form>
                                                         <?php endif; ?>

                                                   </td>
                                                   
                                                   
                                                </tr>


                                             <?php 
                                              }

                                                   }

                                               ?>
                                               
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end row -->
                     </div>


                     <!-- librarians table end -->
                    
                    
                     
                  
                  <!-- footer -->
                
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <?php include("admin_scripts.php")  ?>
   </body>
</html>