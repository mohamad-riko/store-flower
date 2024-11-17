<?php
include '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["id"];

    // Prepare and bind the SQL statement
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id); // "i" indicates the parameter type is an integer

    // Execute the statement
    if ($stmt->execute()) {
        // Close the statement
        $stmt->close();
        
        // Redirect to admin_products.php with success message
        echo '<script>
            // Show success message
            alert("Produk Berhasil Dihapus.");
            // Redirect to admin_products.php after 2 seconds
            setTimeout(function() {
                window.location.href = "admin_products.php";
            }, 2000);
        </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>