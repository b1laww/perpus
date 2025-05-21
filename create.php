<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="#"></a>
  <div>
    <a href="index.php" class="btn btn-outline-light me-2">Home</a>
    <a href="dashboard.php" class="btn btn-outline-light me-2">Data</a>
    <a href="index.php" class="btn btn-danger">Logout</a>
  </div>
</nav>

<div class="container mt-5">
  <h3 class="text-center">Tambah Data Baru</h3>
  <form method="POST" class="col-lg-4 mx-auto mt-3">
    <?php
      include 'koneksi.php';
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $judul = htmlspecialchars(trim($_POST['judul']));
        $tahun = htmlspecialchars(trim($_POST['tahun']));
        $penerbit = htmlspecialchars(trim($_POST['penerbit']));
        $isi = htmlspecialchars(trim($_POST['isi']));
        $sql = "INSERT INTO buku (judul, tahun, penerbit, isi) VALUES ('$judul', '$tahun', '$penerbit', '$isi')";
        if (mysqli_query($koneksi, $sql)) header("Location: dashboard.php");
        else echo "<div class='alert alert-danger'>Data Gagal Disimpan.</div>";
      }

      $fields = ["judul" => "Judul", "tahun" => "Tahun Terbit", "penerbit" => "Penerbit", "isi" => "Isi"];
      foreach ($fields as $name => $label) {
        echo "<div class='mb-3'>
                <label class='form-label'>$label</label>
                <input type='" . ($name == "tahun" ? "textarea" : "text") . "' name='$name' class='form-control' required>
              </div>";
      }
    ?>
    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-success">Tambah</button>
      <a href="dashboard.php" class="btn btn-danger">Batal</a>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
