<?php
// File ini digunakan untuk menambahkan data ke Database.

include "config.php"; // Mengambil data koneksi dari config.php
session_start();
// Mengecek apakah ada data yang dikirimkan dari halaman utama
if(isset($_POST["submit"])){
    // Membuat variabel untuk menampung data yang dikirimkan dari halaman utama
    $task = $_POST["task"];
    $desc = $_POST["desc"];

    // Menjalankan query untuk memasukkan data ke dalam tabel todolist
    $insert = mysqli_query($conn, "INSERT INTO todolist (task, description) VALUES ('$task', '$desc')");

    // Mengecek apakah proses penambahan data berhasil
    if($insert){
        // Menyimpan pesan ke dalam session untuk ditampilkan setelah redirect
        $_SESSION['pesan'] = "Data berhasil ditambahkan";

        // Mengarahkan kembali ke halaman utama setelah proses penambahan data
        header("location: ../index.php");
    } else {
        // Jika proses penambahan data gagal, menyimpan pesan error ke dalam session
        $_SESSION['pesan'] = "Gagal menambahkan data";
    }
}
?>
