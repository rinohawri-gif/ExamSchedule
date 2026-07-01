<?php
session_start();
include "../config/koneksi.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");

    if(mysqli_num_rows($query)==1){

        $data = mysqli_fetch_assoc($query);

        if($password==$data['password']){

            $_SESSION['login']=true;

            $_SESSION['username']=$username;

            header("Location: ../dashboard.php");
            exit;

        }else{

            $error="Password salah";

        }

    }else{

        $error="Username tidak ditemukan";

    }

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-4">

<div class="card shadow">

<div class="card-header text-center">

<h3>ExamSchedule</h3>

<p>Sistem Jadwal Ujian</p>

</div>

<div class="card-body">

<?php
if(isset($error)){
?>

<div class="alert alert-danger">

<?= $error ?>

</div>

<?php
}
?>

<form method="POST">

<div class="mb-3">

<label>Username</label>

<input
type="text"
name="username"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button
class="btn btn-primary w-100"
name="login">

Login

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>