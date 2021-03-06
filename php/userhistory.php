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
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.css" />
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
	<meta charset="utf-8">
</head>

<body>
	<header style = "text-align: right">
		<nav> <!-- the buttons are a part of bootstrap -->
			<a href="./logout.php" class="btn btn-outline-light">Logout</a> 
		</nav> 
	</header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2"> <!-- creates small column left -->
				
			</div>
			<div class="col-sm-8" style="text-align: center"> <!-- creates big column mid -->
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
						$queryfetch = "SELECT title, start_time FROM events WHERE event_id = \"".$row['event_id']."\";";
						$result2 = mysqli_query($conn, $queryfetch);
						$row2 = mysqli_fetch_array($result2);
						$querytime = "SELECT CAST(start_time AS time) FROM events WHERE event_id = \"".$row['event_id']."\"; ";
						$result3 = mysqli_query($conn, $querytime);
						$row3 = mysqli_fetch_array($result3);
						echo $row2['title']." on ".date("dS F Y", strtotime(substr($row2['start_time'], 0, 10)))." at ".$row3['0']."</br>";
					}
					echo "</br>";
					echo "<p><b>Here are your past events:</b></p>";
					$querypast = "SELECT R.event_id FROM is_registered R WHERE R.user_id IN (SELECT user_id from USERS where email = '$email') AND R.event_id IN (SELECT event_id from events WHERE end_time < NOW())";
					$result = mysqli_query($conn,$querypast);
					while($row = mysqli_fetch_array($result))
					{
						$queryfetch = "SELECT title, start_time FROM events WHERE event_id = \"".$row['event_id']."\";";
						$result2 = mysqli_query($conn, $queryfetch);
						$row2 = mysqli_fetch_array($result2);
						echo $row2['title']." on ".date("dS F Y", strtotime(substr($row2['start_time'], 0, 10)))."</br>";
					}
					echo "</br>";	
					mysqli_close($conn);	
				?>
				<a href="./eventdetails.php"><button type="button">View all events</button></a>
				<a href="./homeuser.php"><button type="button">Home</button></a>  
			</div>
			<div class="col-sm-2 centered"> <!-- creates small column to the right -->
				
			</div>
		</div>
	</div>
	<footer class="footB">
		CS6314.002 - Web Languages
		<a href="http://validator.w3.org/check/referer">
		<img src="http://www.w3.org/Icons/valid-xhtml11" alt="Validate" />
		</a> 
	</footer>
</body>
</html> 