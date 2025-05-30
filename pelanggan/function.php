<?php
include '../koneksi.php';

// fungsi tambah pelanggan
function insertPelanggan($koneksi, $nama, $no_telp, $alamat, $email) {
    $query = "INSERT INTO pelanggan (Nama, No_Telp, Alamat, Email) 
              VALUES ('$nama', '$no_telp', '$alamat', '$email')";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $nama     = $_POST['Nama'];
    $no_telp  = $_POST['No_Telp']; // disesuaiin sama nama field di form
    $alamat   = $_POST['Alamat'];
    $email    = $_POST['Email'];

    if (insertPelanggan($koneksi, $nama, $no_telp, $alamat, $email)) {
        header("Location: index.php"); // balik ke halaman index pelanggan
        exit;
    } else {
        echo "Data gagal disimpan";
    }
}

// fungsi hapus pelanggan
function deletePelanggan($koneksi, $id) {
    $id = intval($id);
    $query = "DELETE FROM pelanggan WHERE Id_Pelanggan = $id";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['Aksi']) && $_GET['Aksi'] == 'Hapus' && isset($_GET['id'])) {
        $id = intval($_GET['id']);

        if (deletePelanggan($koneksi, $id)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Data gagal dihapus";
        }
    }
}

//UPDATE
include '../koneksi.php';

function updatePelanggan($koneksi, $id, $nama, $no_telp, $alamat, $email) {
    $query = "UPDATE pelanggan 
              SET Nama='$nama', No_Telp='$no_telp', Alamat='$alamat', Email='$email' 
              WHERE Id_Pelanggan = $id";
    return mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id       = $_POST['id'];
    $nama     = $_POST['nama'];
    $no_telp  = $_POST['no_telp'];
    $alamat   = $_POST['alamat'];
    $email    = $_POST['email'];

    if (updatePelanggan($koneksi, $id, $nama, $no_telp, $alamat, $email)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah";
    }
}



?>
