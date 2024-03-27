<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection parameters
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "ltl";

    // Create a database connection
    $conn = new mysqli($hostname, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get values from the form
    $full_name = $_POST['full_name'];    
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $home_address = $_POST['home_address'];
    $password = $_POST['password'];
    
    // SQL query to insert data into the "client" table
    $sql = "INSERT INTO client (full_name, email, phone, home_address, password) VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $full_name, $email, $phone, $home_address, $password);

    // Execute the statement
    if ($stmt->execute()) {
        // Data inserted successfully
        header("Location: hudum.html");
    } else {
        // Error occurred
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to the signup page if the form wasn't submitted
    header("Location: officialsignup.php");
}
?>
