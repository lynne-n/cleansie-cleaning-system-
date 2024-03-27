<?php
session_start(); // Start a session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the sign-in page if not logged in
    header("Location: equip_signin.php");
    exit(); // Ensure that no code is executed after the header
}

// Now you can use $_SESSION['user'] to access user information
$user = $_SESSION['user'];

// Retrieve the booking information from the session or your database (Assuming it's stored in the session for simplicity)
// Retrieve the booking information from the session or your database
$selectedService = isset($_SESSION['booking']['selected_service']) ? $_SESSION['booking']['selected_service'] : 'Not specified';

$cleaningDate = isset($_SESSION['booking']['cleaning_date']) ? $_SESSION['booking']['cleaning_date'] : 'Not specified';
$numberOfEquipment = isset($_SESSION['booking']['number_of_equipment']) ? $_SESSION['booking']['number_of_equipment'] : 'Not specified';


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

// Fetch the price for the selected service
$sqlPrice = "SELECT price FROM equipment WHERE equip_name = ?";
$stmtPrice = $conn->prepare($sqlPrice);
$stmtPrice->bind_param("s", $selectedService);
$stmtPrice->execute();
$resultPrice = $stmtPrice->get_result();

if ($resultPrice->num_rows > 0) {
    $rowPrice = $resultPrice->fetch_assoc();
    $price = $rowPrice['price'];

    // Calculate the total price
    $totalPrice = $numberOfEquipment * $price;

    // Close the price statement
    $stmtPrice->close();
} else {
    // Handle the case where the price is not found
    $totalPrice = 0;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Report</title>
    <style>
        body{
            background-color:lightskyblue;
            padding-left:150px;
        }
        p{
       color: blue;
       font-size: 24px;
        }
        h3{
            color: blue;
            font-weight:bolder;
            font-size: 30px;
        }
        button{
            background-color: aqua;
            border-radius:30px;
            border: none;
            color: #fff;
            font-size: 16px;
            max-width: 204px;  
            width: 100%;
            height: 61px;
            text-align: center;
            cursor: pointer;
            transition: ease-in all 0.5s;
        }
        button:hover{
    background-color: yellow;
    cursor: pointer;
}

        </style>
    <!-- Add your CSS styles here -->
    <!-- Add other head elements as needed -->
</head>
<body>
<h3>Thank you for choosing Cleanise!<br> An email for the confirmation of the order will be sent shortly</h3>
    <p>Booking Report for <?php echo $user['email']; ?></p>

    <h4><strong>Selected Service:</strong> <?php echo $selectedService; ?></h4>    
    <h4><strong>Delivery Date:</strong> <?php echo $cleaningDate; ?></h4>
    <h4><strong>Number of Equipment:</strong> <?php echo $numberOfEquipment; ?></h4>
    <h4><strong>Total Price: Ksh.</strong> <?php echo $totalPrice; ?></h4>

   
    <a href="index.html"><button>Go Back to Homepage</button></a>

    <!-- Add other content as needed -->
</body>
</html>
