<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['username'])) { header("Location: login.php"); exit; }

$id = $_GET['id'];
$d = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id'"));

if(isset($_POST['update'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $desk = htmlspecialchars($_POST['deskripsi']);
    $harga = $_POST['harga'];
    $lokasi = htmlspecialchars($_POST['lokasi']);

    if($_FILES['foto']['name']!='') {
        unlink("upload/".$d['foto']);
        $foto = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "upload/".$foto);
        $sql = "UPDATE produk SET nama_produk='$nama', deskripsi='$desk', harga='$harga', foto='$foto', lokasi_map='$lokasi' WHERE id_produk='$id'";
    } else {
        $sql = "UPDATE produk SET nama_produk='$nama', deskripsi='$desk', harga='$harga', lokasi_map='$lokasi' WHERE id_produk='$id'";
    }
    mysqli_query($conn, $sql);
    header("Location: index.php#jualan");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body{background:#fefaf6;} .btn-brown{background:#7c4a31;color:white;} .btn-brown:hover{background:#5c3623;color:white;}</style>
</head>
<body class="py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-4">
                <h2 class="text-center mb-3" style="color:#7c4a31;">Edit Produk</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama" class="form-control" value="<?= $d['nama_produk'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" required><?= $d['deskripsi'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" value="<?= $d['harga'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ganti Foto (Kosongkan jika tidak)</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link Embed Google Maps</label>
                        <textarea name="lokasi" class="form-control" rows="3" required><?= $d['lokasi_map'] ?></textarea>
                    </div>
                    <button class="btn btn-brown w-100" type="submit" name="update">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>