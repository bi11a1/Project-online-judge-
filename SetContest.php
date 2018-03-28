<?php 
	include("header.php");
	include("options.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Set Contest</title>
</head>
<body>
	<?php
		$CName = $CTime = $CDate = $CPNumber = $CDuration = $CAuthor = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			include("connection.php");
			session_start();
			$sql = "INSERT INTO Contest(CName, CTime, CDuration, CPNumber, CAuthor) 
				      	VALUES ('".$_POST["CName"]."','".$_POST["CTime"]."','".$_POST["CDuration"]."','".$_POST["CPNumber"]."','".$_POST["CAuthor"]."')";
			if($conn->query($sql)){
				$CId=$conn->insert_id;
				$_SESSION['CPNumber'] = $_POST['CPNumber'];
				$_SESSION['serial'] = 'A';
				$_SESSION['cid'] = $CId;
				header("location:PUFContest.php");
			}
		}
	?>
	<div style="background-color: white; height: 550px; width: 100%">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<table>
			<caption><h1>Enter contest info: </h1></caption>
		  	<tr>
		  		<td style="padding: 15px">Contest Name: </td>
		  		<td style="padding: 15px">
		  			<input type="text" name="CName" maxlength="100" style="width: 300px; height: 25px;" required value="<?php echo $CName; ?>">
		  		</td>
		  	</tr>
			<tr>
				<td style="padding: 15px">Contest Time: </td>
		  		<td style="padding: 15px">
		  			<input type="DateTime" name="CTime" style="width: 200px; height: 25px" required value="<?php echo $CTime; ?>">(yyyy-mm-dd H:m:s)
		  			<!--<input type="Date" name="CDate" style="height: 25px" min="2016-01-01" required max="2020-01-01" value="<?php echo $CDate; ?>">
		  			<input type="Time" name="CTime" style="height: 25px" value="<?php echo $CTime; ?>">-->
		  		</td>
		  	</tr>
			<tr>
				<td style="padding: 15px">Contest Duration: </td>
		  		<td style="padding: 15px">
		  			<input type="Number" style="width: 100px; height: 25px;" required  min="1" max="1500" name="CDuration" value="<?php echo $CDuration; ?>">(minutes)
		  		</td>
		  	</tr>
		  	<tr>
		  		<td style="padding: 15px">Total no of Problems: </td>
		  		<td style="padding: 15px">
		  			<input type="Number" name="CPNumber" min="1" max="15" required style="width: 100px; height: 25px;" value="<?php echo $CPNumber; ?>">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td style="padding: 15px">Author: </td>
		  		<td style="padding: 15px">
		  			<input type="text" name="CAuthor" maxlength="100" style="width: 300px; height: 25px;" required value="<?php echo $CAuthor; ?>">
		  		</td>
		  	</tr>
		  	<tr>
		  		<td style="padding: 15px"></td>
		  		<td style="padding: 15px">
		  			<input type="submit" name="submit">
		  		</td>
		  	</tr>
		</table>
	</form>
	</div>
	<?php 
		include("footer.php");
	?>
</body>
</html>