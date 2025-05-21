<?php session_start(); ?>
<!doctype html>
<html lang="en" class="h-100">
<head>
  <title>XI RPL 1 · perpus</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url('assets/img/bg.jpg') center/cover no-repeat;
    }
    .glass {
      background: rgba(0,0,0,0.6);
      border-radius: 15px;
      padding: 40px;
      backdrop-filter: blur(4px);
      color: white;
    }
  </style>
</head>
<body class="d-flex h-100 align-items-center justify-content-center text-white">

  <div class="glass text-center col-md-6">
    <?php if (isset($_SESSION['username_baru'])): ?>
      <div class="alert alert-success bg-success bg-opacity-50 border-0">
        Username Anda adalah: <strong><?= $_SESSION['username_baru'] ?></strong><br>Silakan login menggunakan username ini.
      </div>
      <?php unset($_SESSION['username_baru']); ?>
    <?php endif; ?>

    <h1 class="mb-3">Selamat Datang</h1>
    <p class="lead mb-4">
      i love literasi
    </p>
    <div class="d-flex justify-content-center gap-3">
      <a href="login.php" class="btn btn-outline-light btn-lg">Login</a>
      <a href="register.php" class="btn btn-light btn-lg text-dark">Sign Up</a>
    </div>
  </div>

  <footer class="position-absolute bottom-0 w-100 text-center text-white-50 pb-3">
    <p class="mb-0">&copy; 2024 XI RPL 1. All Rights Reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


