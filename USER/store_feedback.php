<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection parameters
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "ltl";

    // Create a database connection
    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get values from the form
    $name = $_POST['name'];
    $feedback = $_POST['feedback'];

    // SQL query to insert data into the "feedback" table
    $sql = "INSERT INTO feedback (name, feedback) VALUES (?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $feedback);

    // Execute the statement
    if ($stmt->execute()) {
        // Data inserted successfully
        echo "Your feedback has been submitted successfully!";
    } else {
        // Error occurred
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to the feedback page if the form wasn't submitted
    header("Location: feedback.php");
}
?>
