<?php include '../koneksi.php';

function insertSupplier($koneksi, $id_supplier, $id_produk, $nama_supplier, $no_telp, $alamat, $email) {
    $query = "INSERT INTO supplier (ID_SUPPLIER, ID_PRODUK, NAMA_SUPPLIER, NO_TELP, ALAMAT, EMAIL) 
              VALUES ('$id_supplier', '$id_produk', '$nama_supplier', '$no_telp', '$alamat', '$email')";
    return mysqli_query($koneksi, $query);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Supplier</title>
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
    <h4>Tambah Supplier</h4>
    <a href="index.php" class="btn btn-secondary btn-sm">← Kembali</a>
  </div>

  <form method="POST" action="function.php">
    <div class="mb-3">
      <label class="form-label">ID Supplier</label>
      <input type="number" name="id_supplier" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">ID Produk</label>
      <input type="number" name="id_produk" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Nama Supplier</label>
      <input type="text" name="nama_supplier" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">No Telp</label>
      <input type="text" name="no_telp" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Alamat</label>
      <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control">
    </div>
    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
  </form>
</div>

</body>
</html>