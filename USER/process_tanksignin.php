<?php
session_start(); // Start a session

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
    $email = $_POST['email'];
    $password = $_POST['password'];
   

    // You should hash the password and compare it to the stored hashed password in your database for security.

    // For demonstration purposes, let's assume the password is stored in plaintext.
    $sql = "SELECT * FROM client WHERE (email = ?) AND password = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);

    // Execute the statement
    $stmt->execute();

    // Check if a user with the given credentials exists
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User successfully signed in
        // Store user information in the session along with the service name
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;
        $_SESSION['service_name'] = $servicename;

        // Redirect the user to the booking page
        header("Location: tankbooking.php");
        exit(); // Ensure that no code is executed after the header
    } else {
        // Invalid credentials
        echo "Invalid username, password";
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to the sign-in page if the form wasn't submitted
    header("Location: tanksignin.php");
    exit(); // Ensure that no code is executed after the header
}
?>
