<?php
require_once 'includes/conn1.php';

// Fetch inquiries data sorted by date
$conn = new mysqli("localhost", "root", "", "ltl") or die(mysqli_error());
$query = $conn->query("SELECT * FROM `inquiries` ORDER BY `Date` DESC") or die(mysqli_error());

// Check if there are any inquiries
if ($query->num_rows > 0) {
    echo "<html>
            <head>
                <title>Inquiries Report</title>
                <!-- Include any additional styling or scripts here -->
            </head>
            <body>
            <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #29abe0;
            }
        </style>

                <h2>Inquiries Report</h2>";

    // Add a form for date filtering
    echo '<form method="post" action="">
            <label for="start_date">Filter by Date:</label>
            <input type="date" name="start_date" required>
            <input type="submit" value="Filter">
          </form>';

    echo "<table border='1'>
            <thead>
                <tr>
                    <th>Inquiry ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Timestamp</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>";

    // Fetch and display each inquiry
    while ($row = $query->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>" . htmlspecialchars($row['message']) . "</td>
                <td>" . date('Y-m-d H:i:s', strtotime($row['Date'])) . "</td>
                <!-- Add more columns as needed -->
              </tr>";
    }

    echo "</tbody>
          </table>
          </body>
        </html>";

} else {
    echo "No inquiries found.";
}

// Close the database connection
$conn->close();
?>
