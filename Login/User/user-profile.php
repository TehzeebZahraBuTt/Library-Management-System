<?PHP 

session_start();
$res = 0;
$filename = "team-4.jpg";

$conn = new mysqli("localhost", "root", "", "db_lms");

if (isset($_POST['update'])) {
    // Check if file was uploaded
    if (isset($_FILES['profile']) && $_FILES['profile']['error'] === UPLOAD_ERR_OK) {
        $filename = $_FILES['profile']['name'];
        $tmp_name = $_FILES['profile']['tmp_name'];
        move_uploaded_file($tmp_name, '../../Admin/uploads/' . $filename);
    } else {
        $filename = $_SESSION['profile'] ?? "team-4.jpg"; // fallback
    }

    extract($_POST);
    $sql = "UPDATE users SET user_name='$name', user_email='$email', user_password='$new_pass', user_profile='$filename' WHERE user_id=" . $_SESSION['id'];
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $new_pass;
        $_SESSION['profile'] = $filename;
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Trainers - Mentor Bootstrap Template</title>
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

<body class="trainers-page">

  <?php include("header.php");?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Welcome <?php echo $_SESSION['name']; ?></h1>
              <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Profile</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Trainers Section -->
    <section id="trainers" class="section trainers">

      <div class="container">

        <div class="row gy-5">
        <?php if($res): ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success! </strong> Profile Updated Successfully!
            
        </div>
        <?php endif;  ?>

        
          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="400">
            <div class="member-img">
              <img src="<?php  if(isset($_SESSION['profile'])) {
                echo "../../Admin/uploads/".$_SESSION['profile'];
              }else{
                  echo 'assets/img/team/team-4.jpg';
                }
                ?>" class="img-fluid" alt="" id="pic">
             
            </div>
            <div class="member-info text-center">
              <h4><?php echo $_SESSION['name']; ?></h4>
              <span><?php echo $_SESSION['email']; ?></span>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-8 col-md-6 member" data-aos="fade-up" data-aos-delay="500">
           
            <div class="member-info text-center">
              <form action="" method="post" enctype="multipart/form-data">
              <div class="container" data-aos="fade-up" data-aos-delay="100">
              <div class="section-header text-center">
                <h2 class="mb-4 mt-4 text-success">Update Profile</h2>
                <p class="mb-4 mt-4">Fill out the form below to update your profile information.</p>
              </div>
                <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="" value="<?php echo $_SESSION['name'];  ?>">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="" value="<?php echo $_SESSION['email'];  ?>">
                </div>

                <div class="col-md-6">
                  <input type="text" name="old_pass" class="form-control" placeholder="Your Old Password" required="" value="<?php echo $_SESSION['password'];  ?>">
                </div>

                <div class="col-md-6">
                  <input type="text" name="new_pass" class="form-control" placeholder="Your New Password" required="" value="<?php echo $_SESSION['password'];  ?>">
                </div>
                <div class="col-md-12">
                  <input type="file" name="profile" class="form-control"  required="" id="ans" onchange="changePic()">
                </div>
                <div class="col-md-12 text-center">
                <input type="submit" class="btn btn-success px-4" name="update" value="Update" >

                </div>
                

              </div>
              </form>
             </div>
          </div><!-- End Team Member -->

         

        </div>

      </div>

    </section><!-- /Trainers Section -->

  </main>

  <?php include("footer.php");  ?>

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
  function changePic(){

      var file_field = document.getElementById('ans')
      var pic = document.getElementById('pic')
      // let cfiles = file_field.files;

      pic.src = window.URL.createObjectURL(file_field.files[0])


      // console.log(cfiles)
     // pic.src=cfiles[0].name;
      //console.log(pic.src)
       


     
  }</script>

</body>

</html>