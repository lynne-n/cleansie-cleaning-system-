<?php
session_start(); // Start the session at the beginning of your script

// Include the database configuration
include 'C:\xampp\htdocs\CLEANING\USER\connection.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // In a real-world application, you would typically query the database to validate user credentials.
    // I'll provide a basic example here, but you should use secure password hashing and database queries.
    
    // Example database query to check user credentials
    $query = "SELECT * FROM admin WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) {
        // Authentication successful
        $_SESSION['admin'] = true;
        header('Location: dashboard.php'); // Redirect to the dashboard upon successful login
        exit();
    } else {
        echo "Invalid email or password"; // Authentication failed
    }
} else {
    // Handle the case where 'email' or 'password' is not set in the $_POST array.
    echo "Email and/or password not provided.";
}
?>
