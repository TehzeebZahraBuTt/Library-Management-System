<?php 
session_start(); 
$search = "";
$id=0;
$n="";

if (isset($_POST['search'])) {
  $search = $_POST['searchF'];
} elseif (isset($_GET['searchF'])) {
  $search = $_GET['searchF'];
}

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $n=$_GET['n'];
}

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Book Details</title>

  <!-- Favicons -->
  <link href="assets/img/logo-lib.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins&family=Raleway&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="course-details-page">
<?php include("header.php") ?>

<main class="main">

  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1><?php echo $n;   ?> Available Books</h1>
            <p class="mb-0">Listing All  <?php echo $n." ";   ?> Available Books</p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <form action="" method="post">
              <input type="text" name="searchF" style="width:50%;padding:7px;border:none;border-radius:4%" value="<?php echo htmlspecialchars($search); ?>">
              <input type="submit" name="search" class="btn btn-success" value="Search">
            </form>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="Home.php">Home</a></li>
          <li class="current"> <?php echo $n." ";   ?>Available Books</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <?php 
  $conn = mysqli_connect("localhost", "root", "", "db_lms");

  if ($conn) {
    $results_per_page = 3;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start_from = ($page - 1) * $results_per_page;

    if (!empty($search)) {
      $query = "
        SELECT books.*, book_categories.cat_name 
        FROM books 
        JOIN book_categories ON books.book_category = book_categories.cat_id 
        WHERE books.status = 'Available' and books.book_category=$id AND books.book_title LIKE '%$search%' 
        ORDER BY books.created_at DESC 
        LIMIT $start_from, $results_per_page
      ";
      $count_query = "
        SELECT COUNT(*) AS total 
        FROM books 
        WHERE status = 'Available' and book_category=$id AND book_title LIKE '%$search%'
      ";
    } else {
      $query = "
        SELECT books.*, book_categories.cat_name 
        FROM books 
        JOIN book_categories ON books.book_category = book_categories.cat_id 
        WHERE books.status = 'Available'  and books.book_category=$id
        ORDER BY books.created_at DESC 
        LIMIT $start_from, $results_per_page
      ";
      $count_query = "
        SELECT COUNT(*) AS total 
        FROM books 
        WHERE status = 'Available' and book_category=$id
      ";
    }

    $count_result = mysqli_query($conn, $count_query);
    $row = mysqli_fetch_assoc($count_result);
    $total_records = $row['total'];
    $total_pages = ceil($total_records / $results_per_page);

    $result = mysqli_query($conn, $query);

    while ($book = mysqli_fetch_assoc($result)) {
  ?>

  <!-- Course Detail Section -->
  <section id="courses-course-details" class="courses-course-details section">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-8">
          <h3><?php echo $book['book_title']; ?></h3>
          <p><?php echo substr($book['book_desc'], 0, 120); ?>...</p>
        </div>
      </div>
      <a href="desc-details.php?id=<?php echo $book['book_id']; ?>" class="btn-getstarted btn btn-success">View More >></a>
    </div>
  </section>

  <?php } ?>

  <!-- Pagination -->
  <div class="container mt-4 mb-4">
    <nav>
      <ul class="pagination justify-content-center ">
        <?php 
        for ($i = 1; $i <= $total_pages; $i++) {
          $active = $i == $page ? "btn btn-success" : "";
          $url = "?page=$i";
          if (!empty($search)) {
            $url .= "&search=1&searchF=" . urlencode($search);
          }
          echo "<li class='page-item $active'><a class='page-link  text-success' href='$url' >$i</a></li>";
        }
        ?>
      </ul>
    </nav>
  </div>

  <?php 
  } else {
    echo "<p class='text-danger'>Failed to connect to the database.</p>";
  }
  ?>

</main>

<?php include("footer.php") ?>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

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
