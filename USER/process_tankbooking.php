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
    $numberOfTanks = isset($_POST['number_of_tanks']) ? $_POST['number_of_tanks'] : '';

    

    // Retrieve the price for the selected service
    $sqlPrice = "SELECT price FROM tank WHERE service_name = ?";
    $stmtPrice = $conn->prepare($sqlPrice);
    $stmtPrice->bind_param("s", $selectedService);
    $stmtPrice->execute();
    $resultPrice = $stmtPrice->get_result();

    if ($resultPrice->num_rows > 0) {
        $rowPrice = $resultPrice->fetch_assoc();
        $price = $rowPrice['price'];

        // Calculate the total price
        // Convert to integers before multiplication
$totalPrice = intval($numberOfTanks) * intval($price);


        // Close the price statement
        $stmtPrice->close();

        // Store booking information in the tank_booking table
        $sqlInsertBooking = "INSERT INTO tank_booking (user_email, selected_service, allergy_preference, cleaning_date, number_of_tanks, total_price) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtInsertBooking = $conn->prepare($sqlInsertBooking);
        $stmtInsertBooking->bind_param("sssssd", $_SESSION['user']['email'], $selectedService, $allergyPreference, $cleaningDate, $numberOfTanks, $totalPrice);
        $stmtInsertBooking->execute();
        $stmtInsertBooking->close();

        // Store booking information in the session
        $_SESSION['booking'] = [
            'selected_service' => $selectedService,
            'allergy_preference' => $allergyPreference,
            'cleaning_date' => $cleaningDate,
            'number_of_tanks' => $numberOfTanks,
        ];

        // Redirect the user to the booking report page
        header("Location: tankbooking_report.php");
        exit(); // Ensure that no code is executed after the header
    } else {
        // Handle the case where the price is not found
        echo "Error: Unable to fetch the price for the selected service.";
    }

    // Close the connection
    $conn->close();
} else {
    // Redirect to the booking page if the form wasn't submitted
    header("Location: tankbooking.php");
    exit(); // Ensure that no code is executed after the header
}
?>
