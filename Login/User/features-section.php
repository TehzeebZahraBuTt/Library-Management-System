<!-- Features Section -->

<?php 
                                             $conn=mysqli_connect("localhost","root","","db_lms");
                                              $q="select * from book_categories";
                                              $cats=mysqli_query($conn,$q);
                                               ?>
<section id="features" class="features section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Categories</h2>
  <p>All Available Books Categories</p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">
<?php  foreach($cats as $c): ?>
    <div class="col" data-aos="fade-up" data-aos-delay="100">
      <div class="features-item">
        <i class="bi bi-eye" style="color: #ffbb2c;"></i>
        <h3><a href="category-list.php?id=<?php echo $c['cat_id'] ; ?> &n=<?php echo $c['cat_name'];  ?>" class="stretched-link"><?php echo $c['cat_name'];  ?></a></h3>
      </div>
    </div>
    <?php endforeach; ?>

  </div>

</div>

</section><!-- /Features Section -->