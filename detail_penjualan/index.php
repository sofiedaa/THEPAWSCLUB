<?php 
include '../koneksi.php'; 
$data = mysqli_query($koneksi, "SELECT * FROM detail_penjualan"); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Detail Penjualan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f1f5f9; font-family: 'Segoe UI', sans-serif; }
    .container-box { max-width: 1000px; margin: 50px auto; background: white; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); padding: 30px; }
    h4 { font-weight: bold; margin-bottom: 25px; }
    .btn-primary { border-radius: 6px; }
    .table th { font-weight: 600; }
  </style>
</head>
<body>

<div class="container-box">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Data Detail Penjualan</h4>
    <div>
      <a href="../index.php" class="btn btn-secondary btn-sm">← Dashboard</a>
      <a href="tambah.php" class="btn btn-primary btn-sm">+ Tambah</a>
    </div>
  </div>

  <table class="table table-bordered table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>ID Produk</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
        <th>ID Pembayaran</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; while($row = mysqli_fetch_assoc($data)): ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><?= $row['ID_PRODUK'] ?></td>
        <td><?= $row['JUMLAH'] ?></td>
        <td>Rp<?= number_format($row['SUB_TOTAL'], 2, ',', '.') ?></td>
        <td><?= $row['ID_PEMBAYARAN'] ?></td>
        <td>
          <div class="d-flex gap-2">
            <a href="edit.php?id=<?= $row['ID_DETAIL'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="function.php?Aksi=Hapus&id=<?= $row['ID_DETAIL'] ?>" 
               class="btn btn-danger btn-sm" 
               onclick="return confirm('Yakin mau hapus data ini?')">Hapus</a>
          </div>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

</body>
</html>
