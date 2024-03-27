<?php
require_once "./includes/conn1.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure order_id is provided
    if (isset($_POST['booking_id'])) {
        $booking_id = $_POST['booking_id'];

        // Get other form fields
        $user_email = $_POST['user_email'];
        $selected_service=$_POST['selected_service'];
        $allergy_preference=$_POST['allergy_preference'];
        $cleaning_date=$_POST['cleaning_date'];
        $number_of_pools=$_POST['number_of_pools'];
        $total_price=$_POST['total_price'];
        // Add other fields as needed

        // Update the record in the database
        $sql = "UPDATE `pool_booking` SET `user_email`=?, `selected_service`=?, `allergy_preference`=?, `cleaning_date`=?, `number_of_pools`=?, `total_price`=? WHERE `booking_id`=?";
        $stmt = $conn->prepare($sql);
        
        // Check for binding errors
        if (!$stmt) {
            echo "Error during prepare: " . $conn->error;
        } else {
            $stmt->bind_param("ssssssi", $user_email, $selected_service, $allergy_preference, $cleaning_date, $number_of_pools, $total_price, $booking_id);

            // Check for execution errors
            if ($stmt->execute()) {
                echo "Record updated successfully";
                header('location: manage_poolorder.php');
            } else {
                echo "Error updating record: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }
    } else {
        echo "ID not provided";
    }
} else {
    echo "Invalid request method";
}

// Close the connection
$conn->close();
?>
