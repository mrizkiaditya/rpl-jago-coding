<?php
session_start();

if(empty($_SESSION['username'])) {
  echo "<script>alert('Anda harus login terlebih dahulu');
    document.location='login.php'</script>";
}

require 'function.php';

$programming_name = $_GET['programming_name'];
$tbl_soal = "SELECT * FROM tbl_soal WHERE programming_name='$programming_name' ORDER BY RAND()";
$soal = mysqli_query($conn, $tbl_soal);
$jumlah = mysqli_num_rows($soal);


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jago Coding</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">Jago coding</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="dashboard.php">Courses</a></li>
          <li><a href="quiz_main.php">Quiz</a></li>
          <li><a href="contact.php">Contact</a></li>

          <li class="dropdown active">
            <a href="#"><span><?= $_SESSION['username']; ?></span> 
              <i class="bi bi-person-circle"></i>
              <i class="bi bi-chevron-down"> </i>
            </a>
            <ul>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Start answering!</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->

    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

      <div class="row">
          <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content">
            
            <div class="section-title">
                <p>Quiz</p>
            </div>

          </div>
      </div>

      <form action="jawab.php" method="post" onsubmit="return confirm('Anda Yakin ?')">

          <?php $i = 1; ?>
          <?php while($row=mysqli_fetch_array($soal)) { ?>
              <div class="form-group">
                  <table class="table table-bordered table-striped">
                      <tbody>
                          <input type="hidden" name="id[]" value=<?php echo $row['id']; ?>>
                          <input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
                          <tr>
                              <td><?= $i; ?>. <?= $row['soal']; ?></td>
                          </tr>
                          <tr>
                            <td><input type="radio" name="pilihan[<?php echo $row['id']; ?>]" value="A" required /> <?php echo $row['a']; ?></td>
                          </tr>
                          <tr>
                            <td><input type="radio" name="pilihan[<?php echo $row['id']; ?>]" value="B" required /> <?php echo $row['b']; ?></td>
                          </tr>
                          <tr>
                            <td><input type="radio" name="pilihan[<?php echo $row['id']; ?>]" value="C" required /> <?php echo $row['c']; ?></td>
                          </tr>
                          <tr>
                            <td><input type="radio" name="pilihan[<?php echo $row['id']; ?>]" value="D" required /> <?php echo $row['d']; ?></td>
                          </tr>
                      </tbody>
                  </table>

              </div>
              <?php $i++; ?>
          <?php } ?>
          <button type="submit" name="submit" value="jawab" class="btn btn-primary btn-flat pull-right">Simpan</button>
      </form>

    </section><!-- End Courses Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Jago coding</span></strong>. All Rights Reserved
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>