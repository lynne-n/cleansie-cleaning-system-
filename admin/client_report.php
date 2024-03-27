<?php
// Include your database connection file
require_once './includes/conn1.php';

// Fetch client data
$query = $conn->query("SELECT * FROM client") or die(mysqli_error());
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Your head content here -->

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


<div class="ts-main-content">
    
    <div class="content-wrapper">
        <center><h2 class="page-title">Client Report</h2></center>

        <div class="col-md-12 post-div mx-auto">
            <table border="1">
                <thead>
                <tr>
                    <th>Client ID</th>
                    <th>Full Name</th>                    
                    <th>Email</th>
                    <th>Join Date</th>
                    <!-- Add more columns as needed -->
                </tr>
                </thead>
                <tbody>
                <?php while ($row = $query->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['client_id']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <!-- Add more columns as needed -->
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</body>
</html>
