<?php 
include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin Petshop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f1f3f6;
      font-family: 'Segoe UI', sans-serif;
      color: #2c3e50;
    }
    .dashboard-container {
      max-width: 1200px;
      margin: 60px auto;
      padding: 20px;
    }
    .card-box {
      border: none;
      border-radius: 16px;
      background-color: #ffffff;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
      padding: 25px;
      transition: all 0.3s ease;
    }
    .card-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 28px rgba(0, 0, 0, 0.1);
    }
    .card-title {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 15px;
    }
    .btn-view {
      font-size: 0.9rem;
      font-weight: 500;
      padding: 6px 16px;
      color: #0d6efd;
      background-color: #f0f4ff;
      border: 1px solid #d6e4ff;
      border-radius: 6px;
      text-decoration: none;
      transition: background 0.2s ease;
    }
    .btn-view:hover {
      background-color: #e0edff;
      text-decoration: none;
    }
    .icon-box {
      font-size: 2.2rem;
      color: #0d6efd;
    }
  </style>
</head>
<body>

<div class="dashboard-container">
  <h3 class="mb-4 fw-bold text-center">Dashboard Admin Petshop 🐾</h3>

  <div class="row g-4">

    <?php
    $cards = [
      ["Hewan Peliharaan", "bi-heart", "hewan/index.php"],
      ["Pelanggan", "bi-people", "pelanggan/index.php"],
      ["Pegawai", "bi-person-badge", "pegawai/index.php"],
      ["Layanan", "bi-tools", "layanan/index.php"],
      ["Produk", "bi-box-seam", "produk/index.php"],
      ["Supplier", "bi-truck", "supplier/index.php"],
      ["Pembayaran", "bi-cash-coin", "pembayaran/index.php"],
      ["Transaksi Layanan", "bi-journal-check", "transaksi_layanan/index.php"],
      ["Detail Penjualan", "bi-receipt", "detail_penjualan/index.php"]
    ];

    foreach ($cards as [$title, $icon, $link]) {
      echo "
      <div class='col-md-4'>
        <div class='card-box'>
          <div class='d-flex justify-content-between align-items-center'>
            <div>
              <div class='card-title'>$title</div>
              <a href='$link' class='btn-view'>Lihat</a>
            </div>
            <div class='icon-box'><i class='bi $icon'></i></div>
          </div>
        </div>
      </div>";
    }
    ?>

  </div>
</div>

</body>
</html>
