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

// Periksa apakah parameter ID artikel telah diberikan di URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID artikel tidak valid.";
    exit();
}

$id_artikel = $_GET['id'];

// Query untuk mengambil data artikel dari tabel artikel berdasarkan ID
$query = "SELECT * FROM artikel WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_artikel);
$stmt->execute();
$result = $stmt->get_result();

// Pastikan artikel dengan ID yang diberikan ada dalam database
if ($result->num_rows == 0) {
    echo "Artikel tidak ditemukan.";
    exit();
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel | Nusa Indah Florist</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Edit Artikel</h1>
        <form action="proses_edit_artikel.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id_artikel; ?>">
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $row['judul']; ?>" required>
            </div>
            <div class="form-group">
                <label for="konten">Konten:</label>
                <textarea class="form-control" id="konten" name="konten" rows="5" required><?php echo $row['konten']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*">
                <img src="../uploads/artikel/<?php echo $row['foto']; ?>" width="100">
            </div>
            <div class="form-group">
                <label for="tanggal_publikasi">Tanggal Publikasi:</label>
                <input type="date" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" value="<?php echo $row['tanggal_publikasi']; ?>" required>
            </div>
            <button type="submit" class="btn btn-success" name="submit">Simpan Perubahan</button>
            <a href="admin_artikel.php" class="btn btn-danger">Batal</a>
        </form>
    </div>
</body>
</html>