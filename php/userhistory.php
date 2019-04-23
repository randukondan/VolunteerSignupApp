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
	<p>Here are the events you are currently registered for:</p>
	<?php
		$conn = mysqli_connect("127.0.0.1", "root", "", "mysql");
		if (!$conn) 
		{
			die("Connection failed: " . mysqli_connect_error());
		} 
		$email = $_SESSION["User"]; 
		//Next step: separate events as past events and upcoming events
		$query = "SELECT event_id FROM is_registered WHERE user_id IN (SELECT user_id FROM users WHERE email = '$email');";
		$result = mysqli_query($conn,$query);
		while($row = mysqli_fetch_array($result))
		{
			$queryfetch = "SELECT title FROM events WHERE event_id = \"".$row['event_id']."\";";
			$result2 = mysqli_query($conn, $queryfetch);
			$row2 = mysqli_fetch_array($result2);
			echo $row2['title']."</br>";
		}
		echo "</br>";
	?>
	<a href="./eventdetails.php"><button type="button">View all events</button></a>
	<a href="./homeuser.php"><button type="button">Home</button></a> 
	<a href="./logout.php"><button type="button">Logout</button></a> 
</body>
</html>