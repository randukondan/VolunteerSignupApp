<?php
	session_start();
	if(!isset($_SESSION['User'])){
		header('Location: ../php/logout.php');
	}

	$squery = $_GET['q'];

	$conn = mysqli_connect("127.0.0.1", "root", "", "mysql");
			if (!$conn) 
			{
				die("Connection failed: " . mysqli_connect_error());
			} 

			if($_GET['q'] == ''){
				$query = "SELECT event_id, title, date_of, start_time, end_time, address, city, state, description, capacity, c_name, c_phone, c_email FROM events WHERE end_time >= NOW();";
			}
			else{
				$query = "SELECT event_id, title, date_of, start_time, end_time, address, city, state, description, capacity, c_name, c_phone, c_email FROM events WHERE (title LIKE \"%"."$squery"."%\" OR address LIKE \"%"."$squery"."%\" OR city LIKE \"%"."$squery"."%\" OR state LIKE \"%"."$squery"."%\" OR description LIKE \"%"."$squery"."%\" OR c_name LIKE \"%"."$squery"."%\" OR c_email LIKE \"%"."$squery"."%\" OR c_phone LIKE \"%"."$squery"."%\");";
			}
			$result = mysqli_query($conn,$query);

			echo "<form method = \"post\" action = \"./registerevent.php\">";

			while($row = mysqli_fetch_array($result)) 
			{
				echo "<div>";
				echo "<input type=\"radio\" name=\"eventid\" value=\"".$row['event_id']."\">";
				echo "<h2>".$row['title']."</h2>";
				echo "<h4>".date("dS F Y", strtotime(substr($row['start_time'], 0, 10)))."</h4>";
				echo "<h4>".substr($row['start_time'], 11, 5)." hrs to ".substr($row['end_time'], 11, 5)." hrs</h4>";
				echo "<h4>".$row['address']." ".$row['city']." ".$row['state']."</h4>";
				echo "<p>".$row['description']."</p>";
				echo "<p>Capacity: ".$row['capacity']."</p>";
				echo "<p>Contact name: ".$row['c_name']."; Contact phone: ".$row['c_phone']."; Contact email: ".$row['c_email']."</p>";
				echo "</div></br></br>";
			}
			echo "<input type=\"submit\" value=\"Register\"></form>";

			mysqli_close($conn);
?>