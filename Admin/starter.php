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
      <title> Admin Dashboard</title>
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
                              <h2>Admin Dashboard</h2>
                           </div>
                        </div>
                     </div>
                     <!-- Welcome Section for Admin -->
                     <div class="row">
   <div class="col-md-12">
      <!-- <div style="background: linear-gradient(135deg, #15283c, #185a9d); color: #fff; padding: 25px; border-radius: 20px; box-shadow: 0 8px 16px rgba(0,0,0,0.15);">
         <h3 style="color:white">📘 Admin Panel</h3>
         <p style="font-size: 15px;">Manage books, Librarians, and users .</p>
         <ul style="list-style-type: none; padding-left: 0;">
            <li>🔍 Search and update book details</li>
            <li>📅 View borrowing history</li>
            <li>💬 Add Books and Books Categories</li>
         </ul>
     </div> -->
   </div>
</div>
<?php
    $conn = mysqli_connect("localhost", "root", "", "db_lms");

    // Total Available Books
    $book_query = "SELECT COUNT(*) as total_books FROM books WHERE status = 'Available'";
    $book_result = mysqli_query($conn, $book_query);
    $book_data = mysqli_fetch_assoc($book_result);

    // Total Requested Books
    $book_query3 = "SELECT COUNT(*) as total_requested FROM books WHERE status = 'Requested'";
    $book_result3 = mysqli_query($conn, $book_query3);
    $book_data3 = mysqli_fetch_assoc($book_result3);

   
    // Total Available Books
    $book_query2 = "SELECT COUNT(*) as total_issued FROM books WHERE status = 'issued'";
    $book_result2 = mysqli_query($conn, $book_query2);
    $book_data2 = mysqli_fetch_assoc($book_result2);

    // Total Members
    $member_query = "SELECT COUNT(*) as total_members FROM users where user_role='member'";
    $member_result = mysqli_query($conn, $member_query);
    $member_data = mysqli_fetch_assoc($member_result);

    // Total librarians
    $member_query1 = "SELECT COUNT(*) as total_librarians FROM users where user_role='librarian'";
    $member_result1 = mysqli_query($conn, $member_query1);
    $lib_data = mysqli_fetch_assoc($member_result1);
?>

<div class="row mt-5" style="background: linear-gradient(135deg, #15283c, #185a9d); color: #fff; padding: 25px; border-radius: 20px; box-shadow: 0 8px 16px rgba(0,0,0,0.15);">
                        
                        <div class="col-md-4 col-lg-4  mt-5">
                           <div class="full counter_section margin_bottom_30">
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
                        <div class="col-md-4 col-lg-4  mt-5">
                           <div class="full counter_section margin_bottom_30">
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

                        <div class="col-md-4 col-lg-4  mt-5">
                           <div class="full counter_section margin_bottom_30">
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
                           <div class="full counter_section margin_bottom_30">
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
                        <div class="col-md-4 col-lg-4 mt-5">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-user red_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no"><?php echo $lib_data['total_librarians']; ?></p>
                                    <p class="head_couter">Librarians</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
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