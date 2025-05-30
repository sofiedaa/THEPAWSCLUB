


<?php
include '../koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 🐶 tambah data hewan
function insertHewan($koneksi, $id_hewan, $jenis, $usia, $berat, $id_pelanggan, $nama_hewan) {
    $query = "INSERT INTO hewan_peliharaan (Id_hewan, JENIS, USIA, BERAT, ID_PELANGGAN, NAMA_HEWAN) 
              VALUES ('$id_hewan', '$jenis', '$usia', '$berat', '$id_pelanggan', '$nama_hewan')";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $id_hewan      = $_POST['id_hewan'];
    $jenis         = $_POST['jenis'];
    $usia          = $_POST['usia'];
    $berat         = $_POST['berat'];
    $id_pelanggan  = $_POST['id_pelanggan'];
    $nama_hewan    = $_POST['nama_hewan'];

    if (insertHewan($koneksi, $id_hewan, $jenis, $usia, $berat, $id_pelanggan, $nama_hewan)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal disimpan 😿";
    }
}

// 🐱 hapus data hewan
function deleteHewan($koneksi, $id) {
    $id = mysqli_real_escape_string($koneksi, $id);
    $query = "DELETE FROM hewan_peliharaan WHERE Id_hewan = '$id'";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['Aksi']) && $_GET['Aksi'] == 'Hapus' && isset($_GET['id'])) {
        $id = $_GET['id'];

        if (deleteHewan($koneksi, $id)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Data gagal dihapus, coba cek id-nya yaa 🐾";
        }
    }
}

// 🐰 update data hewan
function updateHewan($koneksi, $id_hewan, $jenis, $usia, $berat, $id_pelanggan, $nama_hewan) {
    $query = "UPDATE hewan_peliharaan 
              SET JENIS = '$jenis', USIA = '$usia', BERAT = '$berat', ID_PELANGGAN = '$id_pelanggan', NAMA_HEWAN = '$nama_hewan' 
              WHERE Id_hewan = '$id_hewan'";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id_hewan      = $_POST['id_hewan'];
    $jenis         = $_POST['jenis'];
    $usia          = $_POST['usia'];
    $berat         = $_POST['berat'];
    $id_pelanggan  = $_POST['id_pelanggan'];
    $nama_hewan    = $_POST['nama_hewan'];

    if (updateHewan($koneksi, $id_hewan, $jenis, $usia, $berat, $id_pelanggan, $nama_hewan)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah, cek lagi input-an kamu ya 🐾";
    }
}
?>
