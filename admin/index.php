
<!DOCTYPE html>
<html>
<head>
	<title> Admin || Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel = "shortcut icon" href = "../uploads/cicon.png" />
    <!-- //for-mobile-apps -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link href="css/customize.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="../css/style4.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	
</head>
<body>
	<style>
		body{
			background-color: lightskyblue;
		}
        .clsDiv{
			background-color:lightskyblue;
			padding:90px;
			margin-top:20px;
		}
		.btn-block{
			background-color:aqua;
		}
		.btn-block:hover{
			background-color:yellow;
		}
		.container{
			background-color: lightskyblue;
			
		}
		
	</style>	

<div class="container">
<br><br><br>
<div class="clsDiv">
	<h4><font color="black">Admin</font></h4>
	<hr/>
	<form id="frmLogin" method="post" action="login.php">
		<label for="email" ><font color="black">Email</font></label>
		<input class="clsTxt" type="text" name="email" placeholder="Enter email">
		<label for="password"><font color="black">Password</font></label>
		<input class="clsTxt" type="text" name="password" placeholder="Enter password">
		<button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
	</form>
</div>
</div>
</body>
</html>
