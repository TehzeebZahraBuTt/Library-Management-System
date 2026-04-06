

<?php
session_start();
$m_id=0;
$b_id=0;
$res=0;
if((isset($_GET['b_id']) &&  isset($_GET['m_id']))){

$b_id=$_GET['b_id'];
$m_id=$_GET['m_id'];
}
$conn=mysqli_connect("localhost","root","","db_lms");

if (isset($_POST['save'])) {
 
  $book_id = $_POST['book_id'];
  $member_id = $_POST['member_id'];
  $borrow_date = $_POST['borrow_date'];
  $return_date = $_POST['return_date'];
  $actual_return=$_POST['actual_return'];
  $notes = $_POST['notes'];

  // =============
  // Dates
$borrow_date = $_POST['borrow_date'];
$return_date = $_POST['return_date']; // Expected return date from borrowed_book
$actual_return_date = date('Y-m-d');   // Today
$fine_amount = 0;

$expected = new DateTime($return_date);
$actual = new DateTime($actual_return_date);

if ($actual > $expected) {
    $interval = $expected->diff($actual)->days;
    $fine_amount = $interval * 10; // Rs. 10 per day
}


  // ===========

  $sql = "INSERT INTO returned_books ( book_id, member_id, borrow_date, returned_date,actual_return,fine_amount, notes)
          VALUES ('$book_id', '$member_id', '$borrow_date', '$return_date','$actual_return','$fine_amount', '$notes')";
  $sql2=" update books set status ='available' where book_id=$book_id";
  $sql3=" update borrowed_books set status ='returned' where book_id=$book_id and member_id=$m_id";
 $res=mysqli_query($conn, $sql);
 $res=mysqli_query($conn, $sql2);
 $res=mysqli_query($conn, $sql3);

}


?>








<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Contact - Mentor Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
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

<body class="contact-page">

 <?php include("header.php")  ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Return Book</h1>
              <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="Home.php">Home</a></li>
            <li class="current">Contact</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

<?php 
 $qu="select * from borrowed_books where member_id=$m_id and book_id=$b_id";
 $returned=mysqli_query($conn,$qu);
 foreach($returned as $r):
 

?>

    <!-- =========== -->
    <section id="borrow" class="contact section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="section-header text-center">
      <h2 class="mb-4 mt-4">📚 Return Book</h2>
      <p>Fill out the form below to Return book borrowed from our library collection.</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-10">
        <form action="" method="post" class=" p-4 rounded shadow bg-light" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-3">
          <?php if($res): ?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success! </strong> Book returned Successfully!
      
 </div>
<?php endif;  ?>
<!-- ============== -->
<?php if($res): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Book returned successfully.<br>
      <?php if($fine_amount > 0): ?>
        You have a fine of Rs. <?php echo $fine_amount; ?> for late return.
      <?php else: ?>
        No fine. Thank you for returning on time!
      <?php endif; ?>
      
       
      </button>
    </div>
<?php endif; ?>


<!-- ============= -->
            <div class="col-md-6">
              <label for="name">Full Name</label>
              <input type="text" name="name" class="form-control" required value="<?php echo $_SESSION['name'] ;?>">
            </div>

            

            <div class="col-md-6">
              <label for="book_id">Book ID / Title</label>
              <input type="text" name="book_id" class="form-control" placeholder="e.g. DB1122CMP or 'Database'" required value="<?php echo $b_id;  ?>" readonly>
            </div>

            <div class="col-md-6">
              <label for="member_id">Member ID</label>
              <input type="text" name="member_id" class="form-control" required value="<?php echo $m_id;  ?>" readonly>
            </div>

            <div class="col-md-6">
              <label for="borrow_date">Borrow Date</label>
              <input type="date" name="borrow_date" class="form-control" required value="<?php echo $r['borrow_date']; ?>">
            </div>

            <div class="col-md-6">
              <label for="return_date">Expected Return Date</label>
              <input type="date" name="return_date" class="form-control" required value="<?php echo $r['return_date']; ?>">
            </div>

            <div class="col-md-6">
              <label for="email">Actual Return Date</label>
              <input type="date" name="actual_return" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>

            </div>

            <div class="col-md-12">
              <label for="notes">Notes (Optional)</label>
              <textarea class="form-control" name="notes" rows="4" placeholder="Any additional message..."></textarea>
            </div>

            <div class="col-md-12 text-center">
              <input type="submit" class="btn btn-success px-4" value="Return Book" name="save">
            </div>
<?php  endforeach; ?>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

     <!-- =========== -->
  </main>

  <?php  include("footer.php") ?>

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