<?php
	if(ISSET($_POST['submit'])){
		$user_no = $_SESSION['client_id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$address = $_POST['address'];
	    $image = rand(1000,10000)."-".$_FILES["image"]["name"];
		$filetmpname = $_FILES["image"]["tmp_name"];
		$folder = './uploads/';
		move_uploaded_file($filetmpname, $folder.'/'.$image);
		
		$conn = new mysqli("localhost","root","","activity") or die(mysqli_error());
		$conn->query("UPDATE `users` SET  `email` = '$email',   `name` = '$name', `mobile` = '$mobile', `address` = '$address',  `image`= '$image'") or die(mysqli_error());
		header("location: user.php");
	}