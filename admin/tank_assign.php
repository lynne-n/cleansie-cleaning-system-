<?php
// assign_cleaner.php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if order_id parameter is set in the URL
    if (isset($_GET['booking_id'])) {
        $booking_id = $_GET['booking_id'];

        // Load necessary functions or include the connection file
        require_once 'includes/conn1.php';

        // In your includes/functions.php file or another appropriate file
        function getAvailableCleaner($conn) {
            $cleaner = array();

            $sql = "SELECT * FROM `cleaners`";
            $result = $conn->query($sql);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $cleaner[] = $row;
                }
            }

            return $cleaner;
        }

        // Get the list of available cleaners (you may need to adjust this based on your data structure)
        $cleaner = getAvailableCleaner($conn);

        // Display a form to select a cleaner
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Assign Cleaner</title>
        </head>
        <body>
            <h2>Assign Cleaner to Order</h2>
            <form action="process_tankassign.php" method="post">
                <input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">
                <label for="cleaner">Select Cleaner:</label>
                <select name="cleaner" id="cleaner">
                    <?php foreach ($cleaner as $cleaner) : ?>
                        <option value="<?php echo $cleaner['team']; ?>"><?php echo $cleaner['team']; ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Assign Cleaner">
            </form>
        </body>
        </html>
        <?php
    } else {
        // Redirect to the orders page or display an error message
        header("Location: orders.php");
        exit();
    }
} else {
    // Handle other HTTP methods if needed
    echo "Invalid request method.";
}
?>
