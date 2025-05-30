<?php
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM layanan WHERE Id_Layanan = $id");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Layanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-box mt-5 p-4 bg-white rounded shadow">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Edit Layanan</h4>
    <a href="index.php" class="btn btn-secondary btn-sm">← Kembali</a>
  </div>

  <form method="POST" action="function.php">
    <input type="hidden" name="id" value="<?= $row['Id_Layanan'] ?>">

    <div class="mb-3">
      <label class="form-label">Nama Layanan</label>
      <input type="text" name="nama" class="form-control" value="<?= $row['Nama_Layanan'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">ID Pegawai</label>
      <input type="text" name="id_pegawai" class="form-control" value="<?= $row['Id_Pegawai'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" required><?= $row['Deskripsi'] ?></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Durasi</label>
      <input type="text" name="durasi" class="form-control" value="<?= $row['Durasi'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Harga</label>
      <input type="number" name="harga" class="form-control" value="<?= $row['Harga'] ?>" required>
    </div>

    <button type="submit" name="edit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>
