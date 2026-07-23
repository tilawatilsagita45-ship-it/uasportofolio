<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['username'])) { header("Location: login.php"); exit; }

$id = $_GET['id'];
// Hapus file foto di folder
$d = mysqli_fetch_assoc(mysqli_query($conn, "SELECT foto FROM produk WHERE id_produk='$id'"));
if(file_exists("upload/".$d['foto'])) unlink("upload/".$d['foto']);

// Hapus data di database
mysqli_query($conn, "DELETE FROM produk WHERE id_produk='$id'");
header("Location: index.php#jualan");
exit;
?>