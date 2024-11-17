<?php
// Include file db_connect.php
session_start(); // Mulai sessiona

include '../db_connect.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    // Jika belum, arahkan ke halaman login
    header("Location: ../login.php");
    exit();
} // Sesuaikan dengan nama file yang berisi koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $tanggal_publikasi = $_POST['tanggal_publikasi'];

    // Tangani unggahan foto
    $foto = $_FILES["foto"];
    $foto_nama = $foto["name"];
    $foto_tmp = $foto["tmp_name"];
    $foto_error = $foto["error"];

    // Tentukan lokasi penyimpanan foto
    $upload_dir = "../uploads/artikel/"; // Sesuaikan dengan direktori penyimpanan foto dan tambahkan "../" untuk navigasi ke direktori yang benar
    $foto_path = $upload_dir . basename($foto_nama);

    // Pastikan direktori penyimpanan sudah ada dan memiliki izin penulisan
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Buat direktori jika belum ada
    }

    // Cek apakah ada file yang diunggah
    if ($foto_error === UPLOAD_ERR_OK) {
        // Pindahkan foto ke lokasi penyimpanan
        if (move_uploaded_file($foto_tmp, $foto_path)) {
            // Eksekusi penambahan data ke database
            $sql = "INSERT INTO artikel (judul, konten, foto, tanggal_publikasi) VALUES ('$judul', '$konten', '$foto_nama', '$tanggal_publikasi')";
            if ($conn->query($sql) === TRUE) {
                header("Location: admin_artikel.php"); // Redirect ke halaman admin_artikel.php setelah berhasil
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Gagal mengunggah foto.";
        }
    } else {
        echo "Error: Terjadi masalah saat mengunggah foto.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel | Nusa Indah Florist Indramayu</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        #editor {
            height: 200px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Tambah Artikel Baru</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="form-group">
                <label for="konten">Konten:</label>
                <div id="editor"></div>
                <input type="text" id="konten" name="konten" required>
                <!-- <input type="text" id="konten" name="konten" required> -->
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="tanggal_publikasi">Tanggal Publikasi:</label>
                <input type="date" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success" name="submit">Publikasi Artikel</button>
                <a href="admin_artikel.php" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        // Ambil isi editor teks saat formulir disubmit dan simpan ke input tersembunyi
        var form = document.querySelector('form');
        form.onsubmit = function() {
            var konten = document.querySelector('input[name=konten]');
            konten.value = quill.root.innerHTML;
        };
    </script>
</body>
</html>

<?php
// Tutup koneksi ke database
$conn->close();
?>
