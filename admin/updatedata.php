<?php
require_once "./includes/conn1.php";

// Check if client_id is provided in the URL
if (isset($_GET['id'])) {
    $client_id = $_GET['id'];

    // Fetch existing client data for the given client_id
    $sql = "SELECT * FROM `client` WHERE `client_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $client_id);
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
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Client</title>
            <!-- Include your CSS and JS files here -->
        </head>
        <body>

            <h2>Edit Client</h2>

            <form action="update_process.php" method="post">
                <!-- Add your form fields here with values from $row -->
                <input type="hidden" name="client_id" value="<?php echo $row['client_id']; ?>">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"><br><br>

                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"><br><br>
                
                <label for="email"> Email:</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
                
                <label for="phone"> Phone:</label>
                <input type="number" name="phone" value="<?php echo $row['phone']; ?>"><br><br>
               
                <label for="home_address"> home_address:</label>
                <input type="text" name="home_address" value="<?php echo $row['home_address']; ?>"><br><br>
                <!-- Add other fields as needed -->

                <input type="submit" value="Update">
            </form>

        </body>
        </html>
        <?php
    } else {
        echo "Record not found";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Client ID not provided";
}

// Close the connection
$conn->close();
?>
