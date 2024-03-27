<?php 
  ob_start();
  require_once 'logincheck.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME CLEAN | SERVICES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <link rel = "shortcut icon" href = "../images/cicon.png" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	  <link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="///fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="///fonts.googleapis.com/css?family=Federo" rel="stylesheet">
     <link href="///fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../css/style6.css">

    <script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
	<?php include('includes/header.php');?>
  <div class="ts-main-content">
  <?php include('includes/leftbar.php');?>
 <div class="content-wrapper">
  <div class="container-fluid">
   <br/> <br/> 

 <div class="panel panel-default">
 <div class="panel-heading">
  <a href="manage_house.php"  class="btn btn-primary btn-sm" style = "float:right; margin-right:100px; margin-top: 3px;"><span class="glyphicon glyphicon-home"></span> BACK</a>
    <center><font color="green"><b><h3>DAILY HOME TASKS</h3></b></font></center>
    </div>
    <div class="panel-body">
     
     <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <td class="hidden"> </td>  
                 <td>Name</td>
                 <td>Activity Tasks</td>
                 <td>Date</td>
                 <td>Time</td>
                 <td>Status</td>
              </tr>
            </thead>
            <tbody>
                   <?php
                    $conn = new mysqli("localhost","root","","ltl") or die(mysqli_error());
                    
                    $query = $conn->query("SELECT * FROM `cleaners` WHERE `id` ='$_GET[id]' && `name` = '$_GET[name]' ") or die(mysqli_error());
                    while($fetch = $query->fetch_array()){
                  ?>
                    <tr>
                      <td class="hidden"><?php echo $fetch['user_no']?></td>
                      <td><?php echo $fetch['name']?></td>
                      <td><?php echo $fetch['activity']?></td>
                      <td><?php echo $fetch['tdate']?></td>
                      <td><?php echo $fetch['dtime']?></td>
                      <td> <label class="btn btn-sm btn-primary" disabled="disabled"><?php  if($fetch["status"] == '1')
                         {
                            echo  $status = '<h5>done</h5>';
            
                           } 
                          ?>
                           
                           
                           <?php if($row["status"] == '0')
                           {
                            echo  $status = '<h5>not yet started</h5>';
                           }
                           ?>
                           </label>
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
	 
</body>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="../js/main1.js"></script>
</html>
