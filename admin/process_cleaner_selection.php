<?php
    // process_cleaner_selection.php

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the selected cleaner from the form
        $selectedCleaner = $_POST['cleaner'];

        // Perform any additional logic (e.g., save the selected cleaner to the database)

        // Redirect or display a success message
        echo "Cleaner $selectedCleaner has been selected for Order #$booking_id.";
    } else {
        // If the form is not submitted, redirect to the choose_cleaner.php page
        header("Location: a1.php");
        exit();
    }
?>
