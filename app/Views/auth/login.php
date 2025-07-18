<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | JDrop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f4f6f9;
    }

    .login-box {
      max-width: 420px;
      margin: 80px auto;
    }

    .login-logo {
      font-size: 2rem;
      font-weight: bold;
      text-align: center;
      color: #28a745;
    }

    .login-logo img {
      width: 100px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="login-box card shadow p-4">
      <div class="login-logo">
        <img src="<?= base_url('img/logo.jpeg') ?>" alt="Logo" class="rounded-circle">
        <div>Login <span class="text-dark">JDrop</span></div>
      </div>

      <form method="post" action="<?= base_url('/login') ?>">
        <?php if (session()->getFlashdata('error')) : ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <div class="mb-3 mt-4">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Masuk</button>

        <div class="text-center mt-3 text-muted">
          <small>© <?= date('Y') ?> JDrop • JelantahDrop</small>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
