<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Splash JDrop</title>

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: white;
      overflow: hidden;
    }

    #logo {
      animation: spin 2.5s ease-in-out;
      cursor: pointer;
    }

    @keyframes spin {
      0% { transform: rotate(0deg) scale(1); }
      50% { transform: rotate(180deg) scale(1.3); }
      100% { transform: rotate(360deg) scale(1.5); }
    }

    .center-screen {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    h4 {
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <div class="center-screen">
    <!-- Logo Splash yang bisa diklik -->
    <img id="logo" class="rounded-circle" src="<?= base_url('img/logo.jpeg') ?>" alt="Logo JDrop" width="180"
         onclick="window.location.href='<?= base_url('/login') ?>'">
  </div>

</body>
</html>
