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
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.css" />
		<link rel="stylesheet" type="text/css" href="../css/index.css" />
		<meta charset="utf-8">
	</head>

<body>
	<header style = "text-align: right">
		<nav>
			<a href="./homeuser.php" class="btn btn-outline-light">Home</a>
			<a href="./logout.php" class="btn btn-outline-light">Logout</a> 
		</nav>
	</header>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2"> <!-- creates small column left -->

			</div>
			<div class="col-sm-8" style="text-align: center"> <!-- creates big column mid -->
				<?php 
					$conn = mysqli_connect("127.0.0.1", "root", "", "volunteer");
					if (!$conn) 
					{
						die("Connection failed: " . mysqli_connect_error());
					} 
					//Next step: separate events as past events and upcoming events
					$query = "SELECT event_id, title, date_of, start_time, end_time, address, city, state, description, capacity, c_name, c_phone, c_email, imagename FROM events WHERE end_time >= NOW();";
					$result = mysqli_query($conn,$query);
					echo "<form class= 'form' method = \"post\" action = \"./registerevent.php\">";
					while($row = mysqli_fetch_array($result)) 
					{
						echo "<div>";
						echo "<input type=\"radio\" name=\"eventid\" value=\"".$row['event_id']."\">";
						echo "<h4>".$row['title']."</h4>";
						echo "<p>".date("dS F Y", strtotime(substr($row['start_time'], 0, 10)))."";
						echo "</br>".substr($row['start_time'], 11, 5)." hrs to ".substr($row['end_time'], 11, 5)." hrs";
						echo "</br>".$row['address']." ".$row['city']." ".$row['state']."";
						echo "</br>".$row['description']."";
						echo "</br>Available capacity: ".$row['capacity']."";
						echo "</br> Contact name: ".$row['c_name']."; Contact phone: ".$row['c_phone']."; Contact email: ".$row['c_email']."";
						echo "</br>Image: <img src=\"../images/".$row['imagename']."\" style=\"width:150px;height:150px;\"></p>";
						echo "</div></br></br>";
					}
					echo "<button type=\"submit\" value=\"Register\"/>Register</button></form>";
					mysqli_close($conn);
				?>
				</br>
			</div>
			<div class="col-sm-2 centered"> <!-- creates small column to the right -->
				
			</div>
		</div>
	</div>
	<footer class="footA">
		CS6314.002 - Web Languages
		<a href="http://validator.w3.org/check/referer">
		<img src="http://www.w3.org/Icons/valid-xhtml11" alt="Validate" />
		</a> 
	</footer>
</body>
</html>