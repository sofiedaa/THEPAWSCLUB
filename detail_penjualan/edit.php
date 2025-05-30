<?php
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM detail_penjualan WHERE ID_DETAIL = '$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Detail Penjualan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f1f5f9;
      font-family: 'Segoe UI', sans-serif;
    }
    .container-box {
      max-width: 700px;
      margin: 50px auto;
      background: white;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      padding: 30px;
    }
    h4 {
      font-weight: bold;
      margin-bottom: 25px;
    }
  </style>
</head>
<body>

<div class="container-box">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Edit Detail Penjualan</h4>
    <a href="index.php" class="btn btn-secondary btn-sm">← Kembali</a>
  </div>

  <form method="POST" action="function.php">
    <input type="hidden" name="id_detail" value="<?= $row['ID_DETAIL'] ?>">

    <div class="mb-3">
      <label class="form-label">ID Produk</label>
      <input type="number" name="id_produk" class="form-control" value="<?= $row['ID_PRODUK'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Jumlah</label>
      <input type="number" name="jumlah" class="form-control" value="<?= $row['JUMLAH'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Subtotal</label>
      <input type="number" step="0.01" name="subtotal" class="form-control" value="<?= $row['SUBTOTAL'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">ID Pembayaran</label>
      <input type="number" name="id_pembayaran" class="form-control" value="<?= $row['ID_PEMBAYARAN'] ?>" required>
    </div>

    <button type="submit" name="edit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>
