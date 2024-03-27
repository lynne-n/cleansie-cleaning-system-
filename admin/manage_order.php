<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $booking_id = $_POST['booking_id'];
    $status = $_POST['status'];

    // Update the status in the database
    $conn = new mysqli("localhost", "root", "", "ltl") or die(mysqli_error());
    $update_query = $conn->prepare("UPDATE `tank_booking` SET `status` = ? WHERE `booking_id` = ?");
    $update_query->bind_param("si", $status, $booking_id);
    $update_query->execute();
    $update_query->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CLEANSIE SERVICES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="../uploads/cicon.png" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style3.css">
    <link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="///fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="///fonts.googleapis.com/css?family=Federo" rel="stylesheet">
    <link href="///fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../css/style6.css">
</head>

<body>
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
  background-color: :#325d88;
}
</style>
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                
                        <h3>Tank Cleaning Orders</h3>
                    </div>
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
                                        <th>Tank No.</th>
                                        <th>Total Price</th>
                                        <th>Team</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $conn = new mysqli("localhost", "root", "", "ltl") or die(mysqli_error());
                                    $query = $conn->query("SELECT * FROM `tank_booking` ORDER BY `booking_id` DESC") or die(mysqli_error());
                                    while ($fetch = $query->fetch_array()) {
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
                                            <td>
                                        <form method='POST'>
                                            <input type='hidden' name='booking_id' value='<?php echo $fetch['booking_id']; ?>'>
                                            <select name='status'>
                                                <option value='pending' <?php echo ($fetch['status'] === 'pending' ? 'selected' : ''); ?>>Pending</option>
                                                <option value='confirmed' <?php echo ($fetch['status'] === 'confirmed' ? 'selected' : ''); ?>>Confirmed</option>
                                                <option value='cancelled' <?php echo ($fetch['status'] === 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                                            </select>
                                            <button type='submit' name='update_status'>Update</button>
                                        </form>
                                    </td>
                                            <td>
                                                <a href="update_tankorder.php?id=<?php echo $fetch['booking_id']; ?>" class="btn btn-primary"> UPDATE</a>
                                                <a href="tank_assign.php?booking_id=<?php echo $fetch['booking_id'] ?>&name=<?php echo $fetch['user_email'] ?>" class="btn btn-sm btn-info">
                                                    Process <span class="badge"><?php echo $f['total'] ?></span>
                                                </a>
                                            </td>
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
        </div>
    </div>
    <?php require 'script.php' ?>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <script src="../js/fileinput.js"></script>
    <script src="../js/chartData.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setTimeout(function () {
                $('.succWrap').slideUp("slow");
            }, 3000);
        });
    </script>
    <script src="../assets/js/util.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../js/main1.js"></script>
</body>
</html>
