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
	<title>My History - Volunteer Sign-Up</title>
	<meta charset="utf-8">
</head>

<body>
	<p><b>Here are your upcoming events:</b></p>
	<?php
		$conn = mysqli_connect("127.0.0.1", "root", "", "mysql");
		if (!$conn) 
		{
			die("Connection failed: " . mysqli_connect_error());
		} 
		$email = $_SESSION["User"]; 
		//Next step: separate events as past events and upcoming events
		$queryupcoming = "SELECT R.event_id FROM is_registered R WHERE R.user_id IN (SELECT user_id from USERS where email = '$email') AND R.event_id IN (SELECT event_id from events WHERE end_time >=NOW())";
		$result = mysqli_query($conn,$queryupcoming);
		while($row = mysqli_fetch_array($result))
		{
			$queryfetch = "SELECT title, date_of, start_time FROM events WHERE event_id = \"".$row['event_id']."\";";
			$result2 = mysqli_query($conn, $queryfetch);
			$row2 = mysqli_fetch_array($result2);

			$querytime = "SELECT CAST(start_time AS time) FROM events WHERE event_id = \"".$row['event_id']."\"; ";
			$result3 = mysqli_query($conn, $querytime);
			$row3 = mysqli_fetch_array($result3);
			echo $row2['title']." on ".$row2['date_of']." at ".$row3['0']."</br>";
		}
		echo "</br>";
		echo "<p><b>Here are your past events:</b></p>";

		$querypast = "SELECT R.event_id FROM is_registered R WHERE R.user_id IN (SELECT user_id from USERS where email = '$email') AND R.event_id IN (SELECT event_id from events WHERE end_time < NOW())";
		$result = mysqli_query($conn,$querypast);
		while($row = mysqli_fetch_array($result))
		{
			$queryfetch = "SELECT title, date_of FROM events WHERE event_id = \"".$row['event_id']."\";";
			$result2 = mysqli_query($conn, $queryfetch);
			$row2 = mysqli_fetch_array($result2);
			echo $row2['title']." on ".$row2['date_of']."</br>";
		}
		echo "</br>";	
		mysqli_close($conn);	
	?>
	<a href="./eventdetails.php"><button type="button">View all events</button></a>
	<a href="./homeuser.php"><button type="button">Home</button></a> 
	<a href="./logout.php"><button type="button">Logout</button></a> 
</body>
</html>	