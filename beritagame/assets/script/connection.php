<?php
$connection = mysqli_connect("localhost", "root", "", "berita");

if(mysqli_connect_error()){
    echo "Your connection is failed : " . mysqli_connect_error();
}
?>