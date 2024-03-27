<?php
// Include the database connection file
require_once 'logincheck.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission

    // Assuming you have a form with input fields named 'inquiry_id' and 'response_message'
    $inquiryId = $_POST['inquiry_id'];
    $responseMessage = $_POST['response_message'];

    // Perform validation and sanitation on user inputs if needed

    // Update the inquiry record in the database with the response message
    $updateQuery = $conn->prepare("UPDATE `inquiries` SET response_message = ? WHERE id = ?");
    $updateQuery->bind_param("si", $responseMessage, $inquiryId);

    if ($updateQuery->execute()) {
        // Successfully updated the inquiry
        header("Location: inquiries.php"); // Redirect to the inquiries page or wherever you want after processing
        exit();
    } else {
        // Handle the update failure
        echo "Error updating inquiry: " . $updateQuery->error;
    }

    // Close the prepared statement
    $updateQuery->close();
}

// If the form is not submitted properly, redirect back to the inquiries page or handle it accordingly
header("Location: inquiries.php");
exit();
?>
