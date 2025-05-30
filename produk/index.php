<?php include '../koneksi.php'; 
$data = mysqli_query($koneksi, "SELECT * FROM produk");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Produk</title>
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
    <h4>Data Produk</h4>
    <div>
      <a href="../index.php" class="btn btn-secondary btn-sm">← Dashboard</a>
      <a href="tambah.php" class="btn btn-primary btn-sm">+ Tambah</a>
    </div>
  </div>

  <table class="table table-bordered table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>Kode Produk</th> <!-- kolom baru -->
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stock</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; while($row = mysqli_fetch_assoc($data)): ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><?= $row['KODE_PRODUK'] ?></td> <!-- isi kode produk -->
        <td><?= $row['NAMA_PRODUK'] ?></td>
        <td>Rp <?= number_format($row['HARGA'], 0, ',', '.') ?></td>
        <td><?= $row['STOCK'] ?></td>
        <td>
          <span class="badge bg-<?= $row['STATUS'] == 'aktif' ? 'success' : 'secondary' ?>">
            <?= ucfirst($row['STATUS']) ?>
          </span>
        </td>
        <td>
          <a href="edit.php?id=<?= $row['ID_PRODUK'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="toggle_status.php?id=<?= $row['ID_PRODUK'] ?>" class="btn btn-outline-primary btn-sm">
            <?= $row['STATUS'] == 'aktif' ? 'Nonaktifkan' : 'Aktifkan' ?>
          </a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

</body>
</html>
