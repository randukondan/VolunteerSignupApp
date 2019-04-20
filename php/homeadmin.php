<?php
	session_start();
	print_r($_SESSION);

	if($_SESSION["isadmin"]== 0){
		header('Location: ../html/login.html');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta charset="utf-8">
</head>

<body>
	<h1>Hi there!</h1>
	<p>You have logged in.</p>
	
	
	<a href="./logout.php"><button type="button">Logout.</button></a> 
</body>
</html>