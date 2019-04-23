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
			header('Location: ./addeventform.php');   
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
		$query = "SELECT * from is_registered WHERE event_id = '$eventid' AND user_id IN (SELECT user_id FROM users WHERE email = '$email');";
		$result = mysqli_query($conn,$query);

		if($result->num_rows > 0){
			echo "You have already registered for this event. Thank you.";
		}
		else{
			$queryreg = "INSERT INTO is_registered values ('$eventid', (SELECT user_id FROM users WHERE email = '$email') );";
			$result2 = mysqli_query($conn, $queryreg);

			if ($result2) 
			{
			    echo "You have successfully registered for the event";
			    //header('Location: ../php/homeadmin.php');
			} 
			else 
			{
			    echo "Error registering";
			}
			mysqli_close($conn);
		}

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
	<a href="./eventdetails.php"><button type="button">Go back</button></a> 
</body>
</html>