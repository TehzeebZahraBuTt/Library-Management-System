<?php  session_start(); 
$conn=mysqli_connect("localhost","root","","db_lms");
$searchF="";

if(isset($_POST['search'])){
  $searchF=$_POST['searchF'];

   
}
$r=0;
if(isset($_GET['id'])){
   $id=$_GET['id'];
   $s="delete from users where user_id=$id";
   $r=mysqli_query($conn,$s);
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
      <title>Admin | View Members</title>
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
                              <h2>All Members</h2>
                           </div>
                        </div>
                     </div>

                                          <!-- projects table start -->

                                          <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                           <?php if($r): ?>

                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          <strong>Success!</strong> Member Deleted Successfully!
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                    </div>
                                    <?php endif;  ?>
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Members <small>( Listing All Members )</small></h2>
                                 </div>
                                 <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                    <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                                    <form method="post" action="">
                                       <div class="input-group">
                                          
                                          <div class="input-group-prepend">
                                          <button type="submit" class="btn btn-search pe-1" name="search">
                                             <i class="fa fa-search search-icon"></i>
                                          </button>
                                          </div>
                                          <input
                                          type="text"
                                          placeholder="Search ..."
                                          class="form-control"
                                          name="searchF"
                                          />
                                       </div>
                                    </form>
                                    </nav>
                                    </div>
                                  </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th style="width: 2%">No</th>
                                                   <th style="width: 30%">Member Name</th>
                                                   <th>Member Email</th>
                                                   
                                                   <th>Actions</th>
                                                </tr>
                                             </thead>
                                             <tbody>

                                            <?php  
                                            $sr=1;
                                                 $conn=mysqli_connect("localhost","root","","db_lms");
                                                 if(isset($_POST['search'])){
                                                   $sql="SELECT * FROM users where user_role ='member' and user_name LIKE '$searchF%' OR user_email LIKE '$searchF%'  ORDER BY user_name ASC";

                                                 }else{
                                                   $sql="SELECT * FROM users where user_role ='member'";

                                                 }
                                                  $res=mysqli_query($conn,$sql);
                                                  $num=mysqli_num_rows($res);
                                                  if($num>0) {

                                                   while ($row=mysqli_fetch_assoc($res)) {
                                                   


                                              ?>
                                                <tr>
                                                   <td><?php  echo $sr++; ?></td>
                                                   <td>
                                                      <a><?php
                                                        echo $row['user_name']; ?></a>
                                                   </td>
                                                   <td>
                                                      <?php
                                                        echo $row['user_email']; ?>
                                                   </td>
                                                   
                                                   <td>
                                                   <a href="edit-member.php?id=<?php  echo $row['user_id']; ?>" class=" fa fa-edit btn btn-primary"></a>
                                                      <a href="view-member.php?id=<?php  echo $row['user_id']; ?>" class=" fa fa-eye btn btn-success"></a>
                                                      <a href="view-members.php?id=<?php  echo $row['user_id']; ?>" class=" fa fa-trash btn btn-danger"></a>
                                                      
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