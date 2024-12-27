<?php
session_start();
include "connection.php";
if(!isset($_SESSION['user'])) {
    header("location: ../../login/login.php");
}

$id_berita = $_GET['id_berita'];
$query = mysqli_query($connection, "DELETE FROM daftar_berita WHERE id_berita = '$id_berita'");
echo '<script>alert("Edit Data Berhasil");</script>';
header("location: ../list_news.php");
exit;
?>