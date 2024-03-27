<?php
require_once "./includes/conn1.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure client_id is provided
    if (isset($_POST['client_id'])) {
        $client_id = $_POST['client_id'];

        // Get other form fields
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $home_address = $_POST['home_address'];
        // Add other fields as needed

        // Update the record in the database
        $sql = "UPDATE `client` SET `first_name`=?, `last_name`=?, `email`=?, `phone`=?, `home_address`=? WHERE `client_id`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $first_name, $last_name, $email, $phone, $home_address, $client_id);

        if ($stmt->execute()) {
            echo "Record updated successfully";
            header('location: userlist.php');
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Client ID not provided";
    }
} else {
    echo "Invalid request method";
}

// Close the connection
$conn->close();
?>
