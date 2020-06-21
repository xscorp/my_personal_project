<?php
	session_start();
	include("config.php"); 
?>
<?php
	$db = new mysqli("$dbhost" , "$dbuser" , "$dbpass");
	if ($db->connect_error) 
	{
		die("Connection failed: " . $db->connect_error);
	} 
	$db->select_db("$dbname");
?>

<html>
<head>
<title>Login</title>   
<link href="style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">  
<link href="https://fonts.googleapis.com/css2?family=Odibee+Sans&display=swap" rel="stylesheet"> 
</head>
<body>
<h2 class="kiba-header">Welcome</h2>
<p class="header-desc">Register if you are not a member</p>
<a href="login.php"></a><button class="login">Login</button></a>
<div class="container">
    <form method="post" class="register-form" action="">
        <h2 class="header"><br>&nbsp;&nbsp;&nbsp;&nbsp;Login</h2>
        <input type="text" class="fname" placeholder="Email" name="email" required><br><br>
        <input type="password" class="email" placeholder="Password" name="password" required><br><br>
        <input type="submit" class="register" name="login" value="Login"/>
      </form> 
</div>   
</body>
</html>

<?php
	if(isset($_POST["login"]))
	{
		$email = htmlspecialchars($_POST["email"]);
		$password = htmlspecialchars($_POST["password"]);
		$login_query = "select * from users where email = '$email' and password = '$password'";
	
		$result=$db->query($login_query);
		$row=$result->fetch_row();
		$fname = $row[0];
		if(($email==$row[1]) && ($password==$row[2]))
		{
			$_SESSION["user"] = $email;
			//change status from "off" to "on"
			$on_query = "update users set status = 'on' where email = '$email'";
			$db->query($on_query);
			$current_time = date('Y-m-d H:i:s', time());
			$log_query = "insert into access_logs (fname , access_time) values ('$fname' , '$current_time')";
			$db->query($log_query);
			Header("location:dashboard.php");
		}
		else
		{
			echo "<script>alert('Incorrect Credentials');</script>";
		}
	}
?>

