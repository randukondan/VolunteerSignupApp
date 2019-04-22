<?php
	session_start();
	// print_r($_SESSION);
	if(!isset($_SESSION['User'])){
		header('Location: ../php/logout.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Event Details - Volunteer Sign-Up</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php 
			$conn = mysqli_connect("127.0.0.1", "root", "", "mysql");
			if (!$conn) 
			{
				die("Connection failed: " . mysqli_connect_error());
			} 
			$query = "SELECT title, date_of, start_time, end_time, address, city, state, description, capacity, c_name, c_phone, c_email FROM events WHERE event_id = 1;";
			$result = mysqli_query($conn,$query);
			while($row = mysqli_fetch_array($result)) 
			{
				echo "<h1>".$row['title']."</h1>";
				echo "<h2>".$row['date_of']."</h2>";
				echo "<h3>".$row['start_time']." ".$row['end_time']."</h3>";
				echo "<h4>".$row['address']." ".$row['city']." ".$row['state']."</h4>";
				echo "<p>".$row['description']."</p>";
				echo "<p>Capacity: ".$row['capacity']."</p>";
				echo "<p>Contact name: ".$row['c_name']."; Contact phone: ".$row['c_phone']."; Contact email: ".$row['c_email']."</p>";
			}
		?>
		<a href="./logout.php"><button type="button">Logout</button></a> 
	</body>
</html>