<form action="add_cleaner.php" method="POST">
    <input type="text" name="name" placeholder="Cleaner Name" required>
    <input type="email" name="email" placeholder="Cleaner Email" required>
    <input type="tel" name="phone" placeholder="Cleaner Phone" required>
    <input type="text" name="specialty" placeholder="Cleaner Specialty" required>

    <!-- Select element for choosing the team -->
    <label for="team">Select Team:</label>
    <select name="team" id="team" required>
        <?php
            // Connect to your database (replace with your actual database connection code)
            $conn = new mysqli("localhost", "root", "", "ltl");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch teams from the database
            $query = "SELECT team_name FROM team";
            $result = $conn->query($query);

            // Populate the select element with teams
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['team_name'] . "'>" . $row['team_name'] . "</option>";
            }

            // Close the database connection
            $conn->close();
        ?>
    </select>

    <button type="submit">Add Cleaner</button>
</form>
