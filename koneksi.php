<?php
date_default_timezone_set('Asia/Makassar');
	$hostname="localhost"; // sesuaikan dengan nama host, jika belum di hosting maka $hostname="localhost"
	$username="root"; // sesuaikan dengan nama username, jika tidak ada maka $username="root"
	$password=""; //sesuaikan dengan password, jika tidak ada maka $password=""
	$database="zion"; //sesuaikan dengan nama database yang digunakan di MySQL

	if (!$con=mysqli_connect($hostname,$username,$password))
	{
		echo mysqli_error($con);
		exit;
	}
	else 
	{
		// select default database
		mysqli_select_db($con, $database);
	}
?>