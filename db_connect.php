<?php
$servername = "localhost";
$username = "nusaind1_dayung";
$password = "NIF@dayung2024";
$dbname = "nusaind1_toko_bunga";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
