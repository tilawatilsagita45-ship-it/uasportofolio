<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'];
    $p = $_POST['password'];

    $sql = "SELECT * FROM tbl_user WHERE username = '$u' AND password = '$p'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) === 1) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
        header("Location: index.php");
        exit;
    } else {
        $err = "❌ Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body{background:#fefaf6;}</style>
</head>
<body class="d-flex align-items-center min-vh-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow p-4">
                <h2 class="text-center mb-3" style="color:#7c4a31;">Login</h2>
                <?php if (!empty($err)) echo "<div class='alert alert-danger'>$err</div>"; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button class="btn w-100 text-white" style="background:#7c4a31;">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>