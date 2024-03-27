<?php
session_start(); // Start a session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the sign-in page if not logged in
    header("Location: tanksignin.php");
    exit(); // Ensure that no code is executed after the header
}

// Now you can use $_SESSION['user'] to access user information
$user = $_SESSION['user'];

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

// Fetch available services and corresponding information from the "pool" table
$sqlServices = "SELECT service_name, chemical, price FROM tank";
$resultServices = $conn->query($sqlServices);

// Initialize the variable to store service options
$serviceOptions = "";

// Populate the dropdown menu with available services and corresponding chemicals and prices
while ($row = $resultServices->fetch_assoc()) {
    $serviceName = $row['service_name'];
    $chemical = $row['chemical'];
    $price = $row['price'];

    // Concatenate chemical and price information in the dropdown option
    $serviceOptions .= "<option value='$serviceName'>$serviceName - Chemical: $chemical, Price: $price</option>";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Page</title>
    <!-- Add your CSS styles here -->
    <style>
        body{
            background-color:lightskyblue;
            padding-left:200px;
            padding-top:30px;
        }
        button{
            background-color:aqua;
            border-radius: 80px;
            border: none;
            font-size: 16px;
            background: aqua;
            max-width: 180px;
            width: 100%;
            max-height:150px;
            color:white;
            height: 40px;
            
        }
        button:hover{
            background-color:yellow;
        }
    </style>
    <!-- Add other head elements as needed -->
</head>
<body>
    <h3>Welcome, <?php echo $user['email']; ?>! ,<?php echo $user['phone']; ?> ,<?php echo $user['home_address']; ?></h3>

    <!-- Display available services and corresponding chemicals -->
    <h4>Available Services:</h4>
    <form action="process_tankbooking.php" method="post">
        <label for="selected_service">Select Service:</label>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select name="selected_service" required>
            <?php echo $serviceOptions; ?>
        </select><br>
        <br>
        <label for="allergy_preference">Chemical Allergy:</label>
        &nbsp&nbsp&nbsp<input type="text" name="allergy_preference" required>
        <br><br>
        <label for="cleaning_date">Cleaning Date:</label>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="date" name="cleaning_date" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
        <br><br>
        <label for="number_of_pools">Number of Tanks:</label>
        &nbsp&nbsp&nbsp<input type="number" name="number_of_tanks" required min="1" max="10">
        <br><br>
        <!-- Add other form fields as needed (e.g., allergy_preference, cleaning_date, number_of_pools) -->
<br>
        <button type="submit">Submit Booking</button>
    </form>

    <!-- Add other content as needed -->
</body>
</html>
