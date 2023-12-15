<?php
// File ini digunakan untuk Edit data ke Database.

include "config.php"; // Mengambil data koneksi dari config.php

// Mengecek apakah ada data yang dikirimkan dari halaman Edit
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $hapus = mysqli_query($conn, "DELETE FROM todolist WHERE id='$id'");
    header("location: ../index.php");
}else{
    header("location: ../index.php");
}
?>
