<?php 
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE ID_PEMBAYARAN = $id");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Pembayaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-box">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Edit Pembayaran</h4>
    <a href="index.php" class="btn btn-secondary btn-sm">← Kembali</a>
  </div>

  <form method="POST" action="function.php">
    <input type="hidden" name="id" value="<?= $row['ID_PEMBAYARAN'] ?>">
    
    <div class="mb-3">
      <label class="form-label">ID Pelanggan</label>
      <input type="text" name="id_pelanggan" class="form-control" value="<?= $row['ID_PELANGGAN'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Metode Pembayaran</label>
      <select name="metode" class="form-control">
        <option value="Cash" <?= $row['METODE_PEMBAYARAN'] == 'Cash' ? 'selected' : '' ?>>Cash</option>
        <option value="Transfer" <?= $row['METODE_PEMBAYARAN'] == 'Transfer' ? 'selected' : '' ?>>Transfer</option>
        <option value="QRIS" <?= $row['METODE_PEMBAYARAN'] == 'QRIS' ? 'selected' : '' ?>>QRIS</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Tanggal</label>
      <input type="date" name="tanggal" class="form-control" value="<?= $row['TANGGAL'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Total Pembayaran</label>
      <input type="number" name="total" class="form-control" value="<?= $row['TOTAL_PEMBAYARAN'] ?>" required>
    </div>

    <button type="submit" name="edit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>
