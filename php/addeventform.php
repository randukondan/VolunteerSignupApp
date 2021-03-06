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
	<link rel="stylesheet" type="text/css" href="../css/login.css" />
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<meta charset="utf-8">
</head>

<body>
	<header class="headA">
		Add
	</header>
	<div class="login-page">
	<div class="form">
		<h1>Add Event</h1>
		<p>Fill all the fields to add event.</p>
		<form method="post" action="./addeventscript.php" enctype="multipart/form-data">	
			Title of the event: <input type="text" name="title" id="title"> </br></br>
			Start time: <input type="text" name="starttime" id="starttime"></br><i>YYYY-MM-DD HH:MM:SS format</i></br></br>
			End time: <input type="text" name="endtime" id="endtie"></br><i>YYYY-MM-DD HH:MM:SS format</i></br></br>
			Street address: <input type="text" name="address" id="address"> </br></br>
			City: <input type="text" name="city" id="city"> </br></br>
			State: <select id="state" name="state">
					<option>--- select a value ---</option>
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="DC">District Of Columbia</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
			</select> </br></br>
			Description: <input type="text" name="description" id="description"> </br></br>
			Capacity: <input type="text" name="capacity" id="capacity"> </br></br>
			Contact Name: <input type="text" name="cname" id="cname"> </br></br>
			Contact Phone: <input type="text" name="cphone" id="cphone"> </br></br>
			Contact Email:  <input type="text" name="cemail" id="cemail"> </br></br>
			Select image to upload:	<input type="file" name="fileToUpload" id="fileToUpload"></br></br>
			<button type="submit" value="Add"/>Add</button>
		</form>
		</br><a href="./homeadmin.php"><button type="button">Go back</button></a> 
	</div>
	</div>
	<footer class="footD">
		CS6314.002 - Web Languages
		<a href="http://validator.w3.org/check/referer">
		<img src="http://www.w3.org/Icons/valid-xhtml11" alt="Validate" />
		</a> 
	</footer>
</body>
</html>