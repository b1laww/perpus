<?php
include "koneksi.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $username = str_replace(' ', '_', strtolower($nama)) . rand(10, 100);

    mysqli_query($koneksi, "INSERT INTO user VALUES('', '$nama', '$email', '$username', '$password')");
    $_SESSION['username_baru'] = $username;
    header("Location: index.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar - Konter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #eee;
      display: flex;
      height: 100vh;
      align-items: center;
      justify-content: center;
    }
    .card {
      width: 100%;
      max-width: 400px;
      padding: 20px;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="card bg-light">
    <h4 class="text-center mb-4">Daftar Akun Baru</h4>
    <form method="post">
      <input type="text" name="nama" class="form-control mb-3" placeholder="Nama" required>
      <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
      <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
      <button type="submit" class="btn btn-primary w-100">Mendaftar Sekarang</button>
    </form>
  </div>
</body>
</html>

