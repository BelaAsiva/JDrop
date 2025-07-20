<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'JDrop') ?></title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    html, body {
      height: 100%;
      margin: 0;
      background-color: #f4f6f9;
    }

    .header-jdrop {
      background: linear-gradient(90deg, #007bff, #00b4d8);
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
    }

    .header-icons a:hover {
      opacity: 0.85;
    }

    .main-wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .main-content {
      flex: 1;
      padding: 2rem;
    }

    .nav-fitur {
      margin-top: 1rem;
      margin-bottom: 2rem;
    }

    .nav-fitur .btn {
      margin-right: 10px;
      margin-bottom: 10px;
    }

    footer {
      padding: 1rem;
      text-align: center;
      background-color: #e9ecef;
      font-size: 0.9rem;
      color: #666;
    }
  </style>
</head>
<body>

<div class="main-wrapper">

  <!-- Header -->
  <div class="header-jdrop shadow-sm">
    <div class="header-left">
      <img src="<?= base_url('img/logo.jpeg') ?>" class="logo-img" alt="Logo">
      <div>
        <h5 class="mb-0">Halo, <?= esc(session('username') ?? 'Pengguna') ?> 👋</h5>
        <small>JDrop • Jelantah Drop</small>
      </div>
    </div>
    <div class="header-icons">
      <a href="<?= base_url('admin-dlh/notifikasi') ?>" title="Notifikasi"><i class="bi bi-bell-fill"></i></a>
      <a href="<?= base_url('/logout') ?>" title="Logout"><i class="bi bi-box-arrow-right"></i></a>
    </div>
  </div>


  <!-- Konten Dinamis -->
  <main class="container main-content">
    <?= $this->renderSection('content') ?>
  </main>

  <!-- Footer -->
  <footer>
    © <?= date('Y') ?> JDrop • Jelantah Drop
  </footer>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
