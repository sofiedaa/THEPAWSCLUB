<?php
$host = "localhost";       // atau 127.0.0.1
$user = "root";            // username database
$password = "";            // password database
$database = "petshop_id";  // nama database
$port = 3307;              // port custom kalo lo pake

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database, $port);

// Mengecek koneksi
if (!$koneksi) {
    error_log("Koneksi gagal: " . mysqli_connect_error());
    exit;
}
?>