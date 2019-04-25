<?php
	session_start();
	if($_SESSION["Admin"] == 0)
	{
		header('Location: ./logout.php');
	}
	$e_id = "";
		
	if(empty($_SESSION["eventid"]))
	{
		$terror = "error";
		header('Location: ./homeadmin.php');   
	}
	else
	{
		$e_id = $_SESSION["eventid"];
		//echo $eventid;
	}
	$conn = mysqli_connect("127.0.0.1", "root", "", "mysql");
	if (!$conn) {die("Connection failed: " . mysqli_connect_error());} 

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
	mysqli_close($conn);
	//unset($_SESSION["eventid"]);
?>	

<!DOCTYPE html>
<html>
<head>
	<title>Delete - Volunteer Sign-Up</title>
	<meta charset="utf-8">
</head>

<body>
</br></br>
	<a href="./homeadmin.php"><button type="button">Go back</button></a> 
</body>
</html>