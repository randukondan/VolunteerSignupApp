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
				<?php
					$conn = mysqli_connect("127.0.0.1", "root", "", "mysql");
					if (!$conn) {die("Connection failed: " . mysqli_connect_error());} 
					$queryname = "SELECT first_name, last_name FROM users WHERE email = \"".$_SESSION["User"]."\";";
					$result = mysqli_query($conn,$queryname);
					$row = mysqli_fetch_array($result);
					$fname = $row['first_name'];
					$lname = $row['last_name'];
					echo "<h3>Hi there, ".$fname." ".$lname." welcome!</h3> <br><h4>You have logged in as an Admin.</h4>";
					$queryevents = "SELECT * from events;";
					$result = mysqli_query($conn, $queryevents);
					echo "<form method=\"post\" action=\"searchadmin.php\">
				  		<input type=\"text\" placeholder=\"Enter search criteria..\" name=\"query\">
				  		<select id=\"filter\" name=\"filter\">
				  			<option value = \"NA\">--- select a value ---</option>	
				  			<option value = \"title\">Event title</option>
				  			<option value = \"city\">Event city</option>
				  			<option value = \"description\">Event description</option>
				  			<option value = \"cname\">Event contact name</option>
				  		</select>
				  		<input type=\"submit\" value=\"Search\">
					</form></br>";
					echo "<h4>Current events on the system:</h4>";
					echo "<form method = \"post\" action = \"./modify.php\">";
					echo "<table style = 'text-align:center; margin:1em auto'><tr><th></th><th>Name</th><th>Date</th></tr>";
					while($row=mysqli_fetch_array($result))
					{
						echo "<tr><td>"."<input type=\"radio\" name=\"eventid\" value=\"".$row['event_id']."\">"."</td><td>".$row['title']."</td><td>".date("m-d-Y", strtotime(substr($row['start_time'], 0, 10)))."</td></tr>";
					}
					echo "</table>";
					echo "<button type=\"submit\" name=\"delete\" value=\"Delete\">Delete</button> &nbsp &nbsp";
					echo "<button type=\"submit\" name=\"edit\" value=\"Edit\">Edit</button></form>";

					// echo "<input type=\"submit\" name=\"delete\" value=\"Delete\">&nbsp &nbsp &nbsp";
					// echo "<input type=\"submit\" name=\"edit\" value=\"Edit\"></form>";
					mysqli_close($conn);
				?>
				</br>
				<a href="./addeventform.php"><button type="button">Add event</button></a>
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