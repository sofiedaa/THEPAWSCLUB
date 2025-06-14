<?php
include '../koneksi.php';
$id = $_GET['id'];

// ambil data pegawai berdasarkan id
$data = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE ID_PEGAWAI = $id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Pegawai</title>
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
    <h4>Edit Pegawai</h4>
    <a href="index.php" class="btn btn-secondary btn-sm">← Kembali</a>
  </div>

  <form method="POST" action="function.php">
    <input type="hidden" name="id" value="<?= $row['ID_PEGAWAI'] ?>">
    
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= $row['NAMA'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Posisi</label>
      <input type="text" name="posisi" class="form-control" value="<?= $row['POSISI'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">No Telp</label>
      <input type="text" name="no_telp" class="form-control" value="<?= $row['NO_TELP'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?= $row['EMAIL'] ?>">
    </div>
    
    <button type="submit" name="edit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>
