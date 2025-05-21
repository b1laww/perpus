<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM buku WHERE id = $id";
    mysqli_query($koneksi, $query);
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="create.php">Tambah Data</a></li>
      </ul>
      <a href="index.php"><button class="btn btn-danger">Logout</button></a>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h3 class="text-center mb-4">Data Buku</h3>
  <?php
    include 'koneksi.php';
    $result = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id DESC");

    if (mysqli_num_rows($result) > 0):
  ?>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Tahun</th>
          <th>Penerbit</th>
          <th>Isi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= htmlspecialchars($row['judul']) ?></td>
          <td><?= htmlspecialchars($row['tahun']) ?></td>
          <td><?= htmlspecialchars($row['penerbit']) ?></td>
          <td><?= htmlspecialchars($row['isi']) ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Ubah</a>
            <a href="dashboard.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <?php else: ?>
    <div class="alert alert-info text-center">Tidak ada data.</div>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
