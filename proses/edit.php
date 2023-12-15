<?php
// File ini digunakan untuk Edit data ke Database.

include "config.php"; // Mengambil data koneksi dari config.php

// Mengecek apakah ada data yang dikirimkan dari halaman Edit
if(isset($_POST["submit"])){
    // Membuat variabel untuk menampung data yang dikirimkan dari halaman utama
    $task = $_POST["task"];
    $desc = $_POST["desc"];
    $id = $_POST["id"];
    // Menjalankan query untuk edit data ke dalam tabel todolist
    $edit = mysqli_query($conn, "UPDATE todolist SET task='$task', description='$desc' WHERE id='$id'");
    // Mengarahkan kembali ke halaman utama setelah proses penambahan data
    header("location: ../index.php");
}
?>
