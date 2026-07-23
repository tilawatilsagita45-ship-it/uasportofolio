<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['username'])) { header("Location: login.php"); exit; }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Portofolio & Jualan Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body{background:#fff;} .btn-brown{background:#7c4a31;color:white;} .btn-brown:hover{background:#5c3623;color:white;}</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
<div class="container">
    <a class="navbar-brand fw-bold" style="color:#7c4a31;" href="#">Portofolio Saya</a>
    <div class="navbar-nav ms-auto">
        <a class="nav-link" href="#diri">Data Diri</a>
        <a class="nav-link" href="#kontak">Kontak</a>
        <a class="nav-link" href="#jualan">Jualan</a>
        <a class="nav-link btn btn-brown btn-sm ms-2" href="logout.php">Logout</a>
    </div>
</div>
</nav>

<main class="container py-5">
    <!-- DATA DIRI -->
<section id="diri" class="mb-5">
    <h2 class="border-bottom pb-2" style="color:#7c4a31;">Data Diri</h2>
    <div class="row mt-4 align-items-center">
        <!-- Foto Profil -->
        <div class="col-md-4 text-center mb-3 mb-md-0">
            <img src="foto.jpeg" alt="Foto Profil" class="img-fluid rounded-circle shadow" style="width:200px; height:200px; object-fit:cover; border:4px solid #7c4a31;">
        </div>
        <!-- Info Diri -->
        <div class="col-md-8">
            <div class="card bg-light border-0 p-4 shadow-sm">
                <h3 style="color:#7c4a31;"><?= $_SESSION['nama_lengkap'] ?></h3>
                <hr>
                <p class="mb-2"><strong></strong>Halo! Aku mahasiswa yang lagi mendalami dunia pemrograman dan desain web. Aku tertarik banget sama hal-hal yang berkaitan dengan teknologi dan cara bikin tampilan yang menarik.
 
Di luar kegiatan kuliah, aku punya hobi memasak. Aku benar-benar menikmati prosesnya dan senang banget kalau bisa nyoba bikin berbagai macam hidangan.
 
Aku suka segala sesuatu yang bersih, rapi, dan enak dipandang, makanya aku pilih nuansa putih dan coklat yang simpel tapi tetap elegan buat portofolio ini. Ke depannya, aku pengen terus belajar dan ngembangin kemampuanku lebih jauh lagi.
</p>
            </div>
        </div>
    </div>
    </section>

    <!-- KONTAK SAYA -->
<section id="kontak" class="mb-5">
    <h2 class="border-bottom pb-2" style="color:#7c4a31;">Kontak Saya</h2>
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3" style="font-size:1.5rem; color:#7c4a31;">📞</div>
                        <div>
                            <div class="text-muted small">WhatsApp</div>
                            <div class="fw-semibold">087845646441</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3" style="font-size:1.5rem; color:#7c4a31;">✉️</div>
                        <div>
                            <div class="text-muted small">Email</div>
                            <div class="fw-semibold">tilawatilsagita45@mail.com</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3" style="font-size:1.5rem; color:#7c4a31;">📍</div>
                        <div>
                            <div class="text-muted small">Alamat</div>
                            <div class="fw-semibold">Suela, Lombok Timur, NTB</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- PRODUK JUALAN -->
<section id="jualan" class="mb-5">
    <h2 class="border-bottom pb-2" style="color:#7c4a31;">Produk Jualan & Lokasi</h2>
    <div class="row mt-4">
    <?php
    // --- DATA PRODUK (EDIT SINI SAJA MUDAH BANGET!) ---
    $daftar_produk = [
        [
            'nama' => 'Nasi Campur Bali',
            'deskripsi' => 'Nasi putih harum lengkap dengan ayam suwir pedas, telur bumbu bali, sayur urap segar, kacang goreng, dan sambal terasi khas.',
            'harga' => 30000,
            'foto' => 'upload/nasi-campur-bali.jpg.jpeg', // Ganti nama file di sini
            'peta' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.853275137332!2d116.52276431522574!3d-8.64443878330783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dccf3c7b7eeeeee%3A0x31f4c3f3b4b3d3f3!2sAlun-Alun%20Selong!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid" width="100%" height="200" style="border:0; border-radius:8px;" allowfullscreen="" loading="lazy"></iframe>'
        ],
        [
            'nama' => 'Ayam Bakar Bumbu Rujak',
            'deskripsi' => 'Potongan ayam kampung empuk dibakar dengan bumbu rujak spesial—gurih, manis, dan beraroma rempah kuat. Disajikan dengan lalapan segar & sambal dadak.',
            'harga' => 35000,
            'foto' => 'upload/ayam-bakar-rujak.jpg.jpeg',
            'peta' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.853275137332!2d116.52276431522574!3d-8.64443878330783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dccf3c7b7eeeeee%3A0x31f4c3f3b4b3d3f3!2sAlun-Alun%20Selong!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid" width="100%" height="200" style="border:0; border-radius:8px;" allowfullscreen="" loading="lazy"></iframe>'
        ],
        [
            'nama' => 'Rawon Daging Sapi',
            'deskripsi' => 'Sup daging sapi berkuah hitam pekat khas Jawa Timur dari buah kluwek, kaya rempah & hangat. Disajikan lengkap dengan tauge pendek, telur asin, dan kerupuk udang.',
            'harga' => 40000,
            'foto' => 'upload/rawon-daging.jpg.jpeg',
            'peta' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.853275137332!2d116.52276431522574!3d-8.64443878330783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dccf3c7b7eeeeee%3A0x31f4c3f3b4b3d3f3!2sAlun-Alun%20Selong!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid" width="100%" height="200" style="border:0; border-radius:8px;" allowfullscreen="" loading="lazy"></iframe>'
        ],
        [
            'nama' => 'Gudeg Jogja Komplit',
            'deskripsi' => 'Nasi dengan nangka muda masak santan (gudeg) yang manis legit khas Jogja. Lengkap dengan sambal goreng krecek pedas, telur pindang, dan ayam opor yang gurih.',
            'harga' => 35000,
            'foto' => 'upload/gudeg-jogja.jpg.jpeg',
            'peta' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.853275137332!2d116.52276431522574!3d-8.64443878330783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dccf3c7b7eeeeee%3A0x31f4c3f3b4b3d3f3!2sAlun-Alun%20Selong!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid" width="100%" height="200" style="border:0; border-radius:8px;" allowfullscreen="" loading="lazy"></iframe>'
        ],
        [
            'nama' => 'Soto Ayam Lamongan',
            'deskripsi' => 'Soto ayam berkuah bening kekuningan yang segar & hangat. Isian lengkap: suwiran ayam, kol, soun, telur rebus, taburan koya gurih, dan perasan jeruk nipis.',
            'harga' => 25000,
            'foto' => 'upload/soto-ayam.jpg.jpeg',
            'peta' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.853275137332!2d116.52276431522574!3d-8.64443878330783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dccf3c7b7eeeeee%3A0x31f4c3f3b4b3d3f3!2sAlun-Alun%20Selong!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid" width="100%" height="200" style="border:0; border-radius:8px;" allowfullscreen="" loading="lazy"></iframe>'
        ]
    ];
    // --- AKHIR BAGIAN EDIT ---

    // Tampilkan ke halaman
    foreach ($daftar_produk as $produk) {
    ?>
        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <img src="<?= $produk['foto'] ?>" class="card-img-top" alt="<?= $produk['nama'] ?>" style="height:220px; object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title" style="color:#7c4a31;"><?= $produk['nama'] ?></h5>
                    <p class="card-text"><?= $produk['deskripsi'] ?></p>
                    <p class="fw-bold">Harga: Rp <?= number_format($produk['harga'],0,',','.') ?></p>
                    <div class="mt-3"><?= $produk['peta'] ?></div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</section>
        </div>
    </div>
</div>
<?php// tutup while
} else {
    echo "<p>Belum ada produk jualan.</p>";
} // tutup if
?>
        </div>
        <a href="tambah_produk.php" class="btn btn-brown">+ Tambah Produk Baru</a>
    </section>
</main>

<footer class="py-3 text-center text-white" style="background:#7c4a31;">
    <p class="mb-0">&copy; 2026 Portofolio Jualan Tilawatil</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>