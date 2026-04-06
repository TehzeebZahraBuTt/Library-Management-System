
   
<!-- Books Section -->
<section id="courses" class="courses section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Books</h2>
  <p>Top 3 Available Books</p>
</div><!-- End Section Title -->

<div class="container">
  <div class="row">
    <?php 
      $conn = mysqli_connect("localhost", "root", "", "db_lms");

      if ($conn) {
        $query = "
        SELECT books.*, book_categories.cat_name 
        FROM books 
        JOIN book_categories ON books.book_category = book_categories.cat_id 
        WHERE books.status = 'Available' 
        ORDER BY books.created_at DESC 
        LIMIT 3
";

        $result = mysqli_query($conn, $query);

        while ($book = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
      <div class="course-item">
      <img src="../../Admin/uploads/<?php echo $book['book_cover']; ?>" class="img-fluid" alt="Book Cover">
      <div class="course-content">
          <div class="d-flex justify-content-between align-items-center mb-3">
            
            <p class="category"><?php echo $book['cat_name']; ?></p>
            <p class="price"><?php echo $book['book_pb_year']; ?></p>
          </div>

          <h3><a href="desc-details.php?id=<?php echo $book['book_id']; ?>"><?php echo $book['book_title']; ?></a></h3>
          <p class="description"><?php echo substr($book['book_desc'], 0, 120); ?>...</p>
          <div class="trainer d-flex justify-content-between align-items-center">
            <div class="trainer-profile d-flex align-items-center">
              <img src="assets/img/trainers/trainer-1-2.jpg" class="img-fluid" alt="">
              <a href="#" class="trainer-link"><?php echo $book['book_author']; ?></a>
            </div>
            <div class="trainer-rank d-flex align-items-center">
              <i class="bi bi-book"></i>&nbsp;ISBN: <?php echo $book['book_isbn']; ?>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Book Card -->
    <?php
        }
      } else {
        echo "<p class='text-danger'>Failed to connect to the database.</p>";
      }
    ?>
  </div>
</div>
</section><!-- /Books Section -->



    <!-- ================end============ -->