<?php
	$ErrorMsgs = array(); 
	$host = "localhost";
	$username = "test";
	$password = "test";
	$db = "test";
	
	$DBConnect = new mysqli($host, $username, $password, $db);
	if  (!$DBConnect) {
		$ErrorMsgs[] = "The database server is not available.";
	} else {
		echo "Sucsessful connection</br>";
	}
		
?>