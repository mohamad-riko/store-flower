<?php
include '../db_connect.php';

// Periksa apakah ID video telah diberikan
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Siapkan pernyataan hapus
    $sql = "DELETE FROM videos WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variabel ke pernyataan persiapan sebagai parameter
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameter
        $param_id = trim($_GET["id"]);

        // Mencoba menjalankan pernyataan persiapan
        if (mysqli_stmt_execute($stmt)) {
            // Video berhasil dihapus. Redirect ke halaman daftar video
            header("location: admin_video.php");
            exit();
        } else {
            echo "Oops! Ada yang salah. Silakan coba lagi nanti.";
        }

        // Menutup pernyataan
        mysqli_stmt_close($stmt);
    }

    // Menutup koneksi
    mysqli_close($conn);
} else {
    // Jika ID video tidak diberikan, tampilkan pesan kesalahan
    echo "Oops! Ada yang salah. Silakan coba lagi nanti.";
}
?>
