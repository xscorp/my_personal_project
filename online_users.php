<?php
	session_start();
	include("config.php"); 

	if(isset($_SESSION["user"]))
	{
		echo "Logged in as: <b>" . $_SESSION["user"] . "</b>";
		echo "<form action='logout.php'>";
		echo "<input type='submit' name='logout' value='Logout' />";
		echo "</form>";
	}
	else
	{
		Header("location:login.php");
	}
?>
<?php
	$db = new mysqli("$dbhost" , "$dbuser" , "$dbpass");
	if ($db->connect_error) 
	{
		die("Connection failed: " . $db->connect_error);
	} 
	$db->select_db("$dbname");

	$retrive_query = "select fname from users where status = 'on'";
	$result = $db->query($retrive_query);
	$num_rows=$result->num_rows;
	echo "<h1 align='center'>Online/Active users</h1>";
	for($i=0;$i<$num_rows;$i++) 
	{   
		$row=$result->fetch_row();
		$user_icon = "<div align='center'><img src='usericon.png' width='100' height='100'/><br/>" . $row[0] . "</div><br/><br/>";
		echo $user_icon;
	}
?>

