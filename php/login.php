<!-- doesn't do anything yet -->
<?php
	$email = $name = $password = "";
	$emailerr = $nameerr = $passerr = "";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(empty($_POST["email"]))
		{
			$emailerr = "error";
			header('Location: login.html');   
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
				header('Location: login.html'); 
			}
		}
		
		if(empty($_POST["name"]))
		{
			$nameerr = "error";
			header('Location: login.html');   
		}
		else
		{
			$name = $_POST["name"];
			setcookie('name', $name);
		}
		
		if(empty($_POST["password"]))
		{
			$passerr = "error";
			header('Location: login.html');   
		}
		else
		{
			$password = $_POST["password"];
			if (strlen($password) < 6) 
			{
				header('Location: login.html'); 
			}
		}
		
		if ($emailerr == "" && $nameerr == "" && $passerr == "")
		{
			header('Location: welcome.php');
		}
	}
?>		