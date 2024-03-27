<?php
require_once "./includes/conn1.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure client_id is provided
    // Ensure client_id is provided
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Get other form fields
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $specialty = $_POST['specialty'];
    $team = $_POST['team'];
    // Add other fields as needed

    // Update the record in the database
    $sql = "UPDATE `cleaners` SET `name`=?, `email`=?, `phone`=?, `specialty`=?, `team`=? WHERE `id`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $email, $phone, $specialty, $team, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
        header('location: manage_house.php');
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Cleaner ID not provided";
}

} else {
    echo "Invalid request method";
}

// Close the connection
$conn->close();
?>
