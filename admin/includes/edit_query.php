<?php
	if(ISSET($_POST['submit'])){
		$password = md5($_POST['password']);
		$conn = new mysqli("localhost","root","","ltl") or die(mysqli_error());
		$conn->query("UPDATE `admin` SET  `email`='email', `password` = '$password'") or die(mysqli_error());
		header("location: settings.php");
	}