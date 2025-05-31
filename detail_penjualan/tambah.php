<?php include '../koneksi.php'; 

function insertDetail($koneksi, $id_produk, $jumlah, $subtotal, $id_pembayaran) {
  $query = "INSERT INTO detail_penjualan (ID_PRODUK, JUMLAH, SUB_TOTAL, ID_PEMBAYARAN) 
            VALUES ('$id_produk', '$jumlah', '$subtotal', '$id_pembayaran')";
  return mysqli_query($koneksi, $query);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Detail Penjualan</title>
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
    <h4>Tambah Detail Penjualan</h4>
    <a href="index.php" class="btn btn-secondary btn-sm">← Kembali</a>
  </div>

  <form method="POST" action="function.php">
    <div class="mb-3">
      <label class="form-label">Produk</label>
      <select name="id_produk" class="form-control" required>
        <option value="">-- Pilih Produk --</option>
        <?php 
        $produk = mysqli_query($koneksi, "SELECT ID_PRODUK, NAMA_PRODUK FROM produk");
        while ($p = mysqli_fetch_assoc($produk)) {
            echo "<option value='{$p['ID_PRODUK']}'>{$p['NAMA_PRODUK']} (ID: {$p['ID_PRODUK']})</option>";
        }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Jumlah</label>
      <input type="number" name="jumlah" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Subtotal</label>
      <input type="text" value="Akan dihitung otomatis" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">ID Pembayaran</label>
      <input type="number" name="id_pembayaran" class="form-control" required>

    </div>

    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
  </form>
</div>

</body>
</html>
