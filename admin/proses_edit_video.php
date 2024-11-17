<?php
// Include file koneksi ke database
include '../db_connect.php';
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    // Jika belum, arahkan ke halaman login
    header("Location: ../login.php");
    exit();
}

// Periksa apakah metode permintaan adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Peroleh data yang dikirimkan dari formulir
    $id_video = $_POST['id'];
    $judul = $_POST['judul'];
    $embed_link = $_POST['embed'];

    // Query untuk memperbarui informasi video di database
    $query = "UPDATE videos SET judul=?, embed_link=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $judul, $embed_link, $id_video);

    // Jalankan query dan periksa berhasil atau tidak
    if ($stmt->execute()) {
        // Jika berhasil, arahkan kembali ke halaman admin_video.php
        header("Location: admin_video.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        echo "Gagal menyimpan perubahan: " . $conn->error;
    }
} else {
    // Jika tidak melalui metode POST, redirect kembali ke halaman admin_video.php
    header("Location: admin_video.php");
    exit();
}
?>