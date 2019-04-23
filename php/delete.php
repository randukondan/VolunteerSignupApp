<?php
	session_start();
	if($_SESSION["Admin"] == 0)
	{
		header('Location: ./logout.php');
	}
	$e_id = "";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{		
		if(empty($_POST["eventid"]))
		{
			$terror = "error";
			header('Location: ./homeadmin.php');   
		}
		else
		{
			$e_id = $_POST["eventid"];
			//echo $eventid;
		}
		$conn = mysqli_connect("127.0.0.1", "root", "", "mysql");
		if (!$conn) {die("Connection failed: " . mysqli_connect_error());} 
		if($_POST['delete'])
		{
			$query = "DELETE FROM events WHERE event_id = '$e_id';";
			$result = mysqli_query($conn,$query);
			if ($result) 
			{
			    echo "Event deleted successfully";
			    //header('Location: ../php/homeadmin.php');
			} 
			else 
			{
			    echo "Error deleting event";
			}
		}
		else if ($_POST['edit'])
		{
			
		}
		mysqli_close($conn);
	}
?>	

<!DOCTYPE html>
<html>
<head>
	<title>Delete - Volunteer Sign-Up</title>
	<meta charset="utf-8">
</head>

<body>
	<a href="./homeadmin.php"><button type="button">Go back</button></a> 
</body>
</html>