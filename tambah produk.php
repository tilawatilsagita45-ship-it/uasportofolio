<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['username'])) { header("Location: login.php"); exit; }

if(isset($_POST['simpan'])) {
    $nama=htmlspecialchars($_POST['nama']);
    $desk=htmlspecialchars($_POST['deskripsi']);
    $harga=$_POST['harga'];
    $lokasi=htmlspecialchars($_POST['lokasi']);
    $foto=$_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "upload/".$foto);
    mysqli_query($conn, "INSERT INTO produk VALUES(null,'$nama','$desk','$harga','$foto','$lokasi')");
    header("Location: index.php#jualan"); exit;
}
?>
<!DOCTYPE html>
<html><head><title>Tambah Produk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>body{background:#fefaf6;}</style></head>
<body class="py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-4">
                <h2 class="text-center mb-3" style="color:#7c4a31;">Tambah Produk & Lokasi</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Produk</label>
                        <input type="file" name="foto" class="form-control" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link Embed Google Maps</label>
                        <textarea name="lokasi" class="form-control" rows="3" required></textarea>
                    </div>
                    <button class="btn btn-brown w-100" type="submit" name="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body></html>