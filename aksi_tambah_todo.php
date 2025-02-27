<?php
include "config.php";

// Cek koneksi
if (!$mysqli) {
    die("koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form dan filter
$tugas = mysqli_real_escape_string($mysqli, $_POST['tugas']);
$jangka_waktu = mysqli_real_escape_string($mysqli, $_POST['jangka_waktu']);
$keterangan = mysqli_real_escape_string($mysqli, $_POST['keterangan']);
$prioritas = mysqli_real_escape_string($mysqli, $_POST['prioritas']); // Menambahkan prioritas

// Cek apakah input tidak kosong
if (empty($tugas) || empty($jangka_waktu) || empty($keterangan) || empty($prioritas)) {
    die("Semua kolam harus diisi!");
}

// Query untuk menyimpan data ke database
$query = "INSERT INTO tbl_todo (tugas, jangka_waktu, keterangan, prioritas) VALUES ('$tugas', '$jangka_waktu', '$keterangan', '$prioritas')";

// Eksekusi query dan cek error
if (mysqli_query($mysqli, $query)) {
    header("Location: http://localhost/todo/index.php?halaman=todo");
    exit();
} else {
    die("Error dalam eksekusi query: " . mysqli_error($mysqli));
} 
?>