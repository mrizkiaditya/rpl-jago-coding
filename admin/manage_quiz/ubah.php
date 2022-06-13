<?php 

session_start();

if(empty($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');
      document.location='../../login.php'</script>";
  }

require 'quiz.php';

$programming = mysqli_query($conn, "SELECT * FROM programming");
$id = $_GET["id"];
$tbl_soal = query("SELECT * FROM tbl_soal WHERE id = $id")[0];

if( isset($_POST["submit"]) ) {


    if( ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah');
        </script>
    ";
    } else {
        echo "
        <script>
            alert('data gagal diubah');
        </script>
    ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin - Jago Coding</title>
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
                            <a class="nav-link" href="../manage_programming/admin_main.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <div class="sb-sidenav-menu-heading">Manage Courses</div>

                            <?php foreach ($programming as $row ) : ?>

                                <a class="nav-link collapsed" href="../manage_course/admin_course.php?programming_name=<?= $row["nama"]; ?>" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    <?= $row["nama"]; ?>
                                </a>

                            <?php endforeach; ?>

                            <div class="sb-sidenav-menu-heading">Manage Quiz</div>
                            
                            <?php foreach ($programming as $row ) : ?>

                                <a class="nav-link collapsed" href="admin_quiz.php?programming_name=<?= $row["nama"]; ?>" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
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
                        <h1 class="mt-4">Update Quiz</h1>

                        <div class="row">
                            
                        <div class="card mb-4">
                            <div class="card-body">
                               
                                <form method="POST" action="">
                                    <input type="hidden" name="id" value="<?= $tbl_soal["id"]; ?>">
                                    <div class="mb-3">
                                        <label for="soal" class="form-label">Soal</label>
                                        <textarea name="soal" id="soal" class="form-control"><?= $tbl_soal["soal"] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="a" class="form-label">Jawaban A</label>
                                        <input type="text" name="a" id="a" class="form-control" value="<?= $tbl_soal["a"] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="b" class="form-label">Jawaban B</label>
                                        <input type="text" name="b" id="b" class="form-control" value="<?= $tbl_soal["b"] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="c" class="form-label">Jawaban C</label>
                                        <input type="text" name="c" id="c" class="form-control" value="<?= $tbl_soal["c"] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="d" class="form-label">Jawaban D</label>
                                        <input type="text" name="d" id="d" class="form-control" value="<?= $tbl_soal["d"] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="knc_jawaban" class="form-label">Kunci Jawaban</label>
                                        <select name="knc_jawaban" id="knc_jawaban" class="form-control">
                                            <option></option>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="programming_name" class="form-label">Programming Language</label>
                                        <input type="text" name="programming_name" id="programming_name" class="form-control" value="<?= $tbl_soal["programming_name"] ?>">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-warning">Update</button>
                                </form>

                            </div>
                        </div>

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
