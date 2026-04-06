<?php  session_start(); 
$res=0;
if(isset($_POST['issue'])){
   extract($_POST);
   $conn=mysqli_connect("localhost","root","","db_lms");
   $sql="update books set status='issued' where book_id=$book_id";
   $sql2="update borrowed_books set status = 'issued' where id=$request_id";
   $res=mysqli_query($conn,$sql);
   $res=mysqli_query($conn,$sql2);


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
                              <h2>All Issued Books</h2>
                           </div>
                        </div>
                     </div>

                                          <!-- projects table start -->

                                          <div class="row column1">
                     
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2> Issued Books <small>( Listing All Issued Books )</small></h2>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                        <!-- alert start -->
                               

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
                                                  where b.status='issued' and bb.status='issued'
                                                  ";
                                                  $res=mysqli_query($conn,$sql);
                                                  $num=mysqli_num_rows($res);
                                                  if($num>0) {

                                                   while ($row=mysqli_fetch_assoc($res)) {
                                                   


                                              ?>
                                                <tr>
                                                   <td><?php  echo $sr++; ?></td>
                                                   <td>
                                                      <a><?php
                                                        echo $row['book_title']; ?></a>
                                                   </td>
                                                   <td><?php
                                                        echo $row['user_name']; ?></td>
                                                   <td class="text-success">
                                                        <strong>Issued</strong>
                
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