<?php
	session_start();
	include("config.php"); 

	if(isset($_SESSION["user"]) && $_SESSION["user"] == "admin@navigus.com")
	{
		echo "Logged in as: <b>" . $_SESSION["user"] . "</b>";
		echo "<form action='logout.php'>";
		echo "<input type='submit' name='logout' value='Logout' />";
		echo "</form>";
	}
	else
	{
		echo "<h3 align='center'>You must be an admin to view Access Logs</h3>";
                echo "<h3 align='center'>Administrator credentials:</h3>";
                echo "<h3 align='center'>Email: <b style='color:red'>admin@navigus.com</b></h3>";
                echo "<h3 align='center'>Password: <b style='color:red'>admin</b></h3>";
                exit();
	}

	$db = new mysqli("$dbhost" , "$dbuser" , "$dbpass");
	if ($db->connect_error) 
	{
		die("Connection failed: " . $db->connect_error);
	} 
	$db->select_db("$dbname");
	
	$logs_query = "select * from access_logs";
	$result = $db->query($logs_query);
	$num_rows=$result->num_rows;
	
	echo "<h1 align='center'>User Access Logs</h1>";
	
	echo "<html>";
	echo "<body>";
	echo "<table style='border:1px solid black;margin-left:auto;margin-right:auto;'>";
	echo "<tr>";
	echo "<th>Full Name</th>";
	echo "<th>Timestamp</th>";
	echo "</tr>";
	
	for($i=0;$i<$num_rows;$i++) 
	{   
		$row=$result->fetch_row();
		echo "<tr>";
		echo "<td>";
		echo $row[0];
		echo "</td>";
		echo "<td>";
		echo $row[1];
		echo "</td>";
		echo "</tr>";
	}

	echo "</table>";
	echo "</body>";
	echo "</html>";
?>

