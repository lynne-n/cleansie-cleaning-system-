<?php
require_once "./includes/conn1.php";

// Validate and sanitize the ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $sql = "DELETE FROM `cleaners` WHERE `id` = ?";

    // Use prepared statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("i", $id);

        // Execute the statement
        $stmt->execute();

        // Check for success
        if ($stmt->affected_rows > 0) {
            // Record deleted successfully
            echo "Record deleted successfully";
            header('location: manage_house.php');
            exit;
        } else {
            // Error: Record not found or deletion failed
            echo "Error: Record not found or deletion failed";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Error: Failed to prepare statement
        echo "Error: Failed to prepare statement";
    }
} else {
    // Invalid ID
    echo "Error: Invalid ID";
}

// Close the connection (if not using persistent connections)
$conn->close();
?>
