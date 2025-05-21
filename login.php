<?php
session_start();
include "koneksi.php";

$error = "";

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
  $d = mysqli_fetch_array($data);

  if ($d) {
    if (password_verify($password, $d['password'])) {
      $_SESSION['username'] = $username;
      header("Location: dashboard.php");
      exit;
    } else {
      $error = "Password salah, silakan coba lagi.";
    }
  } else {
    $error = "Username tidak ditemukan.";
  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Konter</title>
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
      max-width: 350px;
      padding: 20px;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="card bg-light">
    <h4 class="text-center mb-4">Silakan Login</h4>
    <?php if (!empty($error)) echo "<div class='text-danger mb-3'>$error</div>"; ?>
    <form method="post">
      <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
      <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
      <button type="submit" class="btn btn-success w-100">Login</button>
    </form>
  </div>
</body>
</html>


