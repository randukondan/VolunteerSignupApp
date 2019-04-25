<?php
	session_start();
	if($_SESSION["Admin"] == 0){
		header('Location: ../php/logout.php');
	}

	if(!empty($_POST["delete"])){
		$_SESSION["eventid"] = $_POST["eventid"];
		header('Location: ./deletescript.php');
	}

	if(!empty($_POST["edit"])){
		$_SESSION["eventid"] = $_POST["eventid"];
		header('Location: ./editeventform.php');
	}
?>