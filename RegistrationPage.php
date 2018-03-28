<!DOCTYPE HTML> 
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="linkStyle.css">
    <style>
  	p
  	{
  		color: red;
  	}
    .error {color: #FF0000;}
    td
    {
    	padding: 6px;
    }
  	</style>
</head>
<body style="background-color: black;">

    <?php include("header.php") ?>

  	<div style="height: 465px">
  		<div style="height: 465px; width: 40%; background-color:LightSlateGray; float: left;"></div>

		<?php
		// define variables and set to empty values
		$user_nameErr = $emailErr = $user_passwordErr = $password_matchErr = "";
		$user_name = $email = $user_password = $password_match = "";

		$cnt=0;
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		   	if (empty($_POST["user_name"])) 
		   	{
		        $user_nameErr = "Name is required";
		    } else 
		    {
		    	$user_name = test_input($_POST["user_name"]);
		     	// check if name only contains letters and whitespace
		     	if (!preg_match("/^[a-zA-Z0-9]*$/",$user_name)) 
		     	{
		       		$user_nameErr = "Only letters and numbers are allowed"; 
		     	} 
		     	else 
		     	{ 
		     		$cnt++; 
		     	}
		   	}
		   
		   	if (empty($_POST["email"])) 
		   	{
		     	$emailErr = "Email is required";
		   	} 
		   	else 
		   	{
		     	$email = test_input($_POST["email"]);
		     	// check if e-mail address is well-formed
		    	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		    	{
		       		$emailErr = "Invalid email format"; 
		     	} 
		     	else 
		   		{ 
		   			$cnt++; 
	    		}
		   	}

		   	if(empty($_POST["user_password"]))
		   	{
		   		$user_passwordErr = "Password is required";
		   	} 
		   	else 
		   	{
		   		$user_password = test_input($_POST["user_password"]);
		   		if(strlen($user_password)<5)
		   		{
		   			$user_passwordErr = "Password length must be greater than five"; 
		   		} 
		   		else if (!preg_match("/^[a-zA-Z0-9]*$/",$user_password)) 
		   		{
		       		$user_passwordErr = "Only letters and numbers are allowed";
		     	} 
		     	else 
		     	{ 
		     		$cnt++; 
		     	}
		   	}

		   	if(empty($_POST["password_match"]))
		   	{
		   		$password_matchErr = "Confirm Password";
		   	} 
		   	else 
		   	{
		   		$password_match = test_input($_POST["password_match"]);
		   		if ($password_match!=$user_password) 
		   		{
		       		$password_matchErr = "Password not matched"; 
		    	} 
		    	else 
		    	{ 
		    		$cnt++; 
		    	}
			}

		   	if($cnt==4)
		   	{
			   	include("connection.php");

			    $sql="select user_name from user WHERE user_name='".$_POST['user_name']."'";
			    $rslt1=mysqli_query($conn, $sql);
			    if(mysqli_num_rows($rslt1)){ $user_nameErr="Username is in use."; }

			    $sql="select email from user where email='".$_POST['email']."'";
			    $rslt2=mysqli_query($conn, $sql);
			    if(mysqli_num_rows($rslt2)){$emailErr="Email is in use.";}

			    if(!mysqli_num_rows($rslt1) && !mysqli_num_rows($rslt2))
			    {
				    $sql = "CREATE TABLE User (
						user_name VARCHAR(50) NOT NULL PRIMARY KEY, 
						email VARCHAR(50) NOT NULL,
						user_password VARCHAR(50) NOT NULL,
						reg_date TIMESTAMP,
						institution_name VARCHAR(70),
						country_name VARCHAR(50),
						image VARCHAR(300)
					)";

					if ($conn->query($sql)) 
					{
					    //echo "Table User created successfully";
					} 
					else 
					{
					    //echo "Error creating table: " . $conn->error;
					}

				    if(!$conn->connect_error)
				    {
				      	$sql = "INSERT INTO User(user_name, email, user_password) 
				      	VALUES ('".$_POST["user_name"]."','".$_POST["email"]."','".$_POST["user_password"]."')";
				    }
				    if($conn->query($sql))
				    {
				      	//echo "Registration Successful...";
				      	//header('Refresh: 2; URL = LoginPage.php');
				      	header("location:loginpage.php");
				      	//echo "<script> window.location.assign('login.php'); </script>";
				    }
				}
			}   
		}

		function test_input($data) 
		{
		   	$data = trim($data);
		   	$data = stripslashes($data);
		   	$data = htmlspecialchars($data);
		   	return $data;
		}

		?>

		<div style="background-color: LightSlateGray; width: 100%; height: 465px;">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<table>
		  	<tr>
		  		<td colspan="2">
		  			<h1 style="font-size:200%;color:cyan"><b><i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Enter Info</i></b></h1>
		  		</td>
		  	</tr>
			<tr>
				<td style="color: LightCyan;"">
					User name:
				</td>
				<td>	
					<input maxlength="50" style="border: inset;" placeholder="Enter user name" type="text" name="user_name" value="<?php echo $user_name;?>">
					<span class="error"> <?php echo $user_nameErr;?></span>
				</td>
			</tr>
			<tr></tr>
		   	<tr>
				<td style="color: LightCyan;">
					E-mail:
				</td>
				<td>
					<input maxlength="50" style="border: inset;" placeholder="Enter email" type="text" name="email" value="<?php echo $email;?>">
		   			<span class="error"> <?php echo $emailErr;?></span>
				</td>
			</tr>
			<tr></tr>
		   	<tr>
				<td style="color: LightCyan;">
					Password:
				</td>
				<td>
					<input maxlength="50" style="border: inset;" placeholder="Password" type="Password" name="user_password" value="<?php ?>">
					<span class="error"> <?php echo $user_passwordErr;?></span>
				</td>
			</tr>
			<tr></tr>
		   	<tr>
				<td style="color: LightCyan;">
					Confirm Password:
				</td>
				<td>
					<input maxlength="50" style="border: inset;" placeholder="Confirm" type="password" name="password_match" value="<?php ?>">
					<span class="error"> <?php echo $password_matchErr;?></span>
				</td>
			</tr>
			<br><br>
			<tr>
				<td></td>
				<td>
					<input style="height: 25px;background-color: peachpuff;" type="submit" name="submit" value="Submit">
				</td>
			</tr>
			<tr>
				<td colspan="2";>
					<h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAlready have an account? <a href="LoginPage.php" style="color: plum;">Login </a>here.</h4>
				</td>
			</tr>
		</table>
		</form>
		</div>
	</div>
	<?php include("footer.php") ?>

</body>
</html>