<?php 
    $hostname = 'localhost'; 
    $username = 'root'; 
    $password = ''; 
    $dbname   = 'dt_mahasiswa'; 

    // Membuat koneksi ke database
    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    // Memeriksa koneksi
    if (!$conn) {
        die('Gagal terhubung ke database: ' . mysqli_connect_error());
    }
    

