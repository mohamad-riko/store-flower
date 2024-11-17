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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Tangkap data dari formulir
    $id_artikel = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $tanggal_publikasi = $_POST['tanggal_publikasi'];

    // Tangani unggahan foto
    $foto_nama = $_FILES["foto"]["name"];
    $foto_tmp = $_FILES["foto"]["tmp_name"];
    $foto_error = $_FILES["foto"]["error"];

    // Tentukan lokasi penyimpanan foto
    $upload_dir = "../uploads/artikel/";

    // Jika ada file foto yang diunggah
    if ($foto_error === UPLOAD_ERR_OK) {
        // Hapus foto lama jika ada
        $query_hapus_foto_lama = "SELECT foto FROM artikel WHERE id = ?";
        $stmt_hapus_foto_lama = $conn->prepare($query_hapus_foto_lama);
        $stmt_hapus_foto_lama->bind_param("i", $id_artikel);
        $stmt_hapus_foto_lama->execute();
        $result_hapus_foto_lama = $stmt_hapus_foto_lama->get_result();

        if ($result_hapus_foto_lama->num_rows == 1) {
            $row_foto_lama = $result_hapus_foto_lama->fetch_assoc();
            $foto_lama = $row_foto_lama['foto'];
            unlink($upload_dir . $foto_lama);
        }

        // Pindahkan foto baru ke lokasi penyimpanan
        move_uploaded_file($foto_tmp, $upload_dir . $foto_nama);
    }

    // Perbarui data artikel dalam database
    $query_update = "UPDATE artikel SET judul=?, konten=?, foto=?, tanggal_publikasi=? WHERE id=?";
    $stmt_update = $conn->prepare($query_update);
    $stmt_update->bind_param("ssssi", $judul, $konten, $foto_nama, $tanggal_publikasi, $id_artikel);

    if ($stmt_update->execute()) {
        // Redirect kembali ke halaman admin_artikel.php setelah berhasil
        header("Location: admin_artikel.php");
        exit();
    } else {
        echo "Gagal menyimpan perubahan artikel.";
    }

    // Tutup statement
    $stmt_update->close();
}

// Tutup koneksi ke database
$conn->close();
?>