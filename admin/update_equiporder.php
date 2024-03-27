<?php
require_once "./includes/conn1.php";

// Check if order_id is provided in the URL
if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];

    // Fetch existing order data for the given client_id
    $sql = "SELECT * FROM `equip_booking` WHERE `booking_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a record is found
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display the form with existing data
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <!-- Include your styles and scripts here -->
        </head>
        <body>
            <h2>Edit Order</h2>

            <form action="update_process_equiporder.php" method="post">
            <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                
            <label for="user_email">Email:</label>
                <input type="text" name="user_email" value="<?php echo $row['user_email']; ?>"><br>

                <label for="selected_service">service:</label>
                <input type="text" name="selected_service" value="<?php echo $row['selected_service']; ?>"><br>
                
                <label for="cleaning_date">date:</label>
                <input type="date" name="cleaning_date" value="<?php echo $row['cleaning_date']; ?>"><br>
               
                <label for="number_of_pools"> number_of_pools:</label>
                <input type="number" name="number_of_equipment" value="<?php echo $row['number_of_equipment']; ?>"><br>
                
                <label for="total_price"> total_price:</label>
                <input type="number" name="total_price" value="<?php echo $row['total_price']; ?>"><br>


                <!-- Add other fields as needed -->

                <input type="submit" value="Update">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Order not found";
    }

    // Close the connection
    $conn->close();
} else {
    echo "Order ID not provided";
}
?>
