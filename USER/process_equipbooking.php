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
    $cleaningDate = isset($_POST['cleaning_date']) ? $_POST['cleaning_date'] : '';
    $numberOfEquipment = isset($_POST['number_of_equipment']) ? $_POST['number_of_equipment'] : '';

    // Validate inputs (add more validation if needed)
    if (empty($selectedService) || empty($cleaningDate) || empty($numberOfEquipment)) {
        echo "Error: Please fill in all required fields.";
        exit();
    }

    // Retrieve the price for the selected service
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

        // Store booking information in the pool_booking table
        $sqlInsertBooking = "INSERT INTO equip_booking (user_email, selected_service, cleaning_date, number_of_equipment, total_price) VALUES (?, ?, ?, ?, ?)";
        $stmtInsertBooking = $conn->prepare($sqlInsertBooking);
        $stmtInsertBooking->bind_param("ssssd", $_SESSION['user']['email'], $selectedService, $cleaningDate, $numberOfEquipment, $totalPrice);
        $stmtInsertBooking->execute();
        $stmtInsertBooking->close();

        // Store booking information in the session
        $_SESSION['booking'] = [
            'selected_service' => $selectedService,    
            'cleaning_date' => $cleaningDate,
            'number_of_equipment' => $numberOfEquipment,
        ];

        // Redirect the user to the booking report page
        header("Location: equipbooking_report.php");
        exit(); // Ensure that no code is executed after the header
    } else {
        // Handle the case where the price is not found
        echo "Error: Unable to fetch the price for the selected service.";
    }

    // Close the connection
    $conn->close();
} else {
    // Redirect to the booking page if the form wasn't submitted
    header("Location: equipbooking.php");
    exit(); // Ensure that no code is executed after the header
}
?>
