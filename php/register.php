<?php
	$fname = $lname = $address = $city = $state = $phone = $email = $password = "";
	$fnameerr = $lnameerr = $aderr = $cityerr = $stateerr = $phoneerr = $emailerr = $passerr = "";
	//echo '<script>console.log("made it to php")</script>';

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{		
		//first name
		if(empty($_POST["fname"]))
		{
			$fnameerr = "error";
			header('Location: ../html/register.html');   
		}
		else
		{
			$fname = $_POST["fname"];
			setcookie('fname', $fname);
		}

		//last name
		if(empty($_POST["lname"]))
		{
			$lnameerr = "error";
			header('Location: ../html/register.html');   
		}
		else
		{
			$lname = $_POST["lname"];
			setcookie('lname', $lname);
		}

		//address
		if(empty($_POST["address"]))
		{
			$aderr = "error";
			header('Location: ../html/register.html');   
		}
		else
		{
			$address = $_POST["address"];
			setcookie('address', $address);
		}

		//city
		if(empty($_POST["city"]))
		{
			$cityerr = "error";
			header('Location: ../html/register.html');   
		}
		else
		{
			$city = $_POST["city"];
			setcookie('city', $city);
		}

		//state
		if(empty($_POST["state"]))
		{
			$stateerr = "error";
			header('Location: ../html/register.html');   
		}
		else
		{
			$state = $_POST["state"];
			setcookie('state', $state);
		}

		//phone
		if(empty($_POST["phone"]))
		{
			$phoneerr = "error";
			header('Location: ../html/register.html');   
		}
		else
		{
			$phone = $_POST["phone"];
			setcookie('phone', $phone);
		}

		//email
		if(empty($_POST["email"]))
		{
			$emailerr = "error";
			header('Location: ../html/register.html');   
		}
		else
		{
			$email = $_POST["email"];
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
				setcookie('email', $email);
			}
			else 
			{
				$emailerr = "error";
				header('Location: ../html/register.html'); 
			}
		}
		
		//password
		if(empty($_POST["password"]))
		{
			$passerr = "error";
			header('Location: ../html/register.html');   
		}
		else
		{
			$password = $_POST["password"];
			if (strlen($password) < 6) 
			{
				header('Location: ../html/register.html'); 
			}
		}
		
		if ($fnameerr=="" && $lnameerr=="" && $aderr=="" && $cityerr=="" && $stateerr=="" && $phoneerr=="" && $emailerr=="" && $passerr=="")
		{
			header('Location: ../html/successregister.html');
		}
	}
?>		