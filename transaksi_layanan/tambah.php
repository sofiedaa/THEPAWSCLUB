<?php include '../koneksi.php';
function insertTransaksiLayanan($koneksi, $id_pembayaran, $id_layanan, $jumlah, $total_harga) {
    $query = "INSERT INTO transaksi_layanan (ID_PEMBAYARAN, ID_LAYANAN, JUMLAH, TOTAL_HARGA)
              VALUES ('$id_pembayaran', '$id_layanan', '$jumlah', '$total_harga')";
    return mysqli_query($koneksi, $query);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Transaksi Layanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f1f5f9; font-family: 'Segoe UI', sans-serif; }
    .container-box { max-width: 700px; margin: 50px auto; background: white; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); padding: 30px; }
    h4 { font-weight: bold; margin-bottom: 25px; }
  </style>
</head>
<body>

<div class="container-box">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Tambah Transaksi Layanan</h4>
    <a href="index.php" class="btn btn-secondary btn-sm">← Kembali</a>
  </div>

  <form method="POST" action="function.php">
    <div class="mb-3">
      <label class="form-label">ID Pembayaran</label>
      <input type="text" name="id_pembayaran" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">ID Layanan</label>
      <input type="text" name="id_layanan" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Jumlah</label>
      <input type="number" name="tanggal" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Total Harga</label>
      <input type="text" value="Akan dihitung otomatis" readonly>
    </div>
    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
  </form>
</div>

</body>
</html>
