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

    $soal = $data["soal"];
    $a = $data["a"];
    $b = $data["b"];
    $c = $data["c"];
    $d = $data["d"];
    $knc_jawaban = $data["knc_jawaban"];
    $programming_name = $data["programming_name"];

    $query = "INSERT INTO tbl_soal
                VALUES
                ('', '$soal', '$a', '$b', '$c', '$d', '$knc_jawaban', '$programming_name')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tbl_soal WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id"];
    $soal = $data["soal"];
    $a = $data["a"];
    $b = $data["b"];
    $c = $data["c"];
    $d = $data["d"];
    $knc_jawaban = $data["knc_jawaban"];
    $programming_name = $data["programming_name"];

    $query = "UPDATE tbl_soal SET
                soal = '$soal',
                a = '$a',
                b = '$b',
                c = '$c',
                d = '$d',
                knc_jawaban = '$knc_jawaban',
                programming_name = '$programming_name'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>