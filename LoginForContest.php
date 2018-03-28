<?php
	include("header.php");
	include("Options.php");
	$CId = $_GET['CId'];
	$teamName = "";
	$Err = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		include("connection.php");

		$teamName = $_POST['teamName'];
		$sql= "SELECT Team_Name FROM team WHERE Team_Name='".$_POST['teamName']."' and Team_Password ='".$_POST['password']."' and Cntst_Id = '".$CId."' ";
		$rslt=$conn->query($sql);
		if($rslt->num_rows){
			$_SESSION['teamName'] = $teamName;
			$_SESSION['contest'] = $CId;
			header("location: RunningContest.php?CId=".$CId);
		}
		else{
			$Err="*Invalid username or password!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login for contest</title>
	<style>
	input[type=text],input[type=password], select {
		width: 50%;
	    padding: 12px 20px;
	    margin: 8px 0;
	    font-size: 100%;
	    display: inline-block;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    box-sizing: border-box;
	}

	input[type=submit] {
	    width: 63%;
	    background-color: #4CAF50;
	    color: white;
	    padding: 14px 20px;
	    margin: 8px 0;
	    border: none;
	    border-radius: 4px;
	    cursor: pointer;
	}

	input[type=submit]:hover {
	    background-color: #45a049;
	}

	div.sufc {
		width: 50%;
	    border-radius: 5px;
	    background-color: #f2f2f2;
	    padding: 30px;
	}
	</style>
</head>
<body style="background-color: grey;">
	<div style="background-color: lightslategrey; width: 100%; padding-top: 150px; padding-bottom: 150px">
		<center>
		<div class="sufc">
			<?php

				$sql = "SELECT CName FROM contest WHERE CId = '".$CId."' ";
				$result=$conn->query($sql);
				while($row = $result->fetch_assoc()) {
					$CName = $row['CName'];
					echo "<h1>Contest #".($CId-100000).": ".$CName."</h1>";
				}
				
				$sql = "SELECT * FROM contest WHERE CId='".$_GET['CId']."'";
				$result=$conn->query($sql);
				$row = $result->fetch_assoc();
				date_default_timezone_set("Asia/Dhaka");
				$curdatetime = date("Y-m-d H:i:s");
				$status = "";
				$diff = 0;
				if($curdatetime>$row['CTime']){
					$diff = abs(strtotime($curdatetime) - strtotime($row['CTime']));
				}
				else{
					$diff = abs(strtotime($row['CTime']) - strtotime($curdatetime));
				}
				if(floor($diff/(60*60*24*365))>0){
				    $tmp = floor($diff/(60*60*24*365));
					$tmp>1?$status = " years ":$status = " year ";
				}
				else if(floor($diff/(60*60*24*30))>0){
					$tmp = floor($diff/(60*60*24*30));
					$tmp>1?$status = " months ":$status = " month ";
				}
				else if(floor($diff/(60*60*24))>0){
					$tmp = floor($diff/(60*60*24));
					$tmp>1?$status = " days ":$status = " day ";
				}
				else if(floor($diff/(60*60))>0){
					$tmp = floor($diff/(60*60));
					$tmp>1?$status = " hours ":$status = " hour ";
				}
				else{
					$tmp = floor($diff/60);
					$tmp>1?$status = " minutes ":$status = " minute ";
				}
				if(($curdatetime>$row['CTime']) && ($diff/60)<$row['CDuration']){
					echo"<td style='text-align:center'><h3 style='font-size:110%;color: DarkRed'>Running for ".$tmp.$status.".</h3></td>";
				}
				else if($curdatetime>$row['CTime']){
					echo"<td style='text-align:center'>Ended ".$tmp.$status."ago.</td>";
				}
				else{
					echo"<td style='text-align:center'>Starts in ".$tmp.$status.".</td>";
				}
				
				//echo "<h3> Starts in: </h3>";
			?>
			<?php if($curdatetime>$row['CTime']){ ?>
			<span style="color: red"><?php echo $Err; ?></span>
		 	<form method="post" action="LoginForContest.php?CId=<?php echo $CId ?>">
			   	Team Name: <input type="text" id="teamName" name="teamName" maxlength="50" name="firstname" value="<?php echo $teamName; ?>">
			   	<br>
			    Password:&nbsp&nbsp&nbsp&nbsp <input type="Password" id="password" name="password" maxlength="50" name="lastname">
			    <br>
			    <input type="submit" style="font-size: 120%" value="Login">
		  	</form>
		  	<?php ; }?>
		  	<p >
			<?php 
				if($curdatetime<$row['CTime']){
			  		echo "Not yet registered? ";
			  		echo "<a href='RegisterForContest.php?";
			  		$tmp=$CId;
			  		echo "CId=$tmp'>Register</a>";
			  		echo " here.";
			  	}
		  	?>
		  	</p>
		</div>
		</center>
	</div>

	<?php
		include("footer.php");
	?>
</body>
</html>