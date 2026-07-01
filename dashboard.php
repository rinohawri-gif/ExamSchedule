<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: auth/login.php");
    exit;
}

include "config/koneksi.php";

$totalMK=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM mata_kuliah"));

$totalDosen=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dosen"));

$totalRuangan=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM ruangan"));

$totalJadwal=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM jadwal"));

?>

<!DOCTYPE html>

<html>

<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<span class="navbar-brand">

ExamSchedule

</span>

<a
href="auth/logout.php"
class="btn btn-danger">

Logout

</a>

</div>

</nav>

<div class="container mt-4">

<h3>Dashboard</h3>

<hr>

<div class="row">

<div class="col-md-3">

<div class="card bg-primary text-white">

<div class="card-body">

<h5>Total Mata Kuliah</h5>

<h2><?= $totalMK ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-success text-white">

<div class="card-body">

<h5>Total Dosen</h5>

<h2><?= $totalDosen ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-warning">

<div class="card-body">

<h5>Total Ruangan</h5>

<h2><?= $totalRuangan ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-info text-white">

<div class="card-body">

<h5>Total Jadwal</h5>

<h2><?= $totalJadwal ?></h2>

</div>

</div>

</div>

</div>

<hr>

<a href="mata_kuliah/index.php" class="btn btn-primary">

Mata Kuliah

</a>

<a href="dosen/index.php" class="btn btn-success">

Dosen

</a>

<a href="ruangan/index.php" class="btn btn-warning">

Ruangan

</a>

<a href="jadwal/index.php" class="btn btn-info">

Jadwal Ujian

</a>

</div>

</body>

</html>