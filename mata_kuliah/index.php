<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include "../config/koneksi.php";

// Tambah Data
if(isset($_POST['simpan'])){
    $kode = $_POST['kode_mk'];
    $nama = $_POST['nama_mk'];
    $semester = $_POST['semester'];
    $sks = $_POST['sks'];

    mysqli_query($conn,"INSERT INTO mata_kuliah(kode_mk,nama_mk,semester,sks)
    VALUES('$kode','$nama','$semester','$sks')");

    header("Location:index.php");
}

$data = mysqli_query($conn,"SELECT * FROM mata_kuliah");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Mata Kuliah</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<h3>Data Mata Kuliah</h3>

<a href="../dashboard.php" class="btn btn-secondary mb-3">Kembali</a>

<form method="POST">

<div class="row">

<div class="col">
<input type="text" name="kode_mk" class="form-control" placeholder="Kode MK" required>
</div>

<div class="col">
<input type="text" name="nama_mk" class="form-control" placeholder="Nama Mata Kuliah" required>
</div>

<div class="col">
<input type="number" name="semester" class="form-control" placeholder="Semester" required>
</div>

<div class="col">
<input type="number" name="sks" class="form-control" placeholder="SKS" required>
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
<th>Nama Mata Kuliah</th>
<th>Semester</th>
<th>SKS</th>
<th>Aksi</th>

</tr>

<?php
$no=1;
while($row=mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $row['kode_mk'] ?></td>

<td><?= $row['nama_mk'] ?></td>

<td><?= $row['semester'] ?></td>

<td><?= $row['sks'] ?></td>

<td>

<a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>

<a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>