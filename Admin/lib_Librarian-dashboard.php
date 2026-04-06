<?php  session_start();  ?>


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
      <title>Librarian Dashboard</title>
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
                              <h2>Librarian Dashboard</h2>
                           </div>
                        </div>
                     </div>
                     <!-- Librarian Section -->

                
               </div>


               <!-- end dashboard inner -->
<div class="row">
  
</div>
<?php
    $conn = mysqli_connect("localhost", "root", "", "db_lms");

    // Total Available Books
    $book_query = "SELECT COUNT(*) as total_books FROM books WHERE status = 'Available'";
    $book_result = mysqli_query($conn, $book_query);
    $book_data = mysqli_fetch_assoc($book_result);

   
    // Total Available Books
    $book_query2 = "SELECT COUNT(*) as total_issued FROM books WHERE status = 'issued'";
    $book_result2 = mysqli_query($conn, $book_query2);
    $book_data2 = mysqli_fetch_assoc($book_result2);

    // Total Members
    $member_query = "SELECT COUNT(*) as total_members FROM users where user_role='member'";
    $member_result = mysqli_query($conn, $member_query);
    $member_data = mysqli_fetch_assoc($member_result);

      // Total Requested Books
      $book_query3 = "SELECT COUNT(*) as total_requested FROM books WHERE status = 'Requested'";
      $book_result3 = mysqli_query($conn, $book_query3);
      $book_data3 = mysqli_fetch_assoc($book_result3);
?>

<div class="row"  style="background: linear-gradient(135deg, #15283c, #185a9d); color: #fff; padding: 25px; border-radius: 20px; box-shadow: 0 8px 16px rgba(0,0,0,0.15);">
                       <div class="col-md-4 col-lg-4 mt-5">
                           <div class="full counter_section margin_bottom_30 margin_top_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-unlock-alt purple_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no"><?php echo $book_data3['total_requested']; ?></p>
                                    <p class="head_couter">Requested Books</p>
                                 </div>
                              </div>
                           </div>
                        </div>  


                        <div class="col-md-4 col-lg-4 mt-5">
                           <div class="full counter_section margin_bottom_30 margin_top_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-book blue1_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no"><?php echo $book_data['total_books']; ?></p>
                                    <p class="head_couter"> Avaialable Books</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-4 mt-5">
                           <div class="full counter_section margin_bottom_30 margin_top_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-check-square green_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no"><?php echo $book_data2['total_issued']; ?></p>
                                    <p class="head_couter">Issued Books</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-4 ">
                           <div class="full counter_section margin_bottom_30 margin_top_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-user yellow_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no"><?php echo $member_data['total_members']; ?></p>
                                    <p class="head_couter">Members</p>
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
      <?php include("admin_scripts.php")  ?>
   </body>
</html>