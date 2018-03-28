<!DOCTYPE html>
<html>
<head>
	<title>Description Page</title>
	<link rel="stylesheet" type="text/css" href="linkStyle.css">
	<style>
		table { 
    		border-collapse: collapse;
    		width: 100%;
		}

		th {
    		padding: 8px;
    		text-align: center;
    		border-bottom: 1px solid #ddd;
		}

		td{
			color: red;
    		padding: 8px;
    		text-align: center;
    		border-top: 1px solid #ddd;
    		border-bottom: 1px solid #ddd;
		}

		a:link.why {
			text-decoration: none;
		    color: #cc0044;
		}
		a:visited.why {
			text-decoration: none;
		    color: #cc0044;
		}
		a:hover.why {
			text-decoration: underline;
		    color: tomato;
		}
		a:active.why {
		    color: tomato;
		}

	</style>
</head>
<body>
<?php
include("connection.php");
include("header.php");
include("OptionVol.php");
?>
<div>
<table>
<tr style="background-color: white">
<td style="width: 5%">
  	<div style="background-color:white; float: left;"><p> </p></div>
</td>
<td>
<div style="background-color:white; text-align: left; color: black;">
<br>
<h1 style="text-align: center">
	<?php
	include("connection.php");
	$sql= "select problem_id from problems where problem_name='".$_GET['name']."'";
	$rslt1=mysqli_query($conn, $sql);
	if(mysqli_num_rows($rslt1))
	{
		if($conn->query($sql))
		{
			while($user=mysqli_fetch_assoc($rslt1))
			{
				echo $user['problem_id'];
			}
		}
	}
	echo " - ";
	echo $_GET['name'];
	$name=$_GET['name'];
	$_SESSION['name']=$_GET['name'];
	?>
</h1>
<table style="width: 40%" align="center">
	<tr>
		<td style="border-right: 1px solid #ddd;border-left: 1px solid #ddd;width: 20%"><a class="why" href="SubmissionPage.php"> Submit</a></td>
		<td style="border-right: 1px solid #ddd;border-left: 1px solid #ddd;width: 20%"><a class="why" href="statistics.php?name=$name"> Statistics</a></td>
	</tr>
</table>
<table style="width: 40%" align="center">
	<tr>
		<td style="border-right: 1px solid #ddd;border-left: 1px solid #ddd; width: 20%">
			Time Limit:
			<?php
			include("connection.php");
			$sql= "select time_limit from problems where problem_name='".$_GET['name']."'";
			$rslt1=mysqli_query($conn, $sql);
			if(mysqli_num_rows($rslt1))
			{
				if($conn->query($sql))
				{
					while($user=mysqli_fetch_assoc($rslt1))
					{
						echo $user['time_limit'];
					}
				}
			}
		?>
		</td>
		<td style="border-right: 1px solid #ddd;border-left: 1px solid #ddd;width: 20%">
			Memory Limit:
			<?php
			include("connection.php");
			$sql= "select memory_limit from problems where problem_name='".$_GET['name']."'";
			$rslt1=mysqli_query($conn, $sql);
			if(mysqli_num_rows($rslt1))
			{
				if($conn->query($sql))
				{
					while($user=mysqli_fetch_assoc($rslt1))
					{
						echo $user['memory_limit'];
					}
				}
			}
		?>
		</td>
	</tr>	
</table>
<br><br>
<?php
include("connection.php");
$sql= "select description from problems where problem_name='".$_GET['name']."'";
$rslt1=mysqli_query($conn, $sql);
if(mysqli_num_rows($rslt1))
{
	if($conn->query($sql))
	{
		while($user=mysqli_fetch_assoc($rslt1))
		{
			$data=str_replace("\n", "<br/>", ($user['description']));
			echo $data;
		}
	}
}
?>
<br><br>
<?php
include("connection.php");
$sql= "select sample_input from problems where problem_name='".$_GET['name']."'";
$rslt1=mysqli_query($conn, $sql);
if(mysqli_num_rows($rslt1))
{
	if($conn->query($sql))
	{
		while($user=mysqli_fetch_assoc($rslt1))
		{
			echo "Sample Input:";
			echo "<br/>";
			$data=str_replace("\n", "<br/>", ($user['sample_input']));
			echo $data;
		}
	}
}
?>
<br><br>
<?php
include("connection.php");
$sql= "select sample_output from problems where problem_name='".$_GET['name']."'";
$rslt1=mysqli_query($conn, $sql);
if(mysqli_num_rows($rslt1))
{
	if($conn->query($sql))
	{
		while($user=mysqli_fetch_assoc($rslt1))
		{
			echo "Sample Output:";
			echo "<br/>";
			$data=str_replace("\n", "<br/>", ($user['sample_output']));
			echo $data;
		}
	}
}
?>
<br><br>
<hr>
<?php
include("connection.php");
$sql= "select problem_setter from problems where problem_name='".$_GET['name']."'";
$rslt1=mysqli_query($conn, $sql);
if(mysqli_num_rows($rslt1))
{
	if($conn->query($sql))
	{
		while($user=mysqli_fetch_assoc($rslt1))
		{
			echo "Problem Set By: ";
			$data=str_replace("\n", "<br/>", ($user['problem_setter']));
			echo $data;
			echo "<br><br>";
		}
	}
}
?>
</div>
</td>
	<td style="width: 5%">
  	<div style="background-color:white; float: right;"></div>
	</td>
</tr>
</div>
</table>
<?php include("footer.php") ?>
</body>
</html>