<?php
	session_start();
	//print_r($_SESSION);
	if($_SESSION["Admin"] == 0){
		header('Location: ../php/logout.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin - Volunteer Sign-Up</title>
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
		echo "<h3>Hi there, ".$fname." ".$lname." welcome!</h3> <br><h4>You have logged in as an Admin.</h4>";
		$queryevents = "SELECT * from events WHERE end_time >= NOW();";
		$result = mysqli_query($conn, $queryevents);
		echo "<h4>Current events:</h4>";
		echo "<table style = 'text-align:center'><tr><th>ID</th><th>Name</th></tr>";
		while($row=mysqli_fetch_array($result))
		{
			echo "<tr><td>".$row['event_id']."</td><td>".$row['title']."</td></tr>";
		}
		echo "</table>";
		mysqli_close($conn);
	?>
	<hr/>
	<p>Enter event ID to delete it</p>
	<form method="post" action="./delete.php">	
		ID: <input type="text" name="e_id" id="e_id">  
		<input type="submit" value="Delete Event"/>
	</form>
	</br>
	<a href="./addeventform.php"><button type="button">Add event</button></a>
	<a href="./logout.php"><button type="button">Logout</button></a> 
</body>
</html>