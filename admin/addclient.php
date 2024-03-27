<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ltl";

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Cannot connect");

// Check if the connection was successful
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Check if the form is submitted and variables are set
if (isset($_POST['full_name'])  && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['home_address'])) {
    $full_name = $db->real_escape_string($_POST['full_name']);    
    $email = $db->real_escape_string($_POST['email']);
    $phone = $db->real_escape_string($_POST['phone']);
    $home_address = $db->real_escape_string($_POST['home_address']);

    
    $insertQuery = "INSERT INTO client (full_name, email, phone, home_address) VALUES ('$full_name', '$email', '$phone', '$home_address')";

    if ($db->query($insertQuery) === TRUE) {
        // Insertion was successful
        header('location: userlist.php'); // Redirect to the cleaners management page
    } else {
        echo "Error: " . $insertQuery . "<br>" . $db->error;
    }
}

$db->close();

?>
