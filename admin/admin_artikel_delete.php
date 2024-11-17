<?php
// Sertakan file koneksi ke database
include '../db_connect.php';

// Periksa apakah parameter id telah diset dan merupakan bilangan bulat
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Escape parameter id untuk mencegah SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Buat dan jalankan query DELETE untuk menghapus artikel berdasarkan id
    $sql = "DELETE FROM artikel WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman admin_artikel.php dengan notifikasi berhasil dihapus
        header("Location: admin_artikel.php?pesan=hapus_sukses");
        exit();
    } else {
        // Jika terjadi kesalahan dalam menghapus, tampilkan pesan kesalahan
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Jika parameter id tidak diset atau bukan bilangan bulat, tampilkan pesan kesalahan
    echo "Invalid article ID.";
}

// Tutup koneksi ke database
$conn->close();
?>
