<?php
    require_once 'logincheck.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>CLEANSIE SERVICES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <link rel = "shortcut icon" href = "../uploads/cicon.png" />   
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style3.css">  
    <link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="///fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="///fonts.googleapis.com/css?family=Federo" rel="stylesheet">
    <link href="///fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../css/style6.css">
     <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <!-- Admin Stye -->     
</head>
<body>
  <style>
  .btn-add{
    background-color:#325d88;
    color:white;
  }
  .btn-add:hover{
    background-color:#29abe0;
  }
  table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  border: 1px solid ;
  padding: 8px;
  text-align: left;
}
th {
  background-color:#29abe0;
}
  </style>

    <?php include('includes/header.php');?>

  <div class="ts-main-content">

  <?php include('includes/leftbar.php');?>

 <div class="content-wrapper">
  <div class="container-fluid">
      
    
         <h3>CLEANERS</h3>
        
      </div>
      <div class = "panel-body">                
        <div class="table-responsive">
        <table id = "table" class = "display" width = "100%" cellspacing = "0">
        <a href="manage_cleaners.php?id=<?php echo $client_id; ?>" class="btn btn-add"> ADD CLEANER</a></td>
          <thead>
            <tr>
              <th>CLEANER ID.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Specialty</th>
              <th>Team</th>                    
              <th><center>Action</center></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $conn = new mysqli("localhost","root","","ltl") or die(mysqli_error());
            $query = $conn->query("SELECT * FROM `cleaners` ORDER BY `id` DESC") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
            $id = $fetch['user_no'];
            $q = $conn->query("SELECT COUNT(*) as total FROM `cleaners` where `id` = '$id'") or die(mysqli_error());
            $f = $q->fetch_array();
          ?>
            <tr>
              <td><?php echo $fetch['id']?></td>
              <td><?php echo $fetch['name']?></td>
              <td><?php echo $fetch['email']?></td>
              <td><?php echo $fetch['phone']?></td>
              <td><?php echo $fetch['specialty']?></td>
              <td><?php echo $fetch['team']?></td>
              <td><a href="updatecleaner.php?id=<?php echo $fetch['id']; ?>" class="btn btn-primary"> EDIT</a></td>
              <td><a href="deletecleaner.php?id=<?php echo $fetch['id']; ?>" onclick="return confirm('Are you sure you want to delete this cleaner?')">Delete</a></td>
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

<?php require'script.php' ?>
</div>
</div>
</div>  
</body>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/dataTables.bootstrap.min.js"></script>
  <script src="../js/fileinput.js"></script>
  <script src="../js/chartData.js"></script>
 
  <script type="text/javascript">
         $(document).ready(function () {          
          setTimeout(function() {
            $('.succWrap').slideUp("slow");
          }, 3000);
          });
  </script>
  <script src="../assets/js/util.js"></script>
  <script src="../assets/js/main.js"></script>
 <script src="../js/main1.js"></script>
</html>

