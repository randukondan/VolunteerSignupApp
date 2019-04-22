<?php
	session_start();
	//print_r($_SESSION);
	if($_SESSION["Admin"] == 0){
		header('Location: ./logout.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Event - Volunteer Sign-Up</title>
	<meta charset="utf-8">
</head>

<body>
	<h1>Add Event</h1>
	<p>Fill all the fields to add event.</p>
	<form method="post" action="./addeventscript.php">	
		Title: <input type="text" name="title" id="title"> </br>
		Date of: <input type="text" name="dateof" id="dateof"> </br>
		Start Time: <input type="text" name="starttime" id="starttime"> </br>
		End Time: <input type="text" name="endtime" id="endtie"> </br>
		Address: <input type="text" name="address" id="address"> </br>
		City: <input type="text" name="city" id="city"> </br>
		State: <input type="text" name="state" id="state"> </br>
		Description: <input type="text" name="description" id="description"> </br>
		Contact Name: <input type="text" name="cname" id="cname"> </br>
		Contact Phone: <input type="text" name="cphone" id="cphone"> </br>
		Contact Email:  <input type="text" name="cemail" id="cemail"> </br>
		<input type="submit" value="Add"/>
	</form>
	<a href="./homeadmin.php"><button type="button">Go back</button></a> 
</body>
</html>
	