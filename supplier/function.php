<?php
include '../koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 🧾 Tambah data supplier
function insertSupplier($koneksi, $id_supplier, $id_produk, $nama_supplier, $no_telp, $alamat, $email) {
    $query = "INSERT INTO supplier (ID_SUPPLIER, ID_PRODUK, NAMA_SUPPLIER, NO_TELP, ALAMAT, EMAIL) 
              VALUES ('$id_supplier', '$id_produk', '$nama_supplier', '$no_telp', '$alamat', '$email')";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $id_supplier    = $_POST['id_supplier'];
    $id_produk      = $_POST['id_produk'];
    $nama_supplier  = $_POST['nama_supplier'];
    $no_telp        = $_POST['no_telp'];
    $alamat         = $_POST['alamat'];
    $email          = $_POST['email'];

    if (insertSupplier($koneksi, $id_supplier, $id_produk, $nama_supplier, $no_telp, $alamat, $email)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data supplier gagal disimpan 😿";
    }
}

// 🧹 Hapus data supplier
function deleteSupplier($koneksi, $id) {
    $id = mysqli_real_escape_string($koneksi, $id);
    $query = "DELETE FROM supplier WHERE ID_SUPPLIER = '$id'";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['Aksi']) && $_GET['Aksi'] == 'Hapus' && isset($_GET['id'])) {
        $id = $_GET['id'];

        if (deleteSupplier($koneksi, $id)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal menghapus supplier, coba cek ID-nya ya 📦";
        }
    }
}

// 🛠️ Update data supplier
function updateSupplier($koneksi, $id_supplier, $id_produk, $nama_supplier, $no_telp, $alamat, $email) {
    $query = "UPDATE supplier 
              SET ID_PRODUK = '$id_produk', NAMA_SUPPLIER = '$nama_supplier', NO_TELP = '$no_telp', 
                  ALAMAT = '$alamat', EMAIL = '$email' 
              WHERE ID_SUPPLIER = '$id_supplier'";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id_supplier    = $_POST['id_supplier'];
    $id_produk      = $_POST['id_produk'];
    $nama_supplier  = $_POST['nama_supplier'];
    $no_telp        = $_POST['no_telp'];
    $alamat         = $_POST['alamat'];
    $email          = $_POST['email'];

    if (updateSupplier($koneksi, $id_supplier, $id_produk, $nama_supplier, $no_telp, $alamat, $email)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data supplier gagal diubah, periksa lagi ya 🚧";
    }
}
?>