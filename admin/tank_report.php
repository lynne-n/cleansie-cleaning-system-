<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filter_status'])) {
    $selected_status = $_POST['selected_status'];
    $conn = new mysqli("localhost", "root", "", "ltl") or die(mysqli_error());
    $query = $conn->prepare("SELECT * FROM `tank_booking` WHERE `status` = ? ORDER BY `booking_id` DESC");
    $query->bind_param("s", $selected_status);
    $query->execute();
    $result = $query->get_result();
} else {
    // Default query without filtering
    $conn = new mysqli("localhost", "root", "", "ltl") or die(mysqli_error());
    $query = $conn->query("SELECT * FROM `tank_booking` ORDER BY `booking_id` DESC") or die(mysqli_error());
    $result = $query;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CLEANSIE SERVICES - Pool Booking Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {  
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #29abe0;
        }
    </style>
</head>

<body>
    
                <h3>Tank Booking Report</h3>
                <form method="POST">
                    <label for="selected_status">Select Status:</label>
                    <select name="selected_status" id="selected_status">
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="cancelled">Cancelled</option>
                        <!-- Add more status options if needed -->
                    </select>
                    <button type="submit" name="filter_status">Filter</button>
                </form>
            </div><br>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="table" class="display" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Client Email</th>
                                <th>Service</th>
                                <th>Allergy</th>
                                <th>Cleaning Date</th>
                                <th>Pool No.</th>
                                <th>Total Price</th>                                        
                                <th>Team</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($fetch = $result->fetch_array()) {
                                $id = $fetch['booking_id'];
                                $q = $conn->query("SELECT COUNT(*) as total FROM `tank_booking` where `booking_id` = '$id'") or die(mysqli_error());
                                $f = $q->fetch_array();
                            ?>
                                <tr>
                                    <td><?php echo $fetch['booking_id'] ?></td>
                                    <td><?php echo $fetch['user_email'] ?></td>
                                    <td><?php echo $fetch['selected_service'] ?></td>
                                    <td><?php echo $fetch['allergy_preference'] ?></td>
                                    <td><?php echo $fetch['cleaning_date'] ?></td>
                                    <td><?php echo $fetch['number_of_tanks'] ?></td>
                                    <td>Ksh.<?php echo $fetch['total_price'] ?></td>                                            
                                    <td><?php echo $fetch['team'] ?></td>
                                    <td><?php echo $fetch['status'] ?></td>
                                    <td>
                                        
                                </tr>
                            <?php
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php require 'script.php' ?>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min
