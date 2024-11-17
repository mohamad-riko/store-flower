<?php
// Sertakan file koneksi ke database
include '../db_connect.php';

// Periksa apakah parameter id telah diset dan merupakan bilangan bulat
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Escape parameter id untuk mencegah SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Buat dan jalankan query DELETE untuk menghapus video berdasarkan id
    $sql = "DELETE FROM videos WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman admin_video.php dengan notifikasi berhasil dihapus
        echo '<script>
                // Show success message
                alert("Data berhasil dihapus.");
                // Redirect to admin_video.php after 2 seconds
                setTimeout(function() {
                    window.location.href = "admin_video.php";
                }, 2000);
            </script>';
        exit();
    } else {
        // Jika terjadi kesalahan dalam menghapus, tampilkan pesan kesalahan
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Jika parameter id tidak diset atau bukan bilangan bulat, tampilkan pesan kesalahan
    echo "Invalid video ID.";
}

// Tutup koneksi ke database
$conn->close();
?>
