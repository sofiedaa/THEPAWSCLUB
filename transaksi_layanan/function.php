<?php
include '../koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ➕ Tambah
function insertTransaksiLayanan($koneksi, $id_pelanggan, $id_layanan, $jumlah) {
    $result = mysqli_query($koneksi, "SELECT HARGA FROM layanan WHERE ID_LAYANAN = '$id_layanan'");
    $layanan = mysqli_fetch_assoc($result);
    $harga_satuan = $layanan['HARGA'];
    $total_harga = $harga_satuan * $jumlah; // perbaikan total harga

    $query = "INSERT INTO transaksi_layanan 
              (ID_PELANGGAN, ID_LAYANAN, JUMLAH, TOTAL_HARGA)
              VALUES ('$id_pelanggan', '$id_layanan', '$jumlah', '$total_harga')";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_layanan   = $_POST['id_layanan'];
    $jumlah       = $_POST['jumlah'];

    if (insertTransaksiLayanan($koneksi, $id_pelanggan, $id_layanan, $jumlah)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal tambah transaksi layanan: " . mysqli_error($koneksi);
    }
}

// 🗑️ Hapus
function deleteTransaksiLayanan($koneksi, $id) {
    $query = "DELETE FROM transaksi_layanan WHERE ID_TRANSAKSI = $id";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['Aksi']) && $_GET['Aksi'] == 'Hapus' && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if (deleteTransaksiLayanan($koneksi, $id)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal hapus transaksi layanan";
    }
}

// ✏️ Update
function updateTransaksiLayanan($koneksi, $id, $id_pelanggan, $id_layanan, $jumlah) {
    // Ambil harga terbaru dari layanan
    $res = mysqli_query($koneksi, "SELECT HARGA FROM layanan WHERE ID_LAYANAN = '$id_layanan'");
    $data = mysqli_fetch_assoc($res);
    $harga_satuan = $data['HARGA'];
    $total_harga = $harga_satuan * $jumlah; // perbaikan total harga

    $query = "UPDATE transaksi_layanan SET 
              ID_PELANGGAN = '$id_pelanggan',
              ID_LAYANAN = '$id_layanan',
              JUMLAH = '$jumlah',
              TOTAL_HARGA = '$total_harga'
              WHERE ID_TRANSAKSI = $id";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id           = $_POST['id'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_layanan   = $_POST['id_layanan'];
    $jumlah       = $_POST['jumlah']; // ini harus ditambah

    if (updateTransaksiLayanan($koneksi, $id, $id_pelanggan, $id_layanan, $jumlah)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal update transaksi layanan: " . mysqli_error($koneksi);
    }
}
?>
