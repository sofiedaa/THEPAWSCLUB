<?php 
include '../koneksi.php'; 
$data = mysqli_query($koneksi, "SELECT * FROM hewan_peliharaan"); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Hewan Peliharaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f1f5f9; font-family: 'Segoe UI', sans-serif; }
    .container-box { max-width: 900px; margin: 50px auto; background: white; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); padding: 30px; }
    h4 { font-weight: bold; margin-bottom: 25px; }
    .btn-primary { border-radius: 6px; }
    .table th { font-weight: 600; }
  </style>
</head>
<body>

<div class="container-box">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Data Hewan Peliharaan</h4>
    <div>
      <a href="../index.php" class="btn btn-secondary btn-sm">← Dashboard</a>
      <a href="tambah.php" class="btn btn-primary btn-sm">+ Tambah</a>
    </div>
  </div>

  <table class="table table-bordered table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>Nama Hewan</th>
        <th>Jenis</th>
        <th>Usia</th>
        <th>Berat</th>
        <th>ID Pelanggan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; while($row = mysqli_fetch_assoc($data)): ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><?= $row['NAMA_HEWAN'] ?></td>
        <td><?= $row['JENIS'] ?></td>
        <td><?= $row['USIA'] ?> th</td>
        <td><?= $row['BERAT'] ?> kg</td>
        <td><?= $row['ID_PELANGGAN'] ?></td>
        <td>
          <a href="edit.php?id=<?= $row['Id_hewan'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="function.php?Aksi=Hapus&id=<?= $row['Id_hewan'] ?>" 
             class="btn btn-danger btn-sm" 
             onclick="return confirm('Yakin mau hapus data ini?')">Hapus</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

</body>
</html>
