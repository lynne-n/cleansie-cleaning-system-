<?php
// process_assignment.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if order_id and cleaner are set in the form submission
    if (isset($_POST['booking_id'], $_POST['cleaner'])) {
        $booking_id = $_POST['booking_id'];
        $team = $_POST['cleaner'];

        // Load necessary functions or include the connection file
        require_once 'includes/conn1.php';



        // Update the order with the assigned cleaner
        $result = assignCleanerToOrder($conn, $booking_id, $team);

        if ($result) {
            // Assignment successful
            header("Location: manage_order.php");
        } else {
            // Error in assignment
            echo "Error assigning cleaner to order: " . mysqli_error($conn);
        }
    } else {
        // Redirect to the orders page or display an error message
        header("Location: dashboard.php");
        exit();
    }
} else {
    // Handle other HTTP methods if needed
    echo "Invalid request method.";
}


// Function to update the order with the assigned cleaner
function assignCleanerToOrder($conn, $booking_id, $team) {
    
    $sql = "UPDATE `tank_booking` SET `team` = ? WHERE `booking_id` = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $team, $booking_id);
    
    return $stmt->execute();
}

?>
