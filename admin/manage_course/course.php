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

    $topic = $data["topic"];
    $description = $data["description"];
    $programming_name = $data["programming_name"];

    $query = "INSERT INTO courses
                VALUES
                ('', '$topic', '$description', '$programming_name')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM courses WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id"];
    $topic = $data["topic"];
    $description = $data["description"];
    $programming_name = $data["programming_name"];

    $query = "UPDATE courses SET
                topic = '$topic',
                description = '$description',
                programming_name = '$programming_name'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>