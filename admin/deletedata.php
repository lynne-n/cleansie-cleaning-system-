<?php
require_once "./includes/conn1.php";

if (isset($_GET['id'])) {
    $client_id = $_GET['id'];
    
    $sql = "DELETE FROM `client` WHERE `client_id` = ?";
    
    // Use prepared statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("i", $client_id); // Assuming client_id is an integer
        
        // Debugging: Print the SQL query
        echo "SQL Query: " . $sql . "<br>";
        
        // Execute the statement
        $stmt->execute();
        
        // Check for success
        if ($stmt->affected_rows > 0) {
            echo "Record deleted successfully";
            header('location: userlist.php');
        } else {
            echo "Error: Record not found or deletion failed - " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo "Error: Failed to prepare statement - " . $conn->error;
    }
    
    // Close the connection (if not using persistent connections)
    $conn->close();
}
?>
