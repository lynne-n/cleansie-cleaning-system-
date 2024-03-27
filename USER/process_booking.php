<?php
session_start(); // Start a session

// Check if the form is submitted
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

    // Get values from the form and perform basic input validation
    $selectedService = isset($_POST['selected_service']) ? $_POST['selected_service'] : '';
    $allergyPreference = isset($_POST['allergy_preference']) ? $_POST['allergy_preference'] : '';
    $cleaningDate = isset($_POST['cleaning_date']) ? $_POST['cleaning_date'] : '';
    $numberOfPools = isset($_POST['number_of_pools']) ? $_POST['number_of_pools'] : '';

    // Validate inputs (add more validation if needed)
    if (empty($selectedService) || empty($cleaningDate) || empty($numberOfPools)) {
        echo "Error: Please fill in all required fields.";
        exit();
    }

    // Retrieve the price for the selected service
    $sqlPrice = "SELECT price FROM pool WHERE service_name = ?";
    $stmtPrice = $conn->prepare($sqlPrice);
    $stmtPrice->bind_param("s", $selectedService);
    $stmtPrice->execute();
    $resultPrice = $stmtPrice->get_result();

    if ($resultPrice->num_rows > 0) {
        $rowPrice = $resultPrice->fetch_assoc();
        $price = $rowPrice['price'];

        // Calculate the total price
        $totalPrice = $numberOfPools * $price;

        // Close the price statement
        $stmtPrice->close();

        // Store booking information in the pool_booking table
        $sqlInsertBooking = "INSERT INTO pool_booking (user_email, selected_service, allergy_preference, cleaning_date, number_of_pools, total_price) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtInsertBooking = $conn->prepare($sqlInsertBooking);
        $stmtInsertBooking->bind_param("sssssd", $_SESSION['user']['email'], $selectedService, $allergyPreference, $cleaningDate, $numberOfPools, $totalPrice);
        $stmtInsertBooking->execute();
        $stmtInsertBooking->close();

        // Redirect the user to the booking report page
        // ... (your existing code)

// Store booking information in the session
$_SESSION['booking'] = [
    'selected_service' => $selectedService,
    'allergy_preference' => $allergyPreference,
    'cleaning_date' => $cleaningDate,
    'number_of_pools' => $numberOfPools,
];

// Redirect the user to the booking report page
header("Location: poolbooking_report.php");
exit(); // Ensure that no code is executed after the header
 // Ensure that no code is executed after the header
    } else {
        // Handle the case where the price is not found
        echo "Error: Unable to fetch the price for the selected service.";
    }

    // Close the connection
    $conn->close();
} else {
    // Redirect to the booking page if the form wasn't submitted
    header("Location: booking.php");
    exit(); // Ensure that no code is executed after the header
}
?>
