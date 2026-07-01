<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include "../config/koneksi.php";

$id = $_GET['id'];

// Ambil data jadwal
$data = mysqli_query($conn,"SELECT * FROM jadwal WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

// Data dropdown
$mk = mysqli_query($conn,"SELECT * FROM mata_kuliah");
$dosen = mysqli_query($conn,"SELECT * FROM dosen");
$ruangan = mysqli_query($conn,"SELECT * FROM ruangan");

// Proses Update
if(isset($_POST['update'])){

    $mk_id = $_POST['mk_id'];
    $dosen_id = $_POST['dosen_id'];
    $ruangan_id = $_POST['ruangan_id'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $kelas = $_POST['kelas'];

    mysqli_query($conn,"UPDATE jadwal SET

    mk_id='$mk_id',
    dosen_id='$dosen_id',
    ruangan_id='$ruangan_id',
    hari='$hari',
    tanggal='$tanggal',
    jam='$jam',
    kelas='$kelas'

    WHERE id='$id'");

    echo "<script>
    alert('Data berhasil diupdate');
    window.location='index.php';
    </script>";

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Jadwal</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Edit Jadwal Ujian</h2>

<form method="POST">

<div class="mb-3">

<label>Mata Kuliah</label>

<select name="mk_id" class="form-control">

<?php while($m=mysqli_fetch_assoc($mk)){ ?>

<option
value="<?= $m['id']; ?>"
<?= ($m['id']==$row['mk_id']) ? 'selected' : ''; ?>>

<?= $m['nama_mk']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Dosen</label>

<select name="dosen_id" class="form-control">

<?php while($d=mysqli_fetch_assoc($dosen)){ ?>

<option
value="<?= $d['id']; ?>"
<?= ($d['id']==$row['dosen_id']) ? 'selected' : ''; ?>>

<?= $d['nama_dosen']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Ruangan</label>

<select name="ruangan_id" class="form-control">

<?php while($r=mysqli_fetch_assoc($ruangan)){ ?>

<option
value="<?= $r['id']; ?>"
<?= ($r['id']==$row['ruangan_id']) ? 'selected' : ''; ?>>

<?= $r['nama_ruangan']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Hari</label>

<input
type="text"
name="hari"
class="form-control"
value="<?= $row['hari']; ?>">

</div>

<div class="mb-3">

<label>Tanggal</label>

<input
type="date"
name="tanggal"
class="form-control"
value="<?= $row['tanggal']; ?>">

</div>

<div class="mb-3">

<label>Jam</label>

<input
type="time"
name="jam"
class="form-control"
value="<?= $row['jam']; ?>">

</div>

<div class="mb-3">

<label>Kelas</label>

<input
type="text"
name="kelas"
class="form-control"
value="<?= $row['kelas']; ?>">

</div>

<button
class="btn btn-success"
name="update">

Update

</button>

<a href="index.php" class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</body>

</html>