<?php
	session_start();
	// print_r($_SESSION);
	if(!isset($_SESSION['User'])){
		header('Location: ../php/logout.php');
	}

	$eventid = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		//event id for registration
		if(empty($_POST["eventid"]))
		{
			$terror = "error";
			header('Location: ./eventdetails.php');   
		}
		else
		{
			$eventid = $_POST["eventid"];
			//echo $eventid;
		}

		$conn = mysqli_connect("127.0.0.1", "root", "", "mysql");
			if (!$conn) 
			{
				die("Connection failed: " . mysqli_connect_error());
			} 

		$email = $_SESSION["User"];
		//echo "$email";
		$querycheckcapacity = "SELECT capacity from events where event_id = '$eventid'";
		$resultcapa = mysqli_query($conn,$querycheckcapacity);
		$row = mysqli_fetch_array($resultcapa);

		

		$query = "SELECT * from is_registered WHERE event_id = '$eventid' AND user_id IN (SELECT user_id FROM users WHERE email = '$email');";
		$result = mysqli_query($conn,$query);

		if($result->num_rows > 0){
			echo "You have already registered for this event. Thank you.</br>";
		}
		else{
			if ($row['capacity']>0){

				$queryreg = "INSERT INTO is_registered values ('$eventid', (SELECT user_id FROM users WHERE email = '$email') );";
				$result2 = mysqli_query($conn, $queryreg);

				if ($result2) 
				{
					$queryupdatecapacity = "UPDATE events SET capacity = capacity - 1 WHERE event_id = \"".$eventid."\";";
					$result3 = mysqli_query($conn, $queryupdatecapacity);
				    echo "You have successfully registered for the event.</br>";
				    //header('Location: ../php/homeadmin.php');
				} 
				else 
				{
				    echo "Error registering";
				}
			}
			else{
				echo "Sorry, the event is currently at full capacity and you cannot register at this time.</br>";
			}
		}
		mysqli_close($conn);

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Event - Volunteer Sign-Up</title>
	<meta charset="utf-8">
</head>

<body>
</br>
	<a href="./eventdetails.php"><button type="button">Register for more events</button></a> 
	<a href="./homeuser.php"><button type="button">Back to homepage</button></a>
</body>
</html>