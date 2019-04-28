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
		echo "<form method=\"get\" action=\"searchadmin.php\">
  		<input type=\"text\" placeholder=\"Enter search criteria..\" name=\"q\">
  		<button type=\"submit\">Search</button>
	</form></br>";
		echo "<h4>Current events on the system:</h4>";

		echo "<form method = \"post\" action = \"./modify.php\">";
		echo "<table style = 'text-align:center'><tr><th></th><th>Name</th><th>Date</th></tr>";
		while($row=mysqli_fetch_array($result))
		{

			echo "<tr><td>"."<input type=\"radio\" name=\"eventid\" value=\"".$row['event_id']."\">"."</td><td>".$row['title']."</td><td>".date("d-m-Y", strtotime(substr($row['start_time'], 0, 10)))."</td></tr>";
		}
		echo "</table>";
		echo "<input type=\"submit\" name=\"delete\" value=\"Delete\">&nbsp &nbsp &nbsp";
		echo "<input type=\"submit\" name=\"edit\" value=\"Edit\"></form>";
		mysqli_close($conn);
	?>
	</br>
	<a href="./addeventform.php"><button type="button">Add event</button></a>
	<a href="./logout.php"><button type="button">Logout</button></a> 
</body>
</html>