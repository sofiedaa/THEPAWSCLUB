<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Layanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f1f5f9; font-family: 'Segoe UI', sans-serif; }
    .container-box { max-width: 700px; margin: 50px auto; background: white; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); padding: 30px; }
    h4 { font-weight: bold; margin-bottom: 25px; }
  </style>
</head>
<body>

<div class="container-box mt-5 p-4 bg-white rounded shadow">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Tambah Layanan</h4>
    <a href="index.php" class="btn btn-secondary btn-sm">← Kembali</a>
  </div>

  <form method="POST" action="function.php">
    <div class="mb-3">
      <label class="form-label">Nama Layanan</label>
      <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
  <label class="form-label">ID Pegawai</label>
  <select name="id_pegawai" class="form-control" required>
    <option value="">-- Pilih Pegawai --</option>
    <?php 
      include '../koneksi.php';
      $pegawai = mysqli_query($koneksi, "SELECT ID_PEGAWAI, POSISI FROM pegawai");
      while ($row = mysqli_fetch_assoc($pegawai)) {
          echo "<option value='{$row['ID_PEGAWAI']}'>
                {$row['ID_PEGAWAI']} - {$row['POSISI']}
                </option>";
      }
    ?>
  </select>
</div>

    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Durasi</label>
      <input type="text" name="durasi" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Harga</label>
      <input type="number" name="harga" class="form-control" required>
    </div>

    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
  </form>
</div>

</body>
</html>
