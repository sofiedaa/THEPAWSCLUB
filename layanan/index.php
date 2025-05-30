<?php include '../koneksi.php'; $data = mysqli_query($koneksi, "SELECT * FROM layanan"); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Layanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  body {
    background-color: #f1f5f9;
    font-family: 'Segoe UI', sans-serif;
  }
  .container-box {
    max-width: 1000px;
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
  .deskripsi-kecil {
    max-width: 200px;
    word-wrap: break-word;
    white-space: normal;
  }
  .btn-action {
    display: flex;
    gap: 6px;
    justify-content: center;
  }
</style>
</head>
<body>

<div class="container-box">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Data Layanan</h4>
    <div>
      <a href="../index.php" class="btn btn-secondary btn-sm">← Dashboard</a>
      <a href="tambah.php" class="btn btn-primary btn-sm">+ Tambah</a>
    </div>
  </div>

  <table class="table table-bordered table-hover align-middle">
    <thead class="table-light text-center">
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>ID Pegawai</th>
        <th>Deskripsi</th>
        <th>Durasi</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; while($row = mysqli_fetch_assoc($data)): ?>
      <tr>
        <td class="text-center"><?= $i++ ?></td>
        <td><?= $row['Nama_Layanan'] ?></td>
        <td class="text-center"><?= $row['Id_Pegawai'] ?></td>
        <td><div class="deskripsi-kecil"><?= $row['Deskripsi'] ?></div></td>
        <td class="text-center"><?= $row['Durasi'] ?></td>
        <td class="text-end">Rp <?= number_format($row['Harga'], 0, ',', '.') ?></td>
        <td>
          <div class="btn-action">
            <a href="edit.php?id=<?= $row['Id_Layanan'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="function.php?Aksi=Hapus&id=<?= $row['Id_Layanan'] ?>" 
               class="btn btn-danger btn-sm"
               onclick="return confirm('Yakin mau hapus layanan ini?')">Hapus</a>
          </div>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

</body>
</html>
