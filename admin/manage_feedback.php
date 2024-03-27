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

    <?php include('includes/header.php');?>

  <div class="ts-main-content">

  <?php include('includes/leftbar.php');?>

 <div class="content-wrapper">
  <div class="container-fluid">
      
    <div class = "panel panel-primary">
      <div class = "panel-heading">
        <label> <h3>FEEDBACK</h3></Label>
      </div>
      <div class = "panel-body">                
        <div class="table-responsive">
        <table id = "table" class = "display" width = "100%" cellspacing = "0">
          <thead>
            <tr>
              <th>ID.</th>
              <th>NAME</th>
              <th>FEEDBACK</th>             
                       
              <th><center>Action</center></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $conn = new mysqli("localhost","root","","ltl") or die(mysqli_error());
            $query = $conn->query("SELECT * FROM `feedback` ORDER BY `id` DESC") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
            $id = $fetch['user_no'];
            $q = $conn->query("SELECT COUNT(*) as total FROM `feedback` where `id` = '$id'") or die(mysqli_error());
            $f = $q->fetch_array();
          ?>
            <tr>
              <td><?php echo $fetch['id']?></td>
              <td><?php echo $fetch['name']?></td>
              <td><?php echo $fetch['feedback']?></td>
              
              <td><center><a href = "process.php?id=<?php echo $fetch['user_no']?>&name=<?php echo $fetch['name']?>" class = "btn btn-sm btn-info">Process <span class = "badge"><?php echo $f['total']?></span></a>
                <a href = "#" class = "btn btn-sm btn-warning"><span class = "glyphicon glyphicon-pencil"></span> Update</a>
             
            </center></td>
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

