<?php
include '../koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ➕ Tambah data detail penjualan
function insertDetail($koneksi, $id_produk, $jumlah, $subtotal, $id_pembayaran) {
    $query = "INSERT INTO detail_penjualan (ID_PRODUK, JUMLAH, SUBTOTAL, ID_PEMBAYARAN) 
              VALUES ('$id_produk', '$jumlah', '$subtotal', '$id_pembayaran')";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $id_produk     = $_POST['ID_PRODUK'];
    $jumlah        = $_POST['JUMLAH'];
    $subtotal      = $_POST['SUBTOTAL'];
    $id_pembayaran = $_POST['ID_PEMBAYARAN'];

    if (insertDetail($koneksi, $id_produk, $jumlah, $subtotal, $id_pembayaran)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data detail penjualan gagal disimpan 😿";
    }
}

// ❌ Hapus data detail penjualan
function deleteDetail($koneksi, $id) {
    $id = mysqli_real_escape_string($koneksi, $id);
    $query = "DELETE FROM detail_penjualan WHERE ID_DETAIL = '$id'";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['Aksi']) && $_GET['Aksi'] == 'Hapus' && isset($_GET['id'])) {
        $id = $_GET['id'];

        if (deleteDetail($koneksi, $id)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Data gagal dihapus, pastikan tidak ada relasi aktif 🧾";
        }
    }
}

// 🔄 Update data detail penjualan
function updateDetail($koneksi, $id_detail, $id_produk, $jumlah, $subtotal, $id_pembayaran) {
    $query = "UPDATE detail_penjualan 
              SET ID_PRODUK = '$id_produk', JUMLAH = '$jumlah', SUBTOTAL = '$subtotal', ID_PEMBAYARAN = '$id_pembayaran'
              WHERE ID_DETAIL = '$id_detail'";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id_detail     = $_POST['ID_DETAIL'];
    $id_produk     = $_POST['ID_PRODUK'];
    $jumlah        = $_POST['JUMLAH'];
    $subtotal      = $_POST['SUBTOTAL'];
    $id_pembayaran = $_POST['ID_PEMBAYARAN'];

    if (updateDetail($koneksi, $id_detail, $id_produk, $jumlah, $subtotal, $id_pembayaran)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah, cek kembali input-an kamu ya 🔍";
    }
}
?>
