<?php
include '../koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ➕ tambah pegawai
function insertPegawai($koneksi, $nama, $posisi, $no_telp, $email) {
    $query = "INSERT INTO pegawai (NAMA, POSISI, NO_TELP, EMAIL)
              VALUES ('$nama', '$posisi', '$no_telp', '$email')";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $nama     = $_POST['nama'];
    $posisi   = $_POST['posisi'];
    $no_telp  = $_POST['no_telp'];
    $email    = $_POST['email'];

    if (insertPegawai($koneksi, $nama, $posisi, $no_telp, $email)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal tambah pegawai: " . mysqli_error($koneksi);
    }
}

// 🗑️ hapus pegawai
function deletePegawai($koneksi, $id) {
    $id = intval($id);
    $query = "DELETE FROM pegawai WHERE ID_PEGAWAI = $id";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['Aksi']) && $_GET['Aksi'] == 'Hapus' && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if (deletePegawai($koneksi, $id)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal hapus data pegawai";
    }
}

// ✏️ update pegawai
function updatePegawai($koneksi, $id, $nama, $posisi, $no_telp, $email) {
    $query = "UPDATE pegawai SET 
              NAMA = '$nama',
              POSISI = '$posisi',
              NO_TELP = '$no_telp',
              EMAIL = '$email'
              WHERE ID_PEGAWAI = $id";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id       = $_POST['id'];
    $nama     = $_POST['nama'];
    $posisi   = $_POST['posisi'];
    $no_telp  = $_POST['no_telp'];
    $email    = $_POST['email'];

    if (updatePegawai($koneksi, $id, $nama, $posisi, $no_telp, $email)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal update data pegawai";
    }
}
?>
