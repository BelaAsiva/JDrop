<?= $this->extend('layout/main_sekolah') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin Sekolah | JDrop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body, html {
      height: 100%;
      margin: 0;
      background-color: #f4f6f9;
    }

    .full-container {
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .header-jdrop {
      background: linear-gradient(90deg, #28a745, #66bb6a);
      color: white;
      padding: 1rem 1.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo-img {
      width: 40px;
      height: 40px;
      object-fit: cover;
      border-radius: 50%;
      margin-right: 10px;
    }

    .header-left {
      display: flex;
      align-items: center;
    }

    .header-icons a {
      color: white;
      margin-left: 20px;
      font-size: 1.4rem;
      position: relative;
    }

    .header-icons a:hover {
      opacity: 0.85;
    }

    .content {
      flex: 1;
      padding: 2rem;
    }

    .nav-jdrop a {
      margin-right: 15px;
      margin-bottom: 10px;
    }

    .card-stat {
      border-left: 5px solid #28a745;
      padding: 1rem;
      transition: 0.3s;
    }

    .card-stat:hover {
      transform: translateY(-3px);
      cursor: pointer;
    }

    .card-icon {
      font-size: 2rem;
      color: #28a745;
    }

    .footer {
      padding: 1rem;
      text-align: center;
      background-color: #e9ecef;
      font-size: 0.9rem;
      color: #666;
    }

    /* Badge notifikasi */
    .badge-notif {
      position: absolute;
      top: 2px;
      right: 0;
      font-size: 0.6rem;
    }
  </style>
</head>
<body>

<div class="full-container">

  <!-- Header -->
  <div class="header-jdrop shadow">
    <div class="header-left">
      <img src="<?= base_url('img/logo.jpeg') ?>" class="logo-img" alt="Logo">
      <div>
        <h5 class="mb-0">Halo, <?= esc($username) ?> 👋</h5>
        <small>Selamat Datang di JDrop</small>
      </div>
    </div>

    <div class="header-icons">
      <a href="<?= base_url('admin-dlh/notifikasi') ?>" title="Notifikasi">
        <i class="bi bi-bell-fill"></i>
        <?php if (!empty($jumlahNotif)) : ?>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger badge-notif">
            <?= $jumlahNotif ?>
          </span>
        <?php endif ?>
      </a>
      <a href="<?= base_url('/logout') ?>" title="Logout"><i class="bi bi-box-arrow-right"></i></a>
    </div>
  </div>

  <!-- Content -->
  <div class="content">

    <!-- Navigasi -->
    <div class="nav-jdrop mb-4">
      <a href="<?= base_url('admin-sekolah/siswa') ?>" class="btn btn-outline-success">👦 Siswa</a>
      <a href="<?= base_url('admin-sekolah/setoran') ?>" class="btn btn-outline-success">🛢️ Setoran</a>
      <a href="<?= base_url('admin-sekolah/hadiah') ?>" class="btn btn-outline-success">🎁 Hadiah</a>
      <a href="<?= base_url('admin-sekolah/penukaran') ?>" class="btn btn-outline-success">🔁 Penukaran</a>
      <a href="<?= base_url('admin-sekolah/pengambilan') ?>" class="btn btn-outline-success">🚛 Pengambilan</a>
    </div>

    <!-- Statistik -->
    <div class="row g-3">
      <div class="col-md-4">
        <a href="<?= base_url('admin-sekolah/siswa') ?>" style="text-decoration: none; color: inherit;">
          <div class="card card-stat shadow-sm">
            <div class="d-flex align-items-center">
              <div class="me-3 card-icon">👦</div>
              <div>
                <h5><?= $totalSiswa ?></h5>
                <small>Total Siswa</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="<?= base_url('admin-sekolah/setoran') ?>" style="text-decoration: none; color: inherit;">
          <div class="card card-stat shadow-sm">
            <div class="d-flex align-items-center">
              <div class="me-3 card-icon">🛢️</div>
              <div>
                <h5><?= $totalLiter ?> liter</h5>
                <small>Jelantah Minggu Ini</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="<?= base_url('admin-sekolah/hadiah') ?>" style="text-decoration: none; color: inherit;">
          <div class="card card-stat shadow-sm">
            <div class="d-flex align-items-center">
              <div class="me-3 card-icon">🪙</div>
              <div>
                <h5><?= $totalKoin ?></h5>
                <small>Total Koin</small>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

    <!-- Peringkat -->
    <div class="card mt-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">🏆 Peringkat Siswa Terbaik</h5>
        <table class="table table-striped mt-3">
          <thead>
            <tr>
              <th>Rank</th>
              <th>Nama</th>
              <th>NISN</th>
              <th>Total Jelantah (L)</th>
              <th>Total Koin</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($peringkat)) : ?>
              <?php foreach ($peringkat as $i => $p) : ?>
              <tr>
                <td><?= $i + 1 ?></td>
                <td><?= esc($p['nama']) ?></td>
                <td><?= esc($p['nisn']) ?></td>
                <td><?= number_format($p['total_ml'] / 1000, 2) ?></td>
                <td><?= esc($p['total_poin']) ?></td>
              </tr>
              <?php endforeach ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="text-center text-muted">Belum ada data setoran.</td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- Footer -->
  <div class="footer">
    © <?= date('Y') ?> JDrop | Jelantah Drop 
  </div>

</div>

</body>
</html>
