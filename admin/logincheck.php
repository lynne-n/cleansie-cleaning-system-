<?php
	session_start();
	error_reporting(0);
		if(!ISSET($_SESSION['admin_id']))
			{
				header('location:index.php');
			}
?>