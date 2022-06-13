<?php 

session_start();

if(empty($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');
      document.location='../../login.php'</script>";
  }

require 'admin.php';

$id = $_GET["id"];

if( hapus($id) > 0 ) {
    echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = 'admin_main.php'
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'admin_main.php'
        </script>
    ";
}
?>