<!-- ==========counter start============= -->

<?php
    $conn = mysqli_connect("localhost", "root", "", "db_lms");

    // Total Available Books
    $book_query = "SELECT COUNT(*) as total_books FROM books WHERE status = 'Available'";
    $book_result = mysqli_query($conn, $book_query);
    $book_data = mysqli_fetch_assoc($book_result);

    // Total Librarians
    $librarian_query = "SELECT COUNT(*) as total_librarians FROM users where user_role='librarian'";
    $librarian_result = mysqli_query($conn, $librarian_query);
    $librarian_data = mysqli_fetch_assoc($librarian_result);

    // Total Members
    $member_query = "SELECT COUNT(*) as total_members FROM users where user_role='member'";
    $member_result = mysqli_query($conn, $member_query);
    $member_data = mysqli_fetch_assoc($member_result);
?>

<section id="counts" class="section counts light-background">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">

      <div class="col-lg-4 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <span data-purecounter-start="0" data-purecounter-end="<?php echo $book_data['total_books']; ?>" data-purecounter-duration="1" class="purecounter"></span>
          <p>Available Books</p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-4 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <span data-purecounter-start="0" data-purecounter-end="<?php echo $librarian_data['total_librarians']; ?>" data-purecounter-duration="1" class="purecounter"></span>
          <p>Librarians</p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-4 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <span data-purecounter-start="0" data-purecounter-end="<?php echo $member_data['total_members']; ?>" data-purecounter-duration="1" class="purecounter"></span>
          <p>Members</p>
        </div>
      </div><!-- End Stats Item -->

    </div>
  </div>
</section><!-- /Counts Section -->


<!-- ===========counter end========== -->
  