<?php
include '../koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ➕ Tambah layanan
function insertLayanan($koneksi, $nama, $id_pegawai, $deskripsi, $durasi, $harga) {
    $query = "INSERT INTO layanan (Nama_Layanan, Id_Pegawai, Deskripsi, Durasi, Harga)
              VALUES ('$nama', '$id_pegawai', '$deskripsi', '$durasi', '$harga')";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $nama       = $_POST['nama'];
    $id_pegawai = $_POST['id_pegawai'];
    $deskripsi  = $_POST['deskripsi'];
    $durasi     = $_POST['durasi'];
    $harga      = $_POST['harga'];

    if (insertLayanan($koneksi, $nama, $id_pegawai, $deskripsi, $durasi, $harga)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal tambah layanan: " . mysqli_error($koneksi);
    }
}

// 🗑️ Hapus layanan
function deleteLayanan($koneksi, $id) {
    $query = "DELETE FROM layanan WHERE Id_Layanan = $id";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['Aksi']) && $_GET['Aksi'] == 'Hapus' && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if (deleteLayanan($koneksi, $id)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal hapus layanan";
    }
}

// ✏️ Update layanan
function updateLayanan($koneksi, $id, $nama, $id_pegawai, $deskripsi, $durasi, $harga) {
    $query = "UPDATE layanan SET 
              Nama_Layanan = '$nama',
              Id_Pegawai = '$id_pegawai',
              Deskripsi = '$deskripsi',
              Durasi = '$durasi',
              Harga = '$harga'
              WHERE Id_Layanan = $id";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id         = $_POST['id'];
    $nama       = $_POST['nama'];
    $id_pegawai = $_POST['id_pegawai'];
    $deskripsi  = $_POST['deskripsi'];
    $durasi     = $_POST['durasi'];
    $harga      = $_POST['harga'];

    if (updateLayanan($koneksi, $id, $nama, $id_pegawai, $deskripsi, $durasi, $harga)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal update layanan";
    }
}
?>
