<?php
include '../koneksi.php';

$id = $_GET['id'];

// ambil status saat ini
$get = mysqli_query($koneksi, "SELECT STATUS FROM produk WHERE ID_PRODUK = $id");
$data = mysqli_fetch_assoc($get);
$status_sekarang = $data['STATUS'];

// toggle status-nya
$status_baru = ($status_sekarang == 'aktif') ? 'nonaktif' : 'aktif';

$update = mysqli_query($koneksi, "UPDATE produk SET STATUS = '$status_baru' WHERE ID_PRODUK = $id");

header("Location: index.php");
exit;
?>
