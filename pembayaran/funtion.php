<?php
include '../koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ➕ Tambah
function insertPembayaran($koneksi, $id_pelanggan, $metode, $tanggal, $total) {
    $query = "INSERT INTO pembayaran (ID_PELANGGAN, METODE_PEMBAYARAN, TANGGAL, TOTAL_PEMBAYARAN)
              VALUES ('$id_pelanggan', '$metode', '$tanggal', '$total')";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $metode       = $_POST['metode'];
    $tanggal      = $_POST['tanggal'];
    $total        = $_POST['total'];

    if (insertPembayaran($koneksi, $id_pelanggan, $metode, $tanggal, $total)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal tambah pembayaran: " . mysqli_error($koneksi);
    }
}

// 🗑️ Hapus
function deletePembayaran($koneksi, $id) {
    $query = "DELETE FROM pembayaran WHERE ID_PEMBAYARAN = $id";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['Aksi']) && $_GET['Aksi'] == 'Hapus' && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if (deletePembayaran($koneksi, $id)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal hapus pembayaran";
    }
}

// ✏️ Update
function updatePembayaran($koneksi, $id, $id_pelanggan, $metode, $tanggal, $total) {
    $query = "UPDATE pembayaran SET 
              ID_PELANGGAN = '$id_pelanggan',
              METODE_PEMBAYARAN = '$metode',
              TANGGAL = '$tanggal',
              TOTAL_PEMBAYARAN = '$total'
              WHERE ID_PEMBAYARAN = $id";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id           = $_POST['id'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $metode       = $_POST['metode'];
    $tanggal      = $_POST['tanggal'];
    $total        = $_POST['total'];

    if (updatePembayaran($koneksi, $id, $id_pelanggan, $metode, $tanggal, $total)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal update pembayaran";
    }
}
?>
