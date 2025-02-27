<?php
include "config.php";
$sql = "DELETE FROM tbl_todo WHERE id='$_GET[id]'";
//echo $sql;
mysqli_query( $mysqli, $sql);
$r = mysqli_affected_rows( $mysqli);
if ($r > 0) {
    header(header: "Location: http://localhost/todo/index.php?halaman=todo&pesan_hapus=berhasil");
} else {
    header(header: "Location: http://localhost/todo/index.php?halaman=todo&pesan_hapus=gagal");
}
exit();
?>