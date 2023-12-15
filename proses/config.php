<?php
session_start();
// File ini digunakan untuk membuat koneksi ke database.

// Membuat koneksi menggunakan fungsi mysqli_connect.
$conn = mysqli_connect("localhost", "root", "", "todolist");

// Memeriksa apakah koneksi berhasil dilakukan.
if (!$conn) {
    // Jika koneksi gagal, menampilkan pesan error dan menghentikan eksekusi script.
    die("Koneksi Error: " . mysqli_connect_error());
} else {
    // Jika koneksi berhasil, menampilkan pesan bahwa koneksi telah terjadi.
    echo "<script>console.log('Terhubung ke database')</script>";
}

?>
