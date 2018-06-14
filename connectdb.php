<?php 

	$SERVER = 'localhost';
   	$username = 'root';
	$passwd = 'root';
	$dbname = 'todo';
	
	$conn = new mysqli($SERVER,$username,$passwd,$dbname);
	if ($conn->connect_error) {
	  	die("Connection failed: " . $conn->connect_error);
	} 

?>