<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
  echo "ID tidak ditemukan!";
  exit;
}

$id = intval($_GET['id']);
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM buku WHERE id=$id"));

if (!$data) {
  echo "Data tidak ditemukan!";
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $judul    = htmlspecialchars(trim($_POST['judul']));
  $tahun    = htmlspecialchars(trim($_POST['tahun']));
  $penerbit = htmlspecialchars(trim($_POST['penerbit']));
  $isi      = htmlspecialchars(trim($_POST['isi']));

  $update = "UPDATE buku SET judul='$judul', tahun='$tahun', penerbit='$penerbit', isi='$isi' WHERE id=$id";
  if (mysqli_query($koneksi, $update)) header("Location: dashboard.php");
  else echo "Error: " . mysqli_error($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="#">biya</a>
  <div>
    <a href="index.php" class="btn btn-outline-light me-2">Home</a>
    <a href="dashboard.php" class="btn btn-outline-light me-2">Data</a>
    <a href="index.php" class="btn btn-danger">Logout</a>
  </div>
</nav>

<div class="container mt-5">
  <h3 class="text-center">Edit Data</h3>
  <form method="POST" class="col-lg-4 mx-auto mt-3">
    <?php
      $fields = ["judul" => "Judul", "tahun" => "Tahun Terbit", "penerbit" => "Penerbit", "isi" => "Isi"];
      foreach ($fields as $name => $label) {
        $value = htmlspecialchars($data[$name]);
        echo "<div class='mb-3'>
                <label class='form-label'>$label</label>
                <input type='text' name='$name' class='form-control' value='$value' required>
              </div>";
      }
    ?>
    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="dashboard.php" class="btn btn-danger">Batal</a>
    </div>
  </form>
</div>
</body>
</html>
