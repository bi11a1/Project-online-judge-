<!DOCTYPE html>

<?php
	include("connection.php");
	session_start();
	if(isset($_SESSION['user_name']))
	{
        header("location: HomePage.php");
   	}
?>

<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="linkStyle.css">
</head>
<body style="background-color: black;">
	<?php 
	$loginErr = "Please Login First";

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		include("connection.php");
		$sql= "select user_name from user where user_name='".$_POST['user_name']."' and user_password='".$_POST['user_password']."'";
		$rslt1=mysqli_query($conn, $sql);
		if(mysqli_num_rows($rslt1))
		{
			if($conn->query($sql))
			{
				//session_register("user_name");
				$_SESSION['user_name'] = $_POST['user_name'];
				header("location: HomePage.php");
				//$username=""; $password="";
				//header('Refresh: 0; URL = loginpage.php');
			}
		}
		else
		{
			$loginErr="Invalid username or password!";
		}
	}
	?>
	<?php include("header.php") ?>

	<div style="background-color: lightslategray; width:100%; height: 465px;"">
		<br>
		<p style="text-align:center;font-size:170%;color:cyan"><b><i>Member Login</i></b></p>
		<p style="text-align: center;font-size:80%;color:LightPink;"><span class="error"> <?php echo $loginErr;?></span></p>
		<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<table style="width: 50% height:30%" align="center" style="border-color: LightCyan" style="text-align:center;">
			<tr>
				<td style="color: LightCyan;;">
					User Name:
				</td>
				<td>
					<input type="text" name="user_name" align="center" style="background-color: darkgray; border: inset;">
				</td>
			</tr>
			<tr>
				<td style="color: LightCyan">
					Password:
				</td>
				<td>
					<input type="password" name="user_password" align="center" style="background-color: darkgray; border: inset;">
				</td>
			</tr>
		</table>
		<br>
		<table style="20%" align="center" >
			<tr>
				<td>
					<input type="checkbox"> Remember Me
				</td>
			</tr>
		</table>
		<br>
		<table style="10%" align="center">
			<tr>
				<td>
					<input type="submit" name="Submit" value="Login" style="height:25px;background-color: peachpuff;">
				</td>
			</tr>
		</table>
		</form>

		<h4 align="center">
			New User?<a href="RegistrationPage.php" style="color: plum "> Register</a> here.
		</h4>
	</div>
	<?php include("footer.php") ?>
</body>
</html>