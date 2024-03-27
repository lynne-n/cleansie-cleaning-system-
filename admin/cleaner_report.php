<?php
require_once './includes/conn1.php';

// Check if a specific team is provided
if (isset($_GET['team'])) {
    $selectedTeam = $_GET['team'];

    // Basic validation and sanitization
    $selectedTeam = trim($selectedTeam);
    $selectedTeam = htmlspecialchars($selectedTeam);

    $teamFilter = "AND team = ?";
    $pageTitle = "Cleaner Report for Team $selectedTeam";
} else {
    $teamFilter = "";
    $pageTitle = "Cleaner Report";
}

// Fetch cleaners from the database with optional team filter
$stmt = $conn->prepare("SELECT * FROM `cleaners` WHERE 1 $teamFilter ORDER BY team DESC");
if (isset($_GET['team'])) {
    $stmt->bind_param("s", $selectedTeam);
}
$stmt->execute();
$result = $stmt->get_result();
$cleaners = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $pageTitle ?></title>
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
</head>
<body>

    <h1><?= $pageTitle ?></h1>

    <!-- Form for team selection -->
    <form action="" method="get">
        <label for="team">Filter by Team:</label>
        <input type="text" name="team" id="team">
        <input type="submit" value="Filter">
    </form>
<br>
    <table border="1">
        <thead>
            <tr>
                <th>Cleaner ID</th>
                <th>Cleaner Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Specialty</th>
                <th>Team</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cleaners as $cleaner): ?>
                <tr>
                    <td><?= $cleaner['id'] ?></td>
                    <td><?= htmlspecialchars($cleaner['name']) ?></td>
                    <td><?= $cleaner['email'] ?></td>
                    <td><?= $cleaner['phone'] ?></td>
                    <td><?= $cleaner['specialty'] ?></td>
                    <td><?= $cleaner['team'] ?></td>
                    <!-- Add more cells for additional columns -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
