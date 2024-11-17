<?php
include '../db_connect.php';

// Pastikan request adalah melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil ID galeri dari formulir
    $gallery_id = $_POST["id"];

    // Query untuk menghapus galeri
    $sql = "DELETE FROM gallery WHERE id = ?";
    
    // Persiapkan statement SQL
    $stmt = $conn->prepare($sql);
    
    // Bind parameter ID galeri ke statement
    $stmt->bind_param("i", $gallery_id);
    
    // Eksekusi statement
    if ($stmt->execute()) {
        // Redirect ke halaman admin_gallery.php dengan pesan sukses
        header("Location: admin_gallery.php?pesan=hapus_sukses");
    } else {
        // Redirect ke halaman admin_gallery.php dengan pesan error
        header("Location: admin_gallery.php?pesan=hapus_gagal");
    }
    
    // Tutup statement dan koneksi database
    $stmt->close();
    $conn->close();
} else {
    // Jika tidak ada metode POST, redirect ke halaman admin_gallery.php
    header("Location: admin_gallery.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
    <script>
        // Tampilkan notifikasi
        alert("Data berhasil dihapus.");
        // Redirect ke halaman admin_gallery.php
        window.location.href = "admin_gallery.php";
    </script>
</head>
<body>
    
</body>
</html>