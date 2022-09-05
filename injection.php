<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if(!$conn) {
	die("Unable to connect");
}
if($_POST) {
	$uname = $_POST["username"];
	$pass = $_POST["password"];
	//Making sure that SQL Injection doesn't work
	$uname = mysqli_real_escape_string($conn, $uname);
	$pass = mysqli_real_escape_string($conn, $pass);
	//test' or 1=1#
	$sql = "SELECT * FROM users_tutorial WHERE username = '$uname' AND password = '$pass'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1) {
		echo"<script>location.href='http://localhost/injection/studentstable.php';</script>";
			
		
	} else {
		echo '<script>alert("Incorrect password or User")</script>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Portal</title>
	<!-- <style type="text/css">
		form{
			margin:auto;
		}
		input[type=text],input[type=password] {
			
		}
		input[type=submit] {
			
		}
		
	</style> -->
	<link rel="stylesheet" href="inj.css">
</head>
<body>
<h1>Weclome to Student Managment System</h1>
<input type="image" src="culogo.png" class="cu" alt="">
	<div class="formdiv">
	<form action method="POST" class="form" autocomplete="off" style="margin:auto;">
	

		<input type="text" name="username" class="inp" placeholder="Username" /><br />
		<input type="password" name="password" class="inp" placeholder="********" /><br />
		<input type="submit" class="submit" name="login" value="LOGIN" />
	</form>
	</div>
</body>
</html>