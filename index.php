<?php
// ini adalah kode php untuk menampilkan data dari database
include "proses/config.php"; //mengambil data koneksi dari file config.php

$tampil = mysqli_query($conn,"SELECT * FROM todolist"); 
// mysqli_query berfungsi untuk membuat query untuk berkomunikasi dengan database
// SELECT * FROM nama_table ini adlah syntax dari bahasa pemrograman SQL
// while berfungsi untuk perulangan dan mysqli_fetch_assoc untuk membuat data array asosiatif
while($r = mysqli_fetch_assoc($tampil)){
    $c[] = $r;// Menyimpan setiap baris data dalam bentuk array asosiatif ke dalam $c
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                <form action="proses/tambah.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Task</label>
                        <input type="text" class="form-control" name="task" id="exampleFormControlInput1" placeholder="Enter your task" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3" placeholder="Enter task description" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Task</button>
                </form>
            </div>
        </div>

        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped table-glassmorphism table-primary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        // Mengecek apakah array $c tidak kosong
                        if(!empty($c)){
                            $no = 1; // Inisialisasi variabel nomor
                            // Looping melalui setiap elemen dalam array $c (data dari database)
                            foreach($c as $task){
                        ?>
                        <th scope="row"><?= $no++; ?></th>
                        <!-- Menampilkan nomor urut menggunakan variabel $no, dan kemudian increment $no -->
                        <td><?= $task['task']; ?></td>
                        <!-- Menampilkan data 'task' dari array $task -->
                        <td><?= $task['description']; ?></td>
                        <!-- Menampilkan data 'description' dari array $task -->
                        <td>
                            <!-- Menampilkan tombol Edit dengan link menuju halaman edit.php dan mengirimkan parameter id -->
                            <a href="./edit.php?id=<?php echo $task['id']; ?>" class="btn btn-sm btn-warning mb-1 me-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <!-- Menampilkan tombol Delete dengan link menuju halaman hapus.php dan mengirimkan parameter id -->
                            <a href="proses/hapus.php?id=<?php echo $task['id']; ?>" class="btn btn-sm btn-danger mb-1">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php
                        }} else {
                            // Jika array $c kosong, menampilkan pesan bahwa data kosong dalam satu baris dan empat kolom
                            echo '<td colspan="4">Maaf data anda kosong</td>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="./dist/bootstrap.bundle.min.js"></script>
</body>
</html>
