<?php
	session_start();
	//print_r($_SESSION);
	if($_SESSION["Admin"] == 0){
		header('Location: ./logout.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Event - Volunteer Sign-Up</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css" />
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
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
					$title = $dateof = $starttime = $endtime = $address = $city = $state = $description = $cname = $cphone = $cemail = "";
					$terror = $dayerror = $starterror = $enderror = $addresserr = $cityerr = $stateerr = $descerr = $capacity = $nameerr = $phoneerr = $emailerr = "";
					if($_SERVER["REQUEST_METHOD"] == "POST")
					{		
						//title
						if(empty($_POST["title"]))
						{
							$terror = "error";
							header('Location: ./addeventform.php');   
						}
						else
						{
							$title = $_POST["title"];
						}
						//start
						if(empty($_POST["starttime"]))
						{
							$starterror = "error";
							header('Location: ./addeventform.php');    
						}
						else
						{
							$starttime = $_POST["starttime"];
						}
						//end
						if(empty($_POST["endtime"]))
						{
							$enderror = "error";
							header('Location: ./addeventform.php');   
						}
						else
						{
							$endtime = $_POST["endtime"];
						}
						//address
						if(empty($_POST["address"]))
						{
							$addresserr = "error";
							header('Location: ./addeventform.php');    
						}
						else
						{
							$address = $_POST["address"];
						}
						//city
						if(empty($_POST["city"]))
						{
							$cityerr = "error";
							header('Location: ./addeventform.php');    
						}
						else
						{
							$city = $_POST["city"];
						}
						//state
						if(empty($_POST["state"]))
						{
							$stateerr = "error";
							header('Location: ./addeventform.php');    
						}
						else
						{
							$state = $_POST["state"];
						}
						//description
						if(empty($_POST["description"]))
						{
							$descerr = "error";
							header('Location: ./addeventform.php');    
						}
						else
						{
							$description = $_POST["description"];
						}
						//capacity
						if(empty($_POST["capacity"]))
						{
							$descerr = "error";
							header('Location: ./addeventform.php');    
						}
						else
						{
							$capacity = $_POST["capacity"];
						}
						//name
						if(empty($_POST["cname"]))
						{
							$nameerr = "error";
							header('Location: ./addeventform.php');    
						}
						else
						{
							$cname = $_POST["cname"];
						}
						//phone
						if(empty($_POST["cphone"]))
						{
							$phoneerr = "error";
							header('Location: ./addeventform.php');    
						}
						else
						{
							$cphone = $_POST["cphone"];
						}
						//email
						if(empty($_POST["cemail"]))
						{
							$emailerr = "error";
							header('Location: ./addeventform.php');   
						}
						else
						{
							$cemail = $_POST["cemail"];
							if (filter_var($cemail, FILTER_VALIDATE_EMAIL)) 
							{
								//not entering a full text with @something.com will return false and not register
								setcookie('cemail', $cemail);
							}
							else 
							{
								$emailerr = "error";
								header('Location: ./addeventform.php'); 
							}
						}
								
						if ($terror=="" && $dayerror=="" && $starterror=="" && $enderror=="" && $addresserr=="" && $cityerr=="" && $stateerr=="" && $descerr=="" && $nameerr=="" && $phoneerr=="" && $emailerr=="")
							{
								$conn = mysqli_connect("127.0.0.1", "root", "", "mysql");
								if (!$conn) 
								{
									die("Connection failed: " . mysqli_connect_error());
								} 
								$target_dir = "../images/";
								$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
								$filenamedb = basename($_FILES["fileToUpload"]["name"]);
								
								$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
								// Check if image file is a actual image or fake image
								if(isset($_POST["submit"])) {
								    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
								}
								move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
								$query = "INSERT INTO events VALUES (NULL,'$title','$starttime','$endtime','$address','$city','$state','$description', '$capacity','$cname','$cphone','$cemail', '$filenamedb');";
								$result = mysqli_query($conn,$query);
								if ($result) 
								{
								    echo "Event added successfully.</br></br>";
								    //header('Location: ../php/homeadmin.php');
								} 
								else 
								{
								    echo "Error adding record";
								}
								mysqli_close($conn);
							}
						}
					?>	
				<a href="./addeventform.php"><button type="button">Go back</button></a>&nbsp &nbsp &nbsp
				<a href="./homeadmin.php"><button type="button">Go home</button></a> 
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