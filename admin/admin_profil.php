<?php
session_start();
include '../db_connect.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    // Jika belum, arahkan ke halaman login
    header("Location: ../login.php");
    exit();
}

// Ambil username admin dari sesi
$username = $_SESSION['admin_username'];

// Ambil data admin dari database
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nama = $row['nama'];
    $password = $row['password'];
} else {
    // Handle kesalahan jika data admin tidak ditemukan
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profil</title>
</head>
<body>
    <h2>Profil Admin</h2>
    <p><strong>Username:</strong> <?php echo $username; ?></p>
    <p><strong>Nama:</strong> <?php echo $nama; ?></p>
    <p><strong>Password:</strong> <?php echo $password; ?></p>

    <a href="update_profil_admin.php">Update Profil</a>
    <br>
    <a href="admin.php">Kembali ke Halaman Admin</a>
</body>
</html>
