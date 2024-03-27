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
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $services = $_POST['service'];
    $message= $_POST['message'];
    $date = $_POST['date'];
    
    // SQL query to insert data into the "orders" table
    $sql = "INSERT INTO orders (full_name, phone, address ,services ,message,date) VALUES (?, ?, ?, ?, ?,?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $full_name, $phone, $address , $services , $message, $date);

    // Execute the statement
    if ($stmt->execute()){
        // Data inserted successfully
        echo "Booking successful!";
        header("Location: index.html");
    } else {
        // Error occurred
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to the signin page if the form wasn't submitted
    header("Location: officialsignin.php");
}
?>
