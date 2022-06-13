<?php 

include 'function.php';

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);

    //jika terbaca
    if( mysqli_num_rows($result) === 1) {

        // cek password
        if ( password_verify($password, $row["password"]) ) {

            //set session
            session_start();
            $_SESSION['username'] = $row['username'];

            //cek usernmae
            if($username == 'admin') {
                header("Location: admin/manage_programming/admin_main.php");
            } else { $_SESSION['username']=$username;
                header("Location: dashboard.php");
        }
    } else {
        echo "<script>alert('Username atau Password anda salah');
        document.location='index.php'</script>";
    }
} else {
    echo "<script>alert('Username atau Password anda salah');
    document.location='index.php'</script>";
}

?>