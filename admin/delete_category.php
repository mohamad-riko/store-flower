<?php
// Mulai session
session_start();

include '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan ID galeri dikirimkan
    if(isset($_POST["id"])) {
        $gallery_id = $_POST["id"];

        // Prepare and bind the SQL statement
        $sql = "DELETE FROM gallery WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $gallery_id); // "i" indicates the parameter type is an integer

        // Execute the statement
        if ($stmt->execute()) {
            // Close the statement
            $stmt->close();

            // Redirect to admin_gallery.php with success message
            echo '<script>
                // Show success message
                alert("Data berhasil dihapus.");
                // Redirect to admin_gallery.php after 2 seconds
                setTimeout(function() {
                    window.location.href = "admin_gallery.php";
                }, 2000);
            </script>';
        } else {
            // Menampilkan pesan error
            echo "Error: " . $stmt->error;
        }
    } else {
        // Jika ID galeri tidak diterima, tampilkan pesan error
        echo "ID galeri tidak diterima.";
    }
}
?>
