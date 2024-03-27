<?php
require_once "./includes/conn1.php";

// Check if client_id is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing client data for the given client_id
    $sql = "SELECT * FROM `cleaners` WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
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
            <title>Edit Cleaner</title>
            <!-- Include your CSS and JS files here -->
        </head>
        <body>

            <h2>Edit Cleaner</h2>

            <form action="update_cleaner_process.php" method="post">
                <!-- Add your form fields here with values from $row -->
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
                
                <label for="phone"> Phone:</label>
                <input type="number" name="phone" value="<?php echo $row['phone']; ?>" required><br>
                
                <label for="specialty"> Specialty:</label>
                <input type="text" name="specialty" value="<?php echo $row['specialty']; ?>" required><br>
               
                <label for="team"> Team:</label>
                <input type="text" name="team" value="<?php echo $row['team']; ?>" required><br>
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
