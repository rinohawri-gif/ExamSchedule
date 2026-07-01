<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include "../config/koneksi.php";

if(isset($_POST['simpan'])){

$nidn=$_POST['nidn'];
$nama=$_POST['nama_dosen'];
$hp=$_POST['no_hp'];

mysqli_query($conn,"INSERT INTO dosen(nidn,nama_dosen,no_hp)
VALUES('$nidn','$nama','$hp')");

header("Location:index.php");

}

$data=mysqli_query($conn,"SELECT * FROM dosen");
?>

<!DOCTYPE html>
<html>
<head>

<title>Data Dosen</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3>Data Dosen</h3>

<a href="../dashboard.php" class="btn btn-secondary mb-3">Kembali</a>

<form method="POST">

<div class="row">

<div class="col">
<input type="text" name="nidn" class="form-control" placeholder="NIDN" required>
</div>

<div class="col">
<input type="text" name="nama_dosen" class="form-control" placeholder="Nama Dosen" required>
</div>

<div class="col">
<input type="text" name="no_hp" class="form-control" placeholder="No HP" required>
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
<th>NIDN</th>
<th>Nama Dosen</th>
<th>No HP</th>
<th>Aksi</th>

</tr>

<?php

$no=1;

while($row=mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++ ?></td>

<td><?= $row['nidn'] ?></td>

<td><?= $row['nama_dosen'] ?></td>

<td><?= $row['no_hp'] ?></td>

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