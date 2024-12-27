<?php
include 'connection.php';

$judul_berita = $_POST['judul_berita'];
$isi_berita = $_POST['isi_berita'];
$watching_time = 0;

if (isset($_FILES['image_path']) && $_FILES['image_path']) {
    $location_img = "../../assets/img/";
    $image = basename($_FILES["image_path"]["name"]);
    $target_file = $location_img . $image;

    $image_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($image_file) {
        if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
            $image_path = "assets/img/" . $image;
            
            mysqli_query($connection, "INSERT INTO daftar_berita VALUES('', '$image_path','$judul_berita', '$isi_berita', '$watching_time')");
            header('location:../list_news.php');
            exit;
            }
        }
    }else {
}
echo '<script>alert("Gagal");</script>';
header('location:../add_news.php');
exit;
?>