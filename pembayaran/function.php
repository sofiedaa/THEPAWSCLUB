<?php
include '../koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 🔢 Hitung total pembayaran otomatis
function hitungTotalPembayaran($koneksi, $id_pembayaran) {
    $total1 = 0;
    $total2 = 0;

    // total dari detail_penjualan
    $q1 = mysqli_query($koneksi, "SELECT SUM(SUB_TOTAL) AS total_dp FROM detail_penjualan WHERE ID_PEMBAYARAN = '$id_pembayaran'");
    if ($res1 = mysqli_fetch_assoc($q1)) {
        $total1 = $res1['total_dp'] ?? 0;
    }

    // total dari transaksi_layanan
    $q2 = mysqli_query($koneksi, "SELECT SUM(TOTAL_HARGA) AS total_tl FROM transaksi_layanan WHERE ID_PEMBAYARAN = '$id_pembayaran'");
    if ($res2 = mysqli_fetch_assoc($q2)) {
        $total2 = $res2['total_tl'] ?? 0;
    }

    return $total1 + $total2;
}

// ➕ Tambah
function insertPembayaran($koneksi, $id_pelanggan, $metode, $tanggal) {
    $query = "INSERT INTO pembayaran (ID_PELANGGAN, METODE_PEMBAYARAN, TANGGAL, TOTAL_PEMBAYARAN)
              VALUES ('$id_pelanggan', '$metode', '$tanggal', 0)";
    if (mysqli_query($koneksi, $query)) {
        $id_pembayaran = mysqli_insert_id($koneksi);
        $total = hitungTotalPembayaran($koneksi, $id_pembayaran);
        mysqli_query($koneksi, "UPDATE pembayaran SET TOTAL_PEMBAYARAN = '$total' WHERE ID_PEMBAYARAN = '$id_pembayaran'");
        return true;
    }
    return false;
}

// ✏️ Update
function updatePembayaran($koneksi, $id, $id_pelanggan, $metode, $tanggal) {
    $total = hitungTotalPembayaran($koneksi, $id);
    $query = "UPDATE pembayaran SET 
              ID_PELANGGAN = '$id_pelanggan',
              METODE_PEMBAYARAN = '$metode',
              TANGGAL = '$tanggal',
              TOTAL_PEMBAYARAN = '$total'
              WHERE ID_PEMBAYARAN = $id";
    return mysqli_query($koneksi, $query);
}

// 🗑️ Hapus
function deletePembayaran($koneksi, $id) {
    return mysqli_query($koneksi, "DELETE FROM pembayaran WHERE ID_PEMBAYARAN = $id");
}

// HANDLE FORM TAMBAH
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $metode       = $_POST['metode'];
    $tanggal      = $_POST['tanggal'];

    if (insertPembayaran($koneksi, $id_pelanggan, $metode, $tanggal)) {
        header("Location: index.php");
        exit;
    } else {
        echo "❌ Gagal tambah pembayaran: " . mysqli_error($koneksi);
    }
}

// HANDLE FORM EDIT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id           = $_POST['id'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $metode       = $_POST['metode'];
    $tanggal      = $_POST['tanggal'];

    if (updatePembayaran($koneksi, $id, $id_pelanggan, $metode, $tanggal)) {
        header("Location: index.php");
        exit;
    } else {
        echo "❌ Gagal update pembayaran: " . mysqli_error($koneksi);
    }
}

// HANDLE DELETE
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['Aksi']) && $_GET['Aksi'] == 'Hapus' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if (deletePembayaran($koneksi, $id)) {
        header("Location: pembayaran/index.php");
        exit;
    } else {
        echo "❌ Gagal hapus pembayaran";
    }
}
