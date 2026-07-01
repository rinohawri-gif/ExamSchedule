<?php
include "../config/koneksi.php";

$id=$_GET['id'];

$data=mysqli_query($conn,"SELECT * FROM ruangan WHERE id='$id'");
$row=mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

$kode=$_POST['kode_ruangan'];
$nama=$_POST['nama_ruangan'];
$kapasitas=$_POST['kapasitas'];

mysqli_query($conn,"UPDATE ruangan SET

kode_ruangan='$kode',
nama_ruangan='$nama',
kapasitas='$kapasitas'

WHERE id='$id'");

header("Location:index.php");

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Ruangan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3>Edit Ruangan</h3>

<form method="POST">

<label>Kode Ruangan</label>

<input type="text" class="form-control" name="kode_ruangan"
value="<?= $row['kode_ruangan']?>">

<label>Nama Ruangan</label>

<input type="text" class="form-control" name="nama_ruangan"
value="<?= $row['nama_ruangan']?>">

<label>Kapasitas</label>

<input type="number" class="form-control" name="kapasitas"
value="<?= $row['kapasitas']?>">

<br>

<button class="btn btn-success" name="update">Update</button>

<a href="index.php" class="btn btn-secondary">Kembali</a>

</form>

</div>

</body>
</html>