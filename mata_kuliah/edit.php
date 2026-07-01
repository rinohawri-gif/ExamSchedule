<?php
include "../config/koneksi.php";

$id=$_GET['id'];

$data=mysqli_query($conn,"SELECT * FROM mata_kuliah WHERE id='$id'");
$row=mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

$kode=$_POST['kode_mk'];
$nama=$_POST['nama_mk'];
$semester=$_POST['semester'];
$sks=$_POST['sks'];

mysqli_query($conn,"UPDATE mata_kuliah SET
kode_mk='$kode',
nama_mk='$nama',
semester='$semester',
sks='$sks'
WHERE id='$id'");

header("Location:index.php");

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Mata Kuliah</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3>Edit Mata Kuliah</h3>

<form method="POST">

<label>Kode MK</label>

<input
type="text"
name="kode_mk"
class="form-control"
value="<?= $row['kode_mk'] ?>">

<label>Nama Mata Kuliah</label>

<input
type="text"
name="nama_mk"
class="form-control"
value="<?= $row['nama_mk'] ?>">

<label>Semester</label>

<input
type="number"
name="semester"
class="form-control"
value="<?= $row['semester'] ?>">

<label>SKS</label>

<input
type="number"
name="sks"
class="form-control"
value="<?= $row['sks'] ?>">

<br>

<button
class="btn btn-success"
name="update">

Update

</button>

<a href="index.php" class="btn btn-secondary">Kembali</a>

</form>

</div>

</body>

</html>