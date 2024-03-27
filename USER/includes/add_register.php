<?php
	if(ISSET($_POST['submit'])){
		$image = rand(1000,10000)."-".$_FILES["image"]["name"];
		$filetmpname = $_FILES["image"]["tmp_name"];
		$folder = './uploads/';
		move_uploaded_file($filetmpname, $folder.'/'.$image);
		$name = $_POST['name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$mobile = $_POST['mobile'];
		
		$conn = new mysqli("localhost","root","","activity") or die(mysqli_error());
		$q1 = $conn->query("SELECT * FROM `users` WHERE `email` = '$email'") or die(mysqli_error());
		$c1 = $q1->num_rows;
		if($c1 > 0){
				echo "<script type='text/javascript'>document.location='register.php';</script>";
		}else{
			$conn->query("INSERT INTO `users` VALUES(Null,'$image','$name','$password', '$email','$address', '$mobile', '0' )") or die(mysqli_error());
			echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
			echo "<script type='text/javascript'>document.location='index.php';</script>";

		
		}
	}

?>
	