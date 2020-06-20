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

<div align="center">
<br/>
<br/>
<a href="online_users.php"><button>Online/Active users</button></a>
<br/>
<br/>
<a href="access_logs.php"><button>Access Logs</button></a>
<br/>
<br/>
<br/>
<br/>
<a href="index.php"><button>Home</button></a>
</div>
