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
	<?php
		$conn = mysqli_connect("127.0.0.1", "root", "", "mysql");
		if (!$conn) {die("Connection failed: " . mysqli_connect_error());} 
		$queryname = "SELECT first_name, last_name FROM users WHERE email = \"".$_SESSION["User"]."\";";
		$result = mysqli_query($conn,$queryname);
		$row = mysqli_fetch_array($result);
		$fname = $row['first_name'];
		$lname = $row['last_name'];
		echo "<h3>Hi there, ".$fname." ".$lname."!</h3> <br><h4>Welcome back!</h4>";
	?>
	<p>Look at the available events or look at your past events.</p>
	<form method="post" action="searchuser.php">
  		<input type="text" placeholder="Enter search criteria.." name="query">
  		<select id="filter" name="filter">
  			<option value = "NA">--- select a value ---</option>	
  			<option value = "title">Event title</option>
  			<option value = "city">Event city</option>
  			<option value = "description">Event description</option>
  			<option value = "cname">Event contact name</option>
  		</select>
  		<button type="submit">Search</button>
	</form></br>
	<a href="./userhistory.php"><button type="button">My Events</button></a> 
	<a href="./eventdetails.php"><button type="button">View Events</button></a>
	<a href="./logout.php"><button type="button">Logout</button></a> 
</body>
</html>