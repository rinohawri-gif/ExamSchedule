<?php

$host="localhost";
$user="root";
$pass="";
$db="exam_schedule";

$conn=mysqli_connect($host,$user,$pass,$db);

if(!$conn){
    die("Koneksi gagal");
}