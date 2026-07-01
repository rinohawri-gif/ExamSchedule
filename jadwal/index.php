<?php
include "../config/koneksi.php";

// Simpan Data
if (isset($_POST['simpan'])) {

    $mk_id = $_POST['mk_id'];
    $dosen_id = $_POST['dosen_id'];
    $ruangan_id = $_POST['ruangan_id'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $kelas = $_POST['kelas'];

    mysqli_query($conn, "INSERT INTO jadwal
    (mk_id,dosen_id,ruangan_id,hari,tanggal,jam,kelas)
    VALUES
    ('$mk_id','$dosen_id','$ruangan_id','$hari','$tanggal','$jam','$kelas')");

    echo "<script>
    alert('Data berhasil disimpan');
    window.location='index.php';
    </script>";
}

// Data Dropdown
$mk = mysqli_query($conn, "SELECT * FROM mata_kuliah");
$dosen = mysqli_query($conn, "SELECT * FROM dosen");
$ruangan = mysqli_query($conn, "SELECT * FROM ruangan");
?>

<!DOCTYPE html>
<html>

<head>

<title>Data Jadwal Ujian</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Data Jadwal Ujian</h2>

<a href="../dashboard.php" class="btn btn-dark mb-3">
Kembali
</a>

<form method="POST">

<div class="row">

<div class="col-md-4 mb-3">

<select name="mk_id" class="form-control" required>

<option value="">Pilih Mata Kuliah</option>

<?php while($m=mysqli_fetch_assoc($mk)){ ?>

<option value="<?= $m['id']; ?>">

<?= $m['nama_mk']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-4 mb-3">

<select name="dosen_id" class="form-control" required>

<option value="">Pilih Dosen</option>

<?php while($d=mysqli_fetch_assoc($dosen)){ ?>

<option value="<?= $d['id']; ?>">

<?= $d['nama_dosen']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-4 mb-3">

<select name="ruangan_id" class="form-control" required>

<option value="">Pilih Ruangan</option>

<?php while($r=mysqli_fetch_assoc($ruangan)){ ?>

<option value="<?= $r['id']; ?>">

<?= $r['nama_ruangan']; ?>

</option>

<?php } ?>

</select>

</div>

</div>

<div class="row">

<div class="col-md-2 mb-3">

<input
type="text"
name="hari"
class="form-control"
placeholder="Hari"
required>

</div>

<div class="col-md-3 mb-3">

<input
type="date"
name="tanggal"
class="form-control"
required>

</div>

<div class="col-md-2 mb-3">

<input
type="time"
name="jam"
class="form-control"
required>

</div>

<div class="col-md-2 mb-3">

<input
type="text"
name="kelas"
class="form-control"
placeholder="Kelas"
required>

</div>

<div class="col-md-2 mb-3">

<button
type="submit"
name="simpan"
class="btn btn-primary">

Simpan

</button>

</div>

</div>

</form>

<hr>

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>No</th>

<th>Mata Kuliah</th>

<th>Dosen</th>

<th>Ruangan</th>

<th>Hari</th>

<th>Tanggal</th>

<th>Jam</th>

<th>Kelas</th>

<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no = 1;

$data = mysqli_query($conn, "

SELECT

jadwal.*,

mata_kuliah.nama_mk,

dosen.nama_dosen,

ruangan.nama_ruangan

FROM jadwal

JOIN mata_kuliah
ON jadwal.mk_id = mata_kuliah.id

JOIN dosen
ON jadwal.dosen_id = dosen.id

JOIN ruangan
ON jadwal.ruangan_id = ruangan.id

ORDER BY jadwal.id DESC

");

while($row=mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $row['nama_mk']; ?></td>

<td><?= $row['nama_dosen']; ?></td>

<td><?= $row['nama_ruangan']; ?></td>

<td><?= $row['hari']; ?></td>

<td><?= $row['tanggal']; ?></td>

<td><?= $row['jam']; ?></td>

<td><?= $row['kelas']; ?></td>

<td>

<a
href="edit.php?id=<?= $row['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="hapus.php?id=<?= $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus data?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</body>

</html>