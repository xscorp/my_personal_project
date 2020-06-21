k<?php
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
		echo "<h3 align='center'>You must be an admin to view active users</h3>";
		echo "<h3 align='center'>Administrator credentials:</h3>";
		echo "<h3 align='center'>Email: <b style='color:red'>admin@navigus.com</b></h3>";
		echo "<h3 align='center'>Password: <b style='color:red'>admin</b></h3>";
		exit();
	}
?>
<?php
	$db = new mysqli("$dbhost" , "$dbuser" , "$dbpass");
	if ($db->connect_error) 
	{
		die("Connection failed: " . $db->connect_error);
	} 
	$db->select_db("$dbname");

	$retrive_query = "select fname, email from users where status = 'on'";
	$result = $db->query($retrive_query);
	$num_rows=$result->num_rows;
	echo "<h1 align='center'>Online/Active users</h1>";
	for($i=0;$i<$num_rows;$i++) 
	{   
		$row=$result->fetch_row();
		$detail = "Name: " . $row[0] . "\nEmail: " . $row[1];
		$user_icon = "<div align='center'><img title='$detail' src='usericon.png' width='100' height='100'/><br/>" . $row[0] . "</div><br/><br/>";
		echo $user_icon;
	}
?>

