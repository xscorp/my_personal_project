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
<title>Register !</title>   
<link href="style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">  
<link href="https://fonts.googleapis.com/css2?family=Odibee+Sans&display=swap" rel="stylesheet"> 
</head>
<body>
<h2 class="kiba-header">Welcome</h2>
<p class="header-desc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login if you are a member</p>
<a href="login.php"><button class="login">Login</button></a>
<div class="container">
    <form method="post" class="register-form" action="register.php">
        <h2 class="header"><br>&nbsp;Register</h2>
        <input type="text" class="fname" placeholder="Name" name="fname"><br><br>
        <input type="text" class="email" placeholder="Email"name="email"><br><br>
        <input type="password" class="password" placeholder="password" name="password"><br><br>
        <input type="submit" class="register" name="register" value="Register"/>
      </form> 
</div>   
</body>
</html>


<?php
	if(isset($_POST["register"]))
	{
		$fname = $_POST["fname"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$register_query = "insert into users (fname,email,password) values ('$fname' , '$email' , '$password')";
	
		if($db->query($register_query) === TRUE) {
			echo "<script>alert('Registration successful!');</script>";
		} else {
			echo "Error: " . $register_query . "<br/>" . $db->error;
		}
	}
?>
