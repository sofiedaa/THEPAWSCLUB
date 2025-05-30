<?php
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM produk WHERE ID_PRODUK = $id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk</title>
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
    <h4>Edit Produk</h4>
    <a href="index.php" class="btn btn-secondary btn-sm">← Kembali</a>
  </div>

  <form method="POST" action="function.php">
    <input type="hidden" name="id_produk" value="<?= $row['ID_PRODUK'] ?>">
    
    <div class="mb-3">
      <label class="form-label">Nama Produk</label>
      <input type="text" name="nama_produk" class="form-control" value="<?= $row['NAMA_PRODUK'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Kategori</label>
      <input type="text" name="kategori" class="form-control" value="<?= $row['KATEGORI'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Harga</label>
      <input type="number" step="0.01" name="harga" class="form-control" value="<?= $row['HARGA'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Stok</label>
      <input type="number" name="stock" class="form-control" value="<?= $row['STOCK'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Kode Produk</label>
      <input type="text" name="kode_produk" class="form-control" value="<?= $row['KODE_PRODUK'] ?>" required>
    </div>
    <button type="submit" name="edit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>