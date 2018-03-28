<?php
	ob_start();
	session_start();
	if(isset($_SESSION['teamName']) && $_SESSION['teamName']!=""){
		$_SESSION['teamName']="";
		header("Location: HomePage.php");
	}
	else if($_SESSION['user_name']!=""){
		session_destroy(); session_unset();
		header("Location: loginPage.php");
	}
?>