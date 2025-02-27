<?php
$mysqli=mysqli_connect(hostname: 'localhost', username: 'root', password: '', database: 'db_todo_list');
mysqli_select_db(mysql: $mysqli, database: 'db_todo_list') or die("database tidak ditemukan");
?>

