<?php

$conn = mysqli_connect("localhost", "root", "", "jagocoding");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data) {
    global $conn;

    $nama = $data["nama"];
    $image = upload();
    // if( !$image ) {
    //     return false;
    // }
    $description = $data["description"];

    $query = "INSERT INTO programming
                VALUES
                ('', '$nama', '$image', '$description')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {

    $namaFile = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmpName, 'img/' . $namaFile);

    return $namaFile;
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM programming WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $gambarLama = $data["gambarLama"];
    $description = $data["description"];

    if($_FILES['image']['error'] === 4) {
        $image = $gambarLama;
    } else {
        $image = upload();
    }

    $query = "UPDATE programming SET
                nama = '$nama',
                image = '$image',
                description = '$description'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>