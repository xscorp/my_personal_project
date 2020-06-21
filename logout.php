<?php
	include("config.php"); 
	session_start();
	$db = new mysqli("$dbhost" , "$dbuser" , "$dbpass");
	if ($db->connect_error) 
	{
		die("Connection failed: " . $db->connect_error);
	} 
	$db->select_db("$dbname");
	
	$email = $_SESSION["user"];
	$off_query = "update users set status = 'off' where email = '$email'";
	$db->query($off_query);
	
	session_unset();
	session_destroy();
	Header("location:index.php");
?>
