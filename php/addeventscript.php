<?php
	session_start();
	//print_r($_SESSION);
	if($_SESSION["Admin"] == 0){
		header('Location: ./logout.php');
	}
	$title = $dateof = $starttime = $endtime = $address = $city = $state = $description = $cname = $cphone = $cemail = "";
	$terror = $dayerror = $starterror = $enderror = $addresserr = $cityerr = $stateerr = $descerr = $nameerr = $phoneerr = $emailerr "";

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

		//date
		if(empty($_POST["dateof"]))
		{
			$dayerror = "error";
			header('Location: ./addeventform.php');    
		}
		else
		{
			$dateof = $_POST["dateof"];
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
			$query = "INSERT INTO events VALUES (NULL,'$title','$dateof','$starttime','$endtime','$address','$city','$state','$description','$cname','$cphone','$cemail');";
			$result = mysqli_query($conn,$query);
			if ($result) 
			{
			    echo "Event added successfully";
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
<!DOCTYPE html>
<html>
<head>
	<title>Add Event - Volunteer Sign-Up</title>
	<meta charset="utf-8">
</head>

<body>
	<a href="./homeadmin.php"><button type="button">Go back</button></a> 
</body>
</html>	