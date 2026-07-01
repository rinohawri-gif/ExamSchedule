<?php
include "../config/koneksi.php";

$id=$_GET['id'];

$data=mysqli_query($conn,"SELECT * FROM dosen WHERE id='$id'");
$row=mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

$nidn=$_POST['nidn'];
$nama=$_POST['nama_dosen'];
$hp=$_POST['no_hp'];

mysqli_query($conn,"UPDATE dosen SET
nidn='$nidn',
nama_dosen='$nama',
no_hp='$hp'
WHERE id='$id'");

header("Location:index.php");

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Dosen</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3>Edit Dosen</h3>

<form method="POST">

<label>NIDN</label>

<input type="text" name="nidn" class="form-control" value="<?= $row['nidn'] ?>">

<label>Nama Dosen</label>

<input type="text" name="nama_dosen" class="form-control" value="<?= $row['nama_dosen'] ?>">

<label>No HP</label>

<input type="text" name="no_hp" class="form-control" value="<?= $row['no_hp'] ?>">

<br>

<button class="btn btn-success" name="update">Update</button>

<a href="index.php" class="btn btn-secondary">Kembali</a>

</form>

</div>

</body>
</html>