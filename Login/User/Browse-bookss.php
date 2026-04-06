
<?php session_start() ; 
$search="";
if(isset($_POST['search'])){
$search=$_POST['searchF'];
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Book Details</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/logo-lib.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>  



  <!-- =======================================================
  * Template Name: Mentor
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="course-details-page">

  <?php include("header.php")  ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>All Available Books</h1>
              <p class="mb-0">Listing All Available Books</p>
             
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <form action="" method="post">
              <div class="">
              <input type="text" name="searchF" class="" style="width:50%;padding:  7px;border:none;border-radius:4%">
              <input type="submit" name="search" class="btn btn-success " value="Search" width="20%">
             </div>
             </form>
             
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="Home.php">Home</a></li>
            <li class="current">Available Books</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
   
    <!-- Courses Course Details Section -->
    <section id="courses-course-details" class="courses-course-details section">

      <div class="container" data-aos="fade-up">

<div class="row">
  <div class="col-lg-2"></div>
<div class="col-lg-8">
  <table class="table display hover" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Book Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 


$conn = mysqli_connect("localhost", "root", "", "db_lms");

if ($conn) {
  if(isset($_POST['search'])){
    $query = "
      SELECT books.*, book_categories.cat_name 
      FROM books 
      JOIN book_categories ON books.book_category = book_categories.cat_id 
      WHERE books.status = 'Available' and books.book_title like '$search%'
      ORDER BY books.created_at DESC 
     
";
  }else{
  $query = "
  SELECT books.*, book_categories.cat_name 
  FROM books 
  JOIN book_categories ON books.book_category = book_categories.cat_id 
  WHERE books.status = 'Available'
  ORDER BY books.created_at DESC 
 
";
}

  $result = mysqli_query($conn, $query);
$sr=1;
  while ($book = mysqli_fetch_assoc($result)) {

?>


    <tr>
      <th scope="row"><?php   echo $sr++; ?></th>
      <td><?php echo $book['book_title']; ?></td>
      <td><?php echo substr($book['book_desc'],0,50)."..."; ?></td>
      <td><a href="desc-details.php?id=<?php echo $book['book_id']; ?>" class="btn-getstarted btn btn-success">View More >></a>
      </td>
    </tr>
    <?php
        }
      } else {
        echo "<p class='text-danger'>Failed to connect to the database.</p>";
      }
    ?>
  </tbody>
</table>
    </div>
    <div class="col-lg-2"></div>   
        </div>
        </div>

    </section><!-- /Courses Course Details Section -->

     
  
  </main>

  <?php include("footer.php")  ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    $(document).ready(function() {
        $('#myTable').DataTable({
          paging: true,       // Enable pagination
          searching: true,    // Enable search/filter box
          ordering: true,     // Enable sorting
          info: true          // Show "Showing X to Y of Z entries"
        });
    });
  </script>

</body>

</html>