<?php 
	include("header.php");
	include("options.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Problem for Contest</title>
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>
<?php
	include("connection.php");
	$CPNumber = 'A'; $CPName = "";
	for($i=1; $i<$_SESSION['CPNumber']; $i++) {$CPNumber++;}
	$Serial = $_SESSION['serial'];
	//echo "Serial: ", $Serial, " Total: ", $CPNumber, "<br>";
	$formatErr = "*Enter files in correct format";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$target_dir = "ContestProblem/";
		$CPName = $_POST['CPName'];
		if (is_uploaded_file($_FILES['fileToUpload1']['tmp_name'])) {
			if ($_FILES['fileToUpload1']['type'] != "application/pdf") {
				$formatErr = "*Please check the file format again for Description";
			}
			else if ($_FILES['fileToUpload2']['type'] != "text/plain") {
				$formatErr = "*Please check the file format again for input";
			}
			else if ($_FILES['fileToUpload3']['type'] != "text/plain") {
				$formatErr = "*Please check the file format again for output";
			}
		 	else{
			    $sql = "INSERT INTO CProblems (CId, PSerial, CPName) 
			    	VALUES ('".$_SESSION['cid']."','$Serial', '$CPName')";
				$last_id=$_SESSION['cid'];
				if ($conn->query($sql) === TRUE) {
				   	//echo "New record created successfully";
				   	$last_id.=$Serial;
				   	$last_id.='.pdf';
				   	//echo "Last id: ", $last_id, "<br>";
				   	$target_file = $target_dir . basename($last_id);
				 	if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
				        //echo "The file ". basename( $_FILES["fileToUpload1"]["name"]). " has been uploaded...";
				    } else {
				        //echo "Sorry, there was an error uploading your file.";
				    }

				    $last_id=$_SESSION['cid'];
				    $last_id.=$Serial;
				   	$last_id.='in.txt';
				   	//echo "2 Last id: ", $last_id, "<br>";
				   	$target_file = $target_dir . basename($last_id);
				 	if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
				        //echo "The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded...";
				    } else {
				        //echo "Sorry, there was an error uploading your file.";
				    }

				    $last_id=$_SESSION['cid'];
				    $last_id.=$Serial;
				   	$last_id.='out.txt';
				   	//echo "3 Last id: ", $last_id, "<br>";
				   	$target_file = $target_dir . basename($last_id);
				 	if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file)) {
				        //echo "The file ". basename( $_FILES["fileToUpload3"]["name"]). " has been uploaded...";
				    } else {
				        //echo "Sorry, there was an error uploading your file.";
				    }
		 		}
		 		else{
		 			echo $conn->error, "<br>";
		 		}
		 		if($Serial>=$CPNumber){
		 			header("location:ContestHome.php");
		 		}
		 		else {
		 			$Serial++;
		 			$CPName="";
		 			$_SESSION['serial'] = $Serial;
		 			//echo $Serial, " ", $CPNumber;
		 		}
			}
		}
		else{
			$formatErr = "*Please choose the file.";
		}
	}
?>
<div style="background-color: white; width: 100%; height: 500px;">
	<form action="PUFContest.php" method="post" enctype="multipart/form-data">
	<table>
		<caption>
			<h1> Upload Problem <?php echo $Serial; ?> :</h1>
		</caption>
		<tr>
			<td style="padding: 10px;">Problme Name: </td>
			<td style="padding: 10px;"><input type="text" name="CPName" style="width: 300px; height: 25px;" maxlength="100" required value="<?php echo $CPName; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td style="padding: 10px">
				<span class="error"> <?php echo $formatErr; ?></span>
			</td>
		</tr>
		<tr>
			<td style="padding: 10px">Description: </td>
			<td style="padding: 10px"><input type="file" name="fileToUpload1" id="fileToUpload1" required>.pdf format</td>
		</tr>
		<tr>
			<td style="padding: 10px">Input: </td>
			<td style="padding: 10px"><input type="file" name="fileToUpload2" id="fileToUpload2" required>.txt format</td>
		</tr>
		<tr>
			<td style="padding: 10px">Output: </td>
			<td style="padding: 10px"><input type="file" name="fileToUpload3" id="fileToUpload3" required>.txt format</td>
		</tr>
		<tr>
			<td></td>
			<td style="padding: 10px"><input type="submit" value="Add Problem" name="submit"></td>
		</tr>
	</table>
	</form>
</div>
<?php 
	include("footer.php");
?>
</body>
</html>