<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include "../config/koneksi.php";

if(isset($_POST['simpan'])){

$kode=$_POST['kode_ruangan'];
$nama=$_POST['nama_ruangan'];
$kapasitas=$_POST['kapasitas'];

mysqli_query($conn,"INSERT INTO ruangan(kode_ruangan,nama_ruangan,kapasitas)
VALUES('$kode','$nama','$kapasitas')");

header("Location:index.php");

}

$data=mysqli_query($conn,"SELECT * FROM ruangan");
?>

<!DOCTYPE html>
<html>
<head>

<title>Data Ruangan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3>Data Ruangan</h3>

<a href="../dashboard.php" class="btn btn-secondary mb-3">Kembali</a>

<form method="POST">

<div class="row">

<div class="col">
<input type="text" name="kode_ruangan" class="form-control" placeholder="Kode Ruangan" required>
</div>

<div class="col">
<input type="text" name="nama_ruangan" class="form-control" placeholder="Nama Ruangan" required>
</div>

<div class="col">
<input type="number" name="kapasitas" class="form-control" placeholder="Kapasitas" required>
</div>

<div class="col">
<button class="btn btn-primary" name="simpan">Simpan</button>
</div>

</div>

</form>

<hr>

<table class="table table-bordered">

<tr>

<th>No</th>
<th>Kode</th>
<th>Nama Ruangan</th>
<th>Kapasitas</th>
<th>Aksi</th>

</tr>

<?php

$no=1;

while($row=mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++ ?></td>

<td><?= $row['kode_ruangan'] ?></td>

<td><?= $row['nama_ruangan'] ?></td>

<td><?= $row['kapasitas'] ?></td>

<td>

<a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>

<a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Hapus data?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>