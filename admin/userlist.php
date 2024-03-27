<?php require_once 'logincheck.php'; ?>
<?php include './includes/config.php';

$msg = ""; // Initialize the $msg variable

if (isset($_REQUEST['unconfirm'])) {
    // ... (Your existing code for unconfirm)
}

if (isset($_REQUEST['confirm'])) {
    // ... (Your existing code for confirm)
}
?>
<!-- ... (Your existing HTML code) ... -->
<!DOCTYPE html>
<!-- ... (Your existing HTML code) ... -->
<html>
<head>
  <title>HOME BASED SERVICES</title>
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
  background: #dd3d36;
  color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
  background: #29abe0;
  color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.btn-add{
  color: white;
  font-size:14px;
  background-color:#325d88;

}
.btn-add:hover{
  background-color: #29abe0;
}
table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  border: 1px solid purple;
  padding: 8px;
  text-align: left;
}
th {
  background-color: #29abe0;
}
</style>
</head>
<body>
  <?php include('./includes/header.php');?>
  <div class="ts-main-content">
  <?php include('./includes/leftbar.php');?>
 <div class="content-wrapper">
        <div class="container-fluid">
      
        <div class="row">
          <div class="col-md-12">
            <h2 class="page-title">Manage Clients</h2>
            <a href="manage_client.php?id=<?php echo $client_id; ?>" class="btn btn-add"> ADD NEW CLIENT</a></td>

            <!-- Zero Configuration Table -->
            <div class="panel panel-default">
              
              <div class="panel-body">
              <?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
             else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
                 <div class="table-responsive">

    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>client_id</th>
          <th>full_name</th>          
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>            
          <th>Action</th> 
        </tr>
      </thead>
                  
      <tbody>
        <?php
          $conn = new mysqli("localhost","root","","ltl") or die(mysqli_error());
          $query = $conn->query("SELECT * FROM `client` ORDER BY `client_id` DESC") or die(mysqli_error());
          while($row= mysqli_fetch_array($query)) {
        ?>
           <tr>
               <td><?php echo $row['client_id'];?></td>                      
               <td><?php echo $row['full_name'];?></td>               
               <td><?php echo $row['email'];?></td>
               <td><?php echo $row['phone'];?></td>
               <td><?php echo $row['home_address'];?></td>

               <td><a href="updatedata.php?id=<?php echo $row['client_id']; ?>" class="btn btn-primary"> EDIT</a></td>

               <td><a href="deletedata.php?id=<?php echo $row['client_id']; ?>" class="btn btn-danger"> DELETE</a></td>
                                               
            </tr>                                        
          </tbody>                     
        <?php
          }
          $conn->close();
        ?> 
    </table>
        </div>
      </div>  
        </div>  
        </div>
        </div>
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
