<?php
	session_start();
	if($_SESSION["Admin"] == 0){
		header('Location: ./logout.php');
	}
	$e_id = "";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{		
		$e_id = $_POST["e_id"];
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
		    echo "Error deleting record";
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
	<a href="../php/homeadmin.php"><button type="button">Go back</button></a> 
</body>
</html>