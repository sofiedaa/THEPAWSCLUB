<?php include '../koneksi.php'; 
function insertPegawai($koneksi, $nama, $posisi, $no_telp, $email) {
    $query = "INSERT INTO pegawai (NAMA, POSISI, NO_TELP, EMAIL)
              VALUES ('$nama', '$posisi', '$no_telp', '$email')";
    return mysqli_query($koneksi, $query);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Pegawai</title>
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
    <h4>Tambah Pegawai</h4>
    <a href="index.php" class="btn btn-secondary btn-sm">← Kembali</a>
  </div>

  <form method="POST" action="function.php">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Posisi</label>
      <select name="posisi" class="form-control" required>
        <option value="">-- Pilih Posisi --</option>
        <option value="Groomer">Groomer</option>
        <option value="StaffToko">Staff Toko</option>
        <option value="Kasir">Kasir</option>
        <option value="StaffGudang">Staff Gudang</option>
        <option value="PetCare">Pet Care</option>        
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">No Telp</label>
      <input type="text" name="no_telp" class="form-control" required>
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
