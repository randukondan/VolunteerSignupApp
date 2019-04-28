<?php
	session_start();
	if($_SESSION["Admin"] == 0)
	{
		header('Location: ./logout.php');
	}
	$eventid = $_SESSION["eventid"];
	//echo "$eventid";
	$conn = mysqli_connect("127.0.0.1", "root", "", "volunteer");
	if (!$conn) {die("Connection failed: " . mysqli_connect_error());} 
	$query = "SELECT * FROM events WHERE event_id = '$eventid';";
	$result = mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	$title = $row["title"];
	$dateof = $row["date_of"]; 
	$starttime = $row["start_time"];
	$endtime = $row["end_time"]; 
	$address = $row["address"];
	$city =$row["city"]; 
	$state = $row["state"];
	$description = $row["description"];
	$capacity = $row["capacity"];
	$cname = $row["c_name"];
	$cphone = $row["c_phone"];
	$cemail = $row["c_email"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Event - Volunteer Sign-Up</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css" />
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<meta charset="utf-8">
</head>

<body>
	<header class="headA">
		Edit
	</header>
	<div class="login-page">
	<div class="form">
		<h1>Edit Event</h1>
		<p>Edit the fields and click save changes.</p>
		<form method="post" action="./editscript.php" enctype="multipart/form-data">	
			Title of the event: <input type="text" name="title" id="title" value = <?php echo"\"$title\""; ?> > </br></br>
			Start time: <input type="text" name="starttime" id="starttime" value = <?php echo"\"$starttime\""; ?>></br><i>YYYY-MM-DD HH:MM:SS format</i></br></br>
			End time: <input type="text" name="endtime" id="endtie" value = <?php echo"\"$endtime\""; ?>></br><i>YYYY-MM-DD HH:MM:SS format</i></br></br>
			Street address: <input type="text" name="address" id="address" value = <?php echo"\"$address\""; ?>> </br></br>
			City: <input type="text" name="city" id="city" value = <?php echo"\"$city\""; ?>> </br></br>
			State: <select id="state" name="state">
					<option>--- select a value ---</option>
					<option value="AL" <?php if ($state == "AL") echo "selected=\"selected\""; ?> >Alabama</option>
					<option value="AK" <?php if ($state == "AK") echo "selected=\"selected\""; ?> >Alaska</option>
					<option value="AZ" <?php if ($state == "AZ") echo "selected=\"selected\""; ?> >Arizona</option>
					<option value="AR" <?php if ($state == "AR") echo "selected=\"selected\""; ?> >Arkansas</option>
					<option value="CA" <?php if ($state == "CA") echo "selected=\"selected\""; ?> >California</option>
					<option value="CO" <?php if ($state == "CO") echo "selected=\"selected\""; ?> >Colorado</option>
					<option value="CT" <?php if ($state == "CT") echo "selected=\"selected\""; ?> >Connecticut</option>
					<option value="DE" <?php if ($state == "DE") echo "selected=\"selected\""; ?> >Delaware</option>
					<option value="DC" <?php if ($state == "DC") echo "selected=\"selected\""; ?> >District Of Columbia</option>
					<option value="FL" <?php if ($state == "FL") echo "selected=\"selected\""; ?> >Florida</option>
					<option value="GA" <?php if ($state == "GA") echo "selected=\"selected\""; ?> >Georgia</option>
					<option value="HI" <?php if ($state == "HI") echo "selected=\"selected\""; ?> >Hawaii</option>
					<option value="ID" <?php if ($state == "ID") echo "selected=\"selected\""; ?> >Idaho</option>
					<option value="IL" <?php if ($state == "IL") echo "selected=\"selected\""; ?> >Illinois</option>
					<option value="IN" <?php if ($state == "IN") echo "selected=\"selected\""; ?> >Indiana</option>
					<option value="IA" <?php if ($state == "IA") echo "selected=\"selected\""; ?> >Iowa</option>
					<option value="KS" <?php if ($state == "KS") echo "selected=\"selected\""; ?> >Kansas</option>
					<option value="KY" <?php if ($state == "KY") echo "selected=\"selected\""; ?> >Kentucky</option>
					<option value="LA" <?php if ($state == "LA") echo "selected=\"selected\""; ?> >Louisiana</option>
					<option value="ME" <?php if ($state == "ME") echo "selected=\"selected\""; ?> >Maine</option>
					<option value="MD" <?php if ($state == "MD") echo "selected=\"selected\""; ?> >Maryland</option>
					<option value="MA" <?php if ($state == "MA") echo "selected=\"selected\""; ?> >Massachusetts</option>
					<option value="MI" <?php if ($state == "MI") echo "selected=\"selected\""; ?> >Michigan</option>
					<option value="MN" <?php if ($state == "MN") echo "selected=\"selected\""; ?> >Minnesota</option>
					<option value="MS" <?php if ($state == "MS") echo "selected=\"selected\""; ?> >Mississippi</option>
					<option value="MO" <?php if ($state == "MO") echo "selected=\"selected\""; ?> >Missouri</option>
					<option value="MT" <?php if ($state == "MT") echo "selected=\"selected\""; ?> >Montana</option>
					<option value="NE" <?php if ($state == "NE") echo "selected=\"selected\""; ?> >Nebraska</option>
					<option value="NV" <?php if ($state == "NV") echo "selected=\"selected\""; ?> >Nevada</option>
					<option value="NH" <?php if ($state == "NH") echo "selected=\"selected\""; ?> >New Hampshire</option>
					<option value="NJ" <?php if ($state == "NJ") echo "selected=\"selected\""; ?> >New Jersey</option>
					<option value="NM" <?php if ($state == "NM") echo "selected=\"selected\""; ?> >New Mexico</option>
					<option value="NY" <?php if ($state == "NY") echo "selected=\"selected\""; ?> >New York</option>
					<option value="NC" <?php if ($state == "NC") echo "selected=\"selected\""; ?> >North Carolina</option>
					<option value="ND" <?php if ($state == "ND") echo "selected=\"selected\""; ?> >North Dakota</option>
					<option value="OH" <?php if ($state == "OH") echo "selected=\"selected\""; ?> >Ohio</option>
					<option value="OK" <?php if ($state == "OK") echo "selected=\"selected\""; ?> >Oklahoma</option>
					<option value="OR" <?php if ($state == "OR") echo "selected=\"selected\""; ?> >Oregon</option>
					<option value="PA" <?php if ($state == "PA") echo "selected=\"selected\""; ?> >Pennsylvania</option>
					<option value="RI" <?php if ($state == "RI") echo "selected=\"selected\""; ?> >Rhode Island</option>
					<option value="SC" <?php if ($state == "SC") echo "selected=\"selected\""; ?> >South Carolina</option>
					<option value="SD" <?php if ($state == "SD") echo "selected=\"selected\""; ?> >South Dakota</option>
					<option value="TN" <?php if ($state == "TN") echo "selected=\"selected\""; ?> >Tennessee</option>
					<option value="TX" <?php if ($state == "TX") echo "selected=\"selected\""; ?> >Texas</option>
					<option value="UT" <?php if ($state == "UT") echo "selected=\"selected\""; ?> >Utah</option>
					<option value="VT" <?php if ($state == "VT") echo "selected=\"selected\""; ?> >Vermont</option>
					<option value="VA" <?php if ($state == "VA") echo "selected=\"selected\""; ?> >Virginia</option>
					<option value="WA" <?php if ($state == "WA") echo "selected=\"selected\""; ?> >Washington</option>
					<option value="WV" <?php if ($state == "WV") echo "selected=\"selected\""; ?> >West Virginia</option>
					<option value="WI" <?php if ($state == "WI") echo "selected=\"selected\""; ?> >Wisconsin</option>
					<option value="WY" <?php if ($state == "WY") echo "selected=\"selected\""; ?> >Wyoming</option>
			</select> </br></br>
			Description: <input type="text" name="description" id="description" value = <?php echo"\"$description\""; ?>> </br></br>
			Capacity: <input type="text" name="capacity" id="capacity" value = <?php echo"\"$capacity\""; ?>> </br></br>
			Contact Name: <input type="text" name="cname" id="cname" value = <?php echo"\"$cname\""; ?>> </br></br>
			Contact Phone: <input type="text" name="cphone" id="cphone" value = <?php echo"\"$cphone\""; ?>> </br></br>
			Contact Email:  <input type="text" name="cemail" id="cemail" value = <?php echo"\"$cemail\""; ?>> </br></br>
			Select image to upload:	<input type="file" name="fileToUpload" id="fileToUpload"></br></br>
			<button type="submit" value="Save changes"/>Save</button>
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