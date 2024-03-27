<?php
	if(ISSET($_POST['submit'])){
		$password = md5($_POST['password']);
		$conn = new mysqli("localhost","root","","activity") or die(mysqli_error());
		$conn->query("UPDATE `users` SET `password` = '$password'") or die(mysqli_error());
		header("location: setting.php");
	}