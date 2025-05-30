<?php
include '../koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 🧾 Tambah data produk
function insertProduk($koneksi, $id_produk, $nama_produk, $kategori, $harga, $stock, $kode_produk) {
    $query = "INSERT INTO produk (ID_PRODUK, NAMA_PRODUK, KATEGORI, HARGA, STOCK, KODE_PRODUK) 
              VALUES ('$id_produk', '$nama_produk', '$kategori', '$harga', '$stock', '$kode_produk')";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $id_produk    = $_POST['id_produk'];
    $nama_produk  = $_POST['nama_produk'];
    $kategori     = $_POST['kategori'];
    $harga        = $_POST['harga'];
    $stock        = $_POST['stock'];
    $kode_produk  = $_POST['kode_produk'];

    if (insertProduk($koneksi, $id_produk, $nama_produk, $kategori, $harga, $stock, $kode_produk)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data produk gagal disimpan 😿";
    }
}

// 🧹 Hapus data produk
function deleteProduk($koneksi, $id) {
    $id = mysqli_real_escape_string($koneksi, $id);
    $query = "DELETE FROM produk WHERE ID_PRODUK = '$id'";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['Aksi']) && $_GET['Aksi'] == 'Hapus' && isset($_GET['id'])) {
        $id = $_GET['id'];

        if (deleteProduk($koneksi, $id)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal menghapus produk, coba cek ID-nya ya 🧼";
        }
    }
}

// 🛠️ Update data produk
function updateProduk($koneksi, $id_produk, $nama_produk, $kategori, $harga, $stock, $kode_produk) {
    $query = "UPDATE produk 
              SET NAMA_PRODUK = '$nama_produk', KATEGORI = '$kategori', HARGA = '$harga', STOCK = '$stock', KODE_PRODUK = '$kode_produk'
              WHERE ID_PRODUK = '$id_produk'";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id_produk    = $_POST['id_produk'];
    $nama_produk  = $_POST['nama_produk'];
    $kategori     = $_POST['kategori'];
    $harga        = $_POST['harga'];
    $stock        = $_POST['stock'];
    $kode_produk  = $_POST['kode_produk'];

    if (updateProduk($koneksi, $id_produk, $nama_produk, $kategori, $harga, $stock, $kode_produk)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data produk gagal diubah, coba cek input-nya lagi 🧪";
    }
}
?>