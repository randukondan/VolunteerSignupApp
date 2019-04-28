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
			$conn = mysqli_connect("127.0.0.1", "root", "", "volunteer");
			if (!$conn) 
			{
				die("Connection failed: " . mysqli_connect_error());
			} 
			//Next step: separate events as past events and upcoming events
			$query = "SELECT event_id, title, date_of, start_time, end_time, address, city, state, description, capacity, c_name, c_phone, c_email FROM events WHERE city LIKE '%'$input'%' end_time >= NOW();";
			$result = mysqli_query($conn,$query);
			echo "<form method = \"post\" action = \"./registerevent.php\">";
			while($row = mysqli_fetch_array($result)) 
			{
				echo "<div>";
				echo "<input type=\"radio\" name=\"eventid\" value=\"".$row['event_id']."\">";
				echo "<h2>".$row['title']."</h2>";
				echo "<h4>".$row['date_of']."</h4>";
				echo "<h4>".$row['start_time']." ".$row['end_time']."</h4>";
				echo "<h4>".$row['address']." ".$row['city']." ".$row['state']."</h4>";
				echo "<p>".$row['description']."</p>";
				echo "<p>Capacity: ".$row['capacity']."</p>";
				echo "<p>Contact name: ".$row['c_name']."; Contact phone: ".$row['c_phone']."; Contact email: ".$row['c_email']."</p>";
				echo "</div></br></br>";
			}
			echo "<input type=\"submit\" value=\"Register\"></form>";
			mysqli_close($conn);
		?>
		</br>
		<a href="./homeuser.php"><button type="button">Go Back</button></a>
		<a href="./logout.php"><button type="button">Logout</button></a> 
		<div class = "sidenav">
			<form action="/action_page.php">
		      <input type="text" placeholder="Search.." name="search">
		      <button type="submit">Submit</button>
		    </form>
		</div>
	</body>
</html>