<?php
	session_start();
	// print_r($_SESSION);
	if(!isset($_SESSION['User'])){
		header('Location: ../php/logout.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home - Volunteer Sign-Up</title>
	<meta charset="utf-8">
</head>

<body>
	<h1>Hello!</h1>
	<p>Welcome back.</p>
	<p>Look at the available events or look at your past events.</p>
	<a href="./eventdetails.php"><button type="button">Register for an event</button></a>
	<a href="./history.php"><button type="button">My History</button></a> 
	<a href="./eventdetails.php"><button type="button">Random Details</button></a>
	<a href="./logout.php"><button type="button">Logout</button></a> 
</body>
</html>