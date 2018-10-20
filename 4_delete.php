<?php
include "koneksi.php";

$nim = $_GET['id'];

$sql = mysqli_query($con , "DELETE FROM `mahasiswa` WHERE `mahasiswa`.`NIM` = '$nim'");
header("Location:1_tampil.php");

?>