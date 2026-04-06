
<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "db_lms");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch first 3 librarians
$sql = "SELECT * FROM users WHERE user_role = 'Librarian' LIMIT 3";
$result = $conn->query($sql);
?>

<!-- Trainers Index Section -->
<section id="trainers-index" class="section trainers-index">
  <div class="container">
    <div class="container section-title" data-aos="fade-up">
      <h2>Librarians</h2>
      <p>Active Librarians</p>
    </div><!-- End Section Title -->

    <div class="row">
      <?php
      $delay = 100;
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $name = $row['user_name'];
              $email = $row['user_email'];
              $profile = $row['user_profile']; // assuming it's something like "download.png"
              $role = $row['user_role'];

              // Default image if none is uploaded
              $imagePath = !empty($profile) ? "../../admin/uploads/$profile" : "assets/img/trainers/trainer-1.jpg";
      ?>
        <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
          <div class="member">
            <img src="<?= $imagePath ?>" class="img-fluid" alt="<?= $name ?>">
            <div class="member-content">
              <h4><?= $name ?></h4>
              <span><?= $role ?></span>
              <p><?= $email ?></p>
              <div class="social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      <?php
              $delay += 100;
          }
      } else {
          echo "<p>No librarians found.</p>";
      }
      ?>
    </div>
  </div>
</section><!-- /Trainers Index Section -->
