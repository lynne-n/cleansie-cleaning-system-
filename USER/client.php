<?php
// Start the session to access session variables
session_start();
$_SESSION['client_id'] = $client_id; // where $user_id is the actual user ID
echo "Session client_id: " . $_SESSION['client_id'];


// Include the database connection file using PDO
try {
    $connect = new PDO('mysql:host=localhost;dbname=activity', 'root', '');
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Verify if 'client_id' is set in the session
if(isset($_SESSION['client_id'])) {
    // Fetch user information from the database using a prepared statement
    $client_id = $_SESSION['client_id'];
    
    $stmt = $connect->prepare("SELECT * FROM `client` WHERE `client_id` = :client_id");
    $stmt->bindParam(':client_id', $client_id);
    
    if ($stmt->execute()) {
        $client = $stmt->fetch(PDO::FETCH_ASSOC);

        // Fetch user orders from the database
        $order_id = $client['order_id']; // Assuming there is an 'order_id' associated with the user
        $order_query = $connect->query("SELECT * FROM `orders` WHERE `order_id` = '$order_id'");
        $orders = $order_query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        die("Query failed: " . $stmt->errorInfo()[2]);
    }
} else {
    // Handle the case where 'client_id' is not set in the session
    echo "Session variable 'client_id' is not set.";
}

// Close the database connection outside the conditional block
$connect = null;
?>

<!-- Rest of your HTML code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <!-- Include your CSS stylesheets here -->
</head>
<body>

    <div class="ts-main-content">
        <!-- Include your header here -->

        <?php include('includes/leftbar.php');?>

        <div class="content-wrapper">
            <div class="container-fluid">

                <?php if (isset($client)) : ?>
                <!-- User Details Section -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>User Details</h3>
                    </div>
                    <div class="panel-body">
                        <p>User ID: <?= $client['client_id'] ?></p>
                        <p>Name: <?= $client['first_name'] ?></p>
                        <p>Email: <?= $client['email'] ?></p>
                        <!-- Add more user details as needed -->
                    </div>
                </div>

                <!-- User Orders Section -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>Your Orders</h3>
                    </div>
                    <div class="panel-body">
                        <?php if (!empty($orders)) : ?>
                            <table border="1">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <!-- Add more order details as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $order) : ?>
                                        <tr>
                                            <td><?= $order['order_id'] ?></td>
                                            <td><?= $order['product'] ?></td>
                                            <td><?= $order['quantity'] ?></td>
                                            <!-- Add more cells for additional order details -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p>No orders found.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php else : ?>
                    <!-- Display a message or redirect the user if the session variable is not set -->
                    <p>User details not available.</p>
                <?php endif; ?>

            </div>
        </div>

        <!-- Include your footer here -->

    </div>

</body>
</html>
