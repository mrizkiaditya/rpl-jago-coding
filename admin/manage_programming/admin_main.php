<?php 

session_start();

if(empty($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');
      document.location='../../login.php'</script>";
  }

require 'admin.php';

$programming = mysqli_query($conn, "SELECT * FROM programming")

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin - Jagocoding</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../../css/admin.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="admin.html">Admin Page</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../../logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin_main.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <div class="sb-sidenav-menu-heading">Manage Courses</div>

                            <?php foreach ($programming as $row ) : ?>

                                <a class="nav-link" href="../manage_course/admin_course.php?programming_name=<?= $row["nama"]; ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    <?= $row["nama"]; ?>
                                </a>

                            <?php endforeach; ?>

                            <div class="sb-sidenav-menu-heading">Manage Quiz</div>
                            
                            <?php foreach ($programming as $row ) : ?>

                                <a class="nav-link" href="../manage_quiz/admin_quiz.php?programming_name=<?= $row["nama"]; ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    <?= $row["nama"]; ?>
                                </a>

                            <?php endforeach; ?>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin Jago Coding
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Bahasa Pemrograman yang tersedia</li>
                        </ol>

                        <button name="submit" class="btn btn-primary" type="submit"><a style="text-decoration: none; color: white;" href="tambah_programming.php">Add New Programming</a></button>

                        <div class="row">

                            <?php foreach ($programming as $row ) : ?>

                            <div class="col-lg-2 col-md-6 d-flex align-items-stretch"> 
                                <div class="card mt-3 ml-5" style="width: 18rem;">
                                    <img src="img/<?= $row["image"]; ?>" class="card-img-top" alt="card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row["nama"]; ?></h5>
                                        <p class="card-text"><?= $row["description"]; ?></p>
                                        <button class="btn-warning"><a style="text-decoration: none; color: black;" href="ubah.php?id=<?= $row["id"]; ?>">Update</a></button>
                                        <button class="btn-danger"><a style="text-decoration: none; color: white;" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin menghapus?');">Delete</a></button>
                                    </div>
                                </div>
                            </div>

                             <?php endforeach; ?>

                        </div>

                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
