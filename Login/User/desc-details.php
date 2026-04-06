
<?php 
session_start();
if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$conn = mysqli_connect("localhost", "root", "", "db_lms");

if ($conn) {
  $query = "
  SELECT books.*, book_categories.cat_name 
  FROM books 
  JOIN book_categories ON books.book_category = book_categories.cat_id 
  WHERE books.book_id = $id 
  ORDER BY books.created_at DESC 
  LIMIT 3
";

  $result = mysqli_query($conn, $query);

  while ($book = mysqli_fetch_assoc($result)) {

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
              <h1>Book Details</h1>
              <p class="mb-0"><?php echo substr($book['book_desc'], 0, 120); ?>...</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="Home.php">Home</a></li>
            <li class="current">Book Details</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Courses Course Details Section -->
    <section id="courses-course-details" class="courses-course-details section">

      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="../../Admin/uploads/<?php echo $book['book_cover']; ?>" class="img-fluid" alt="">
            <h3><?php echo $book['book_title']; ?></h3>
            <p>
            <?php echo $book['book_desc']; ?>
             </p>
          </div>
          <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Book Author</h5>
              <p><a href="#"> <?php echo $book['book_author']; ?></a></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5> Book ISBN </h5>
              <p><?php echo $book['book_isbn']; ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Book Publisher</h5>
              <p><?php echo $book['book_publisher']; ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Book publication Year</h5>
              <p><?php echo $book['book_pb_year']; ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Book Category </h5>
              <p><?php echo $book['cat_name']; ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Book  Language</h5>
              <p><?php echo $book['book_language']; ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Book Status </h5>
              <p><?php echo $book['status']; ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Added By</h5>
              <p><?php echo $book['added_by']; ?></p>
            </div>

          </div>
        </div>
        <a href="Borrow-book.php?b_id=<?php echo $book['book_id']; ?>&m_id=<?php echo $_SESSION['id']; ?>" class="btn-getstarted btn btn-success">Borrow Book</a>
        </div>

    </section><!-- /Courses Course Details Section -->

     
    <?php
        }
      } else {
        echo "<p class='text-danger'>Failed to connect to the database.</p>";
      }
    ?>
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

</body>

</html>