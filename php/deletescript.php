<?php
	session_start();
	if($_SESSION["Admin"] == 0)
	{
		header('Location: ./logout.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete - Volunteer Sign-Up</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.css" />
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
	<meta charset="utf-8">
</head>

<body>
	<header style = "text-align: center">
		<nav> <!-- the buttons are a part of bootstrap -->
			<h3>Volunteer Sign-Up</h3>
		</nav> 
	</header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2"> <!-- creates small column left -->
				
			</div>
			<div class="col-sm-8" style="text-align: center"> <!-- creates big column mid -->
				<?php
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
					$conn = mysqli_connect("127.0.0.1", "root", "", "volunteer");
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
				</br></br>
				<a href="./homeadmin.php"><button type="button">Go back</button></a>  
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