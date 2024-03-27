<?php
// Start the session to access session variables
session_start();

// Unset specific session variables
unset($_SESSION['user_id']); // Assuming 'user_id' is the session variable storing user identification

// Destroy the session if needed (optional)
// session_destroy();

// Redirect to the login page or any other page after logout
header("Location: index.php");
exit();
?>
