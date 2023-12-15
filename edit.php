<?php
// File ini digunakan untuk menampilkan data dari database berdasarkan ID.

include "proses/config.php"; // Mengambil data koneksi dari file config.php

// Mendapatkan nilai ID dari parameter URL
$id = $_GET['id'];

// Mengecek apakah parameter ID sudah diatur
if(!isset($id)){
    // Jika ID tidak diatur, redirect ke halaman utama (index.php)
    header('location: index.php');
}

// Menjalankan query untuk mengambil data dari tabel todolist berdasarkan ID
$tampil = mysqli_query($conn, "SELECT * FROM todolist WHERE id='$id'"); 
// mysqli_query berfungsi untuk membuat query untuk berkomunikasi dengan database
// SELECT * FROM nama_table WHERE id='$id' ini adalah syntax dari bahasa pemrograman SQL
$tulis = mysqli_fetch_assoc($tampil);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .glassmorphism {
            background: rgba(19, 197, 187, 0.9);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            margin-top: 20px;
            padding: 20px;
        }

        .table-glassmorphism {
            background: rgba(19, 197, 187, 0.2);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(4.5px);
            -webkit-backdrop-filter: blur(4.5px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            margin-top: 20px;
        }
    </style>
</head>
<body class="glassmorphism">
    <!-- Form Untuk Mengisi data -->
    <div class="container">
        <div class="card table-glassmorphism">
            <div class="card-body">
                <h5 class="card-title">To-Do Form</h5>
                <!-- Form akan di proses di proses/tambah.php -->
                <form action="proses/edit.php" method="POST">
                    <!-- Input hidden untuk mengirimkan ID ke proses/edit.php -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    
                    <!-- Input untuk mengedit task -->
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Task</label>
                        <input type="text" class="form-control" value="<?php echo $tulis['task'];?>" name="task" id="exampleFormControlInput1" placeholder="Enter your task" required>
                    </div>
                    
                    <!-- Textarea untuk mengedit deskripsi task -->
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3" placeholder="Enter task description" required><?php echo $tulis['description'];?></textarea>
                    </div>

                    <!-- Tombol submit untuk menyimpan perubahan -->
                    <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Edit Task</button>
                </form>
            </div>
        </div>
        </div>
    <script src="./dist/bootstrap.bundle.min.js"></script>
</body>
</html>
