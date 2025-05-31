<?php include '../koneksi.php'; 
function insertHewan($koneksi, $id_hewan, $jenis, $usia, $berat, $id_pelanggan, $nama_hewan) {
  $query = "INSERT INTO hewan_peliharaan (ID_HEWAN, JENIS, USIA, BERAT, ID_PELANGGAN, NAMA_HEWAN) 
            VALUES ('$id_hewan', '$jenis', '$usia', '$berat', '$id_pelanggan', '$nama_hewan')";
  return mysqli_query($koneksi, $query);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Hewan Peliharaan</title>
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
    <h4>Tambah Hewan Peliharaan</h4>
    <a href="index.php" class="btn btn-secondary btn-sm">← Kembali</a>
  </div>

  <form method="POST" action="function.php">
    <div class="mb-3">
      <label class="form-label">Nama Hewan</label>
      <input type="text" name="nama_hewan" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Jenis</label>
      <input type="text" name="jenis" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Usia (tahun)</label>
      <input type="number" name="usia" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Berat (kg)</label>
      <input type="number" step="0.01" name="berat" class="form-control" required>
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
    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
  </form>
</div>

</body>
</html>
