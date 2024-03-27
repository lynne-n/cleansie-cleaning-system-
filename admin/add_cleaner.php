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
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['specialty']) && isset($_POST['team'])) {
    $name = $db->real_escape_string($_POST['name']);
    $email = $db->real_escape_string($_POST['email']);
    $phone = $db->real_escape_string($_POST['phone']);
    $specialty = $db->real_escape_string($_POST['specialty']);
    $team = $db->real_escape_string($_POST['team']);

    // You need to define and sanitize the "experience" variable if you want to insert it
    $experience = 0; // Change this to the actual value

    $insertQuery = "INSERT INTO cleaners (name, email, phone, specialty, team) VALUES ('$name', '$email', '$phone', '$specialty','$team')";

    if ($db->query($insertQuery) === TRUE) {
        // Insertion was successful
        header('location: manage_house.php'); // Redirect to the cleaners management page
    } else {
        echo "Error: " . $insertQuery . "<br>" . $db->error;
    }
}

$db->close();

?>
