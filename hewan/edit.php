<?php
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM hewan_peliharaan WHERE ID_HEWAN = '$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Hewan Peliharaan</title>
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
    <h4>Edit Hewan Peliharaan</h4>
    <a href="index.php" class="btn btn-secondary btn-sm">← Kembali</a>
  </div>

  <form method="POST" action="function.php">
    <input type="hidden" name="id_hewan" value="<?= $row['ID_HEWAN'] ?>">


    <div class="mb-3">
      <label class="form-label">Nama Hewan</label>
      <input type="text" name="nama_hewan" class="form-control" value="<?= $row['NAMA_HEWAN'] ?>" required>
    </div>
    
    <div class="mb-3">
      <label class="form-label">Jenis</label>
      <input type="text" name="jenis" class="form-control" value="<?= $row['JENIS'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Usia</label>
      <input type="number" name="usia" class="form-control" value="<?= $row['USIA'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Berat (kg)</label>
      <input type="number" step="0.1" name="berat" class="form-control" value="<?= $row['BERAT'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">ID Pelanggan</label>
      <select name="id_pelanggan" class="form-control" required>
  <option value="">-- Pilih Pelanggan --</option>
  <?php 
  $query = mysqli_query($koneksi, "SELECT Id_Pelanggan, Nama FROM pelanggan");
  while ($data = mysqli_fetch_assoc($query)) {
      echo "<option value='{$data['Id_Pelanggan']}'>{$data['Nama']} (ID: {$data['Id_Pelanggan']})</option>";
  }
  ?>

</select>
    </div>
    <button type="submit" name="edit" class="btn btn-primary">Update</button>
  </form>
</div>


</body>
</html>
