<?php
include '../koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM transaksi_layanan");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Transaksi Layanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f1f5f9; font-family: 'Segoe UI', sans-serif; }
    .container-box { max-width: 900px; margin: 50px auto; background: white; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); padding: 30px; }
    h4 { font-weight: bold; margin-bottom: 25px; }
  </style>
</head>
<body>

<div class="container-box">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Data Transaksi Layanan</h4>
    <div>
      <a href="../index.php" class="btn btn-secondary btn-sm">← Dashboard</a>
      <a href="tambah.php" class="btn btn-primary btn-sm">+ Tambah</a>
    </div>
  </div>

  <table class="table table-bordered table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>ID Pelanggan</th>
        <th>ID Layanan</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; while($row = mysqli_fetch_assoc($data)): ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><?= $row['ID_PELANGGAN'] ?></td>
        <td><?= $row['ID_LAYANAN'] ?></td>
        <td><?= $row['JUMLAH'] ?></td>
        <td>Rp <?= number_format($row['TOTAL_HARGA'], 0, ',', '.') ?></td>
        <td>
          <a href="edit.php?id=<?= $row['ID_TRANSAKSI'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="function.php?Aksi=Hapus&id=<?= $row['ID_TRANSAKSI'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus data ini?')">Hapus</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

</body>
</html>
