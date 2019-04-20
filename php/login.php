<?php
	session_start();
	$email = $password = "";
	$emailerr = $passerr = "";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(empty($_POST["email"]))
		{
			$emailerr = "error";
			header('Location: ../html/login.html');   
		}
		else
		{
			$email = $_POST["email"];
		}
		
		if(empty($_POST["password"]))
		{
			$passerr = "error";
			header('Location: ../html/login.html');   
		}
		else
		{
			$password = $_POST["password"];
		}
		
		if ($emailerr == "" && $passerr == "")
		{
			$conn = mysqli_connect("127.0.0.1", "root", "", "mysql");
			if (!$conn) {die("Connection failed: " . mysqli_connect_error());} 
			$query = "SELECT email, password, is_admin FROM users WHERE email = '$email';";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_array($result);
			if($row) 
			{
				$e = $row["email"];
				$p = $row["password"];
				$a = $row["is_admin"];
				if(password_verify($password, $p))
				{
					$_SESSION['User'] = $e;
					$_SESSION["Admin"] = $a;
				}
				if ($a == "0")
				{	
					header('Location: ../html/homeuser.html');
				}
				else if ($a == "1")
				{
					header('Location: ../php/homeadmin.php');
				}
			}
			else
			{
				header('Location: ../html/login.html');
			}
			
		}
	}
?>	
