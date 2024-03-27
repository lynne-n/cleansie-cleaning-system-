<?php require_once'logincheck.php';?>
<!DOCTYPE html>
<html>
<head>
  <title>CLEANSIE</title>
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
     <style>

  .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
  background: blue;
  color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
  background: blue;
  color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.col-md-12{
  padding-left: 0px;
  width:105%;
  margin-right:0px;
}

    </style> 
</head>
<body>
  <?php include('./includes/header.php');?>
  <div class="ts-main-content">
  <?php include('./includes/leftbar.php');?>
 <div class="content-wrapper">
             <center> <h2 class="page-title">DASHBOARD</h2></center>

          <div class="col-md-12 col-md-offset-2 post-div mx-auto">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-3">
                    <div class="panel panel-default">
                      <div class="panel-body bk-primary text-light">
                        <div class="stat-panel text-center">

                 <?php 
                   $conn = new mysqli("localhost","root","","ltl") or die(mysqli_error());
                   $qusers = $conn->query("SELECT COUNT(client_id) AS total FROM `client`") or die(mysqli_error());
                   $fusers = $qusers->fetch_array();                        
                 ?>
                          <div class="stat-panel-number h1 "><?php echo $fusers['total'];?></div>
                          <div class="stat-panel-title text-uppercase">CLIENTS</div>
                        </div>
                      </div>
                      <a href="userlist.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                    </div>
                  </div>

                  <div class="col-md-3">       
                   <div class="panel panel-default">
                      <div class="panel-body bk-info text-light">
                        <div class="stat-panel text-center">

                      <?php 
                         $conn = new mysqli("localhost","root","","ltl") or die(mysqli_error());
                         $qusers = $conn->query("SELECT COUNT(id) AS total FROM `cleaners`") or die(mysqli_error());
                         $fhouse = $qusers->fetch_array();
                       ?>
                          <div class="stat-panel-number h1 "><?php echo   $fhouse['total'];?></div>
                          <div class="stat-panel-title text-uppercase">CLEANERS</div>
                        </div>
                      </div>
                      <a href="manage_house.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                    <div class="panel panel-default">
                      <div class="panel-body bk-primary text-light">
                        <div class="stat-panel text-center">
                          <div class="stat-panel-number h1">6</div>
                             <div class="stat-panel-title text-uppercase">Reports</div>
                           </div>
                             </div>
                      <a href="reports.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
    </div>
</div>
            </div>
          </div>
      
</div>
</div>
</div>
</body>

  <script>
    
  window.onload = function(){
    
    // Line chart from swirlData for dashReport
    var ctx = document.getElementById("dashReport").getContext("2d");
    window.myLine = new Chart(ctx).Line(swirlData, {
      responsive: true,
      scaleShowVerticalLines: false,
      scaleBeginAtZero : true,
      multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
    }); 
    
    // Pie Chart from doughutData
    var doctx = document.getElementById("chart-area3").getContext("2d");
    window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

    // Dougnut Chart from doughnutData
    var doctx = document.getElementById("chart-area4").getContext("2d");
    window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

  }
  </script>
  <script type="text/javascript">
         $(document).ready(function () {          
          setTimeout(function() {
            $('.succWrap').slideUp("slow");
          }, 3000);
          });
  </script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="../js/main1.js"></script>
</html>
