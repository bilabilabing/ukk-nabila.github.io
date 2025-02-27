<?php
include "config.php";
$id = $_POST['id'];
$tugas = $_POST['tugas'];
$jangka_waktu = $_POST['jangka_waktu'];
$keterangan = $_POST['keterangan'];
$prioritas = $_POST['prioritas']; // pastikan variabel prioritas ada

// Ambil deadline yang sudah ada di database
$query = "SELECT jangka_waktu FROM tbl_todo WHERE id='$id'";
$result = mysqli_query(mysql: $mysqli, query: $query);
$data = mysqli_fetch_assoc(result: $result);

if ($data) {
    $deadline_sebelumnya = $data['jangka_waktu'];

    // Cek apakah jangka_waktu baru melebihi deadline yang sudah ada 
    if ($jangka_waktu > $deadline_sebelumnya) {
        header(header: "Location: http://localhost/todo/index.php?halaman=todo&pesan_edit=gagal_deadline");
        exit();
    }

    // Lanjut update jika deadline sesuai
    $sql = "UPDATE tbl_todo SET
                tugas='$tugas',
                jangka_waktu='$jangka_waktu',
                keterangan='$keterangan',
                 prioritas='$prioritas'
            WHERE id='$id'";

    $result = mysqli_query(mysql: $mysqli, query: $sql);
    $r = mysqli_affected_rows(mysql: $mysqli);

    if ($r >0) {
        header(header: "Location: http://localhost/todo/index.php?halaman=todo&pesan_edit=berhasil");
    } else {
        header(header: "Location: http://localhost/todo/index.php?halaman=todo&pesan_edit=gagal");
    }
} else {
    header(header: "Location: http://localhost/todo/index.php?halaman=todo&pesan_edit=gagal_data");
}

exit();
?>