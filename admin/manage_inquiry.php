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
      
   
      
        <label> <h3>INQUIRIES</h3></Label>
      </div>
      <div class = "panel-body">                
        <div class="table-responsive">
        <table id = "table" class = "display" width = "100%" cellspacing = "0">
          <thead>
            <tr>
              <th>ID</th>
              <th>NAME</th>
              <th>EMAIL</th>
              <th>SUBJECT</th>
              <th>MESSAGE</th>
            <!--  <th>ADMIN RESPONSE</th> -->
              <th>DATE</th>
                       
            <!--  <th><center>Action</center></th> -->
            </tr>
          </thead>
          <tbody>
          <?php
            $conn = new mysqli("localhost","root","","ltl") or die(mysqli_error());
            $query = $conn->query("SELECT * FROM `inquiries` ORDER BY `id` DESC") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
            $id = $fetch['user_no'];
            $q = $conn->query("SELECT COUNT(*) as total FROM `inquiries` where `id` = '$id'") or die(mysqli_error());
            $f = $q->fetch_array();
          ?>
            <tr>
              <td><?php echo $fetch['id']?></td>
              <td><?php echo $fetch['name']?></td>
              <td><?php echo $fetch['email']?></td>
              <td><?php echo $fetch['subject']?></td>
              <td><?php echo $fetch['message']?></td>
             <!-- <td><?php echo $fetch['admin_response']?></td>-->
              <td><?php echo $fetch['Date']?></td>
             
            <!--  <td><a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#respondModal<?php echo $fetch['id']; ?>">
         <span class="glyphicon glyphicon-pencil"></span> Respond</a>-->
             
            </center></td>
            <div id="respondModal<?php echo $fetch['id']; ?>" class="modal fade" role="dialog">
      <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Respond to Inquiry</h4>
            </div>
            <div class="modal-body">
               <form action="respond_inquiry.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $fetch['id']; ?>">
                 <!-- <div class="form-group">
                     <label for="response">Your Response:</label>
                     <textarea class="form-control" rows="4" name="response" required></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Send Response</button>
               </form>
            </div>
         </div>
      </div>
   </div>-->
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

