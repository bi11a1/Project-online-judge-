<?php 
   	date_default_timezone_set("Asia/Dhaka");
	$time = date("Y-m-d H:i:s");
?>
<?php
	$penalty = 20;
	$CPName = "";
	$tmp=$_GET['CPid'];
	$length=strlen($tmp);
	$ContestId=substr($tmp, 0, $length-1);
	$ProblemSerial=substr($tmp, $length-1, 1);
	include("connection.php");
	if($conn->connect_error){ echo "WHY MAN! ";}
	$sql = "SELECT CPName FROM cproblems where CId='".$ContestId."' AND PSerial='".$ProblemSerial."'";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		$CPName = $row['CPName'];
	}
	$sql = "SELECT CName FROM contest where CId='".$ContestId."' ";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		$CName = $row['CName'];
	}
	$_GET['CId']=$ContestId;


	include("header.php");
	include("optionsforcontest.php");


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$sql = "SELECT * FROM contest WHERE CId='".$_GET['CId']."'";
		$result=$conn->query($sql);
		$row = $result->fetch_assoc();
		date_default_timezone_set("Asia/Dhaka");
		$curdatetime = date("Y-m-d H:i:s");

		$verdict = "";
		$language=$_POST['language'];
		$diff = 0;
		$diff = abs(strtotime($curdatetime) - strtotime($row['CTime']));		
		if(($diff/60)>$row['CDuration']){
			echo "<script>alert('Contest ended!');</script>";
		}
		else if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
			//if ($_FILES['fileToUpload']['type'] != "text/plain") {
			//	$formatErr = "*Please check the file format again for input";
			//}
			//else{
				$allowed =  array('cpp', 'c');
				$filename = $_FILES['fileToUpload']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if(!in_array($ext,$allowed) ) {
				    $contestCode = "Unreadable file format";
				}
				else{
					$contestCode = file_get_contents($_FILES['fileToUpload']['tmp_name']); /////UPloaded code is in here.......
				}
				//file_put_contents("faltu.txt", $contestCode);
				//echo $contestCode;
				$locIn="";
				$locOut="";
				$judgeOutput = $judgeInput = $userOutput = "";
				if(is_readable ("ccode1.exe")){
					if(unlink("ccode1.exe"));// echo "deleted";
					//else echo "Not deleted";
				}

				$locIn = "ContestProblem/".$_GET['CPid']."in.txt";
				$locOut = "ContestProblem/".$_GET['CPid']."out.txt";
				$judgeInput=file_get_contents($locIn);
				$judgeOutput=file_get_contents($locOut);

				file_put_contents("input.txt", $judgeInput);
				putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");

				date_default_timezone_set("Asia/Dhaka");
				$time = date("Y-m-d H:i:s");
				//if($language=="C++"){
					ini_set('max_execution_time', 10);
					file_put_contents("code1.cpp", $contestCode);
					$init1 = microtime(true);
				
					exec("g++ code1.cpp -o ccode1.exe", $output, $return);
					$answer=shell_exec("ccode1.exe");
					

					$init2 = microtime(true);
					if(!$return){
						$userOutput=file_get_contents("output.txt");
						//echo $userOutput, "<br>";
						if ($userOutput == $judgeOutput) { $verdict = "Accepted"; }
				    	else { $verdict = "Wrong Answer"; }
					}
					else {
						$verdict = "Compilation Error";
					}
					
			    	file_put_contents("output.txt", "");
			    //}
			   	include("connection.php");
			   	$sql="SELECT c_verdict FROM contestcode WHERE contest_id='".$_GET['CId']."' AND problem_serial='".$ProblemSerial."' AND team_name='".$_SESSION['teamName']."' AND c_verdict='Accepted' ";
			   	$rslt=$conn->query($sql);
			   	if($rslt->num_rows){
				   	$penalty=0;
				}
			   	else if($verdict=="Accepted"){
			   		$penalty=floor($diff/60);
			   		$tmpPenalty = $penalty;
			   		$sql="SELECT penalty FROM contestcode WHERE contest_id='".$_GET['CId']."' AND problem_serial='".$ProblemSerial."' AND team_name='".$_SESSION['teamName']."' ";
 			   		$rslt1 = $conn->query($sql);
			   		while($row = $rslt1->fetch_assoc()){
			   			$tmpPenalty = $tmpPenalty+$row['penalty'];
			   		}
			   		$sql="UPDATE contestrank SET totalSolved=totalSolved+1 WHERE contestId='".$_GET['CId']."' AND tName='".$_SESSION['teamName']."' ";
			   		$conn->query($sql);
			   		$sql="UPDATE contestrank SET totalPenalty=totalPenalty+'".$tmpPenalty."' WHERE contestId='".$_GET['CId']."' AND tName='".$_SESSION['teamName']."' ";
			   		$conn->query($sql);
			   	}
			   	$safecode = mysql_real_escape_string($contestCode);
			   	$sql= "INSERT INTO contestcode(contest_id, problem_serial, c_problemName, team_name, c_language, c_verdict, penalty, c_source, c_submissionTime) VALUES('".$ContestId."', '".$ProblemSerial."', '".$CPName."', '".$_SESSION['teamName']."', '".$language."', '".$verdict."', '".$penalty."', '".$safecode."', '".$time."')";
			   	if($conn->query($sql)){
			   		header("location: MySubmissionsForContest.php?CId=".$ContestId);
			   	}
			   	else echo $conn->error;
				//header("location:HomePage.php"); ////////////change directory.......
			//}
		}
	}
	
?>
<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>Problem</title>
	<style>
	.button {
	  border-radius: 10px;
	  background-color: black;
	  border: none;
	  color: #FFFFFF;
	  text-align: center;
	  font-size: 20px;
	  padding: 10px;
	  width: 120px;
	  transition: all 0.5s;
	  cursor: pointer;
	  margin: 5px;
	}

	.button span {
	  cursor: pointer;
	  display: inline-block;
	  position: relative;
	  transition: 0.5s;
	}

	.button span:after {
	  content: '»';
	  position: absolute;
	  opacity: 0;
	  top: 0;
	  right: -20px;
	  transition: 0.5s;
	}

	.button:hover span {
	  padding-right: 25px;
	}

	.button:hover span:after {
	  opacity: 1;
	  right: 0;
	}

	.hidden {
		display: none;
	}
	</style>
</head>
<body style="background-color: grey">
	<div style="background-color: white; padding-top: 10px; padding-bottom: 20px">
	<center>
	<table border="0" style="width: 90%;">
		<tr>
			<td style="text-align: center;"><h1><?php echo $ProblemSerial, ". ", $CPName; ?></h1></td>
		</tr>
		<tr>
			<td style="width: 80%; height: 900px; border: 1px solid #ddd">
				<?php echo "<embed src='ContestProblem/".$_GET['CPid'].".pdf#zoom=113' width='100%' height='910px'/>"; ?>
			</td>
			<td style="width: 20%; background-color: white; vertical-align: top; text-align: center; padding-left: 20px; padding-top: 0px;">
				<h3 style="border: 1px solid #ddd; padding: 10px">Contest #<?php echo ($ContestId-100000).": ", $CName; ?></h3>
				<h3 style="border: 1px solid #ddd; padding: 50px 10px 50px 10px">
					<?php
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
						if(($curdatetime>$row['CTime']) && ($diff/60)<$row['CDuration']){
							$diff = $row['CDuration']*60-$diff;
							$hours = floor($diff/3600);
							$tmp="";
							if($hours == 1) $tmp = $hours." hour ";
							else if($hours > 1) $tmp = $hours." hours ";
							$diff = $diff-($hours*3600);
							$minutes = floor($diff/60);
							if($minutes == 1) $tmp = $tmp.$minutes." minute ";
							else if($minutes > 1) $tmp = $tmp.$minutes." minutes ";
							echo "Time remaining:<br> ".$tmp;
						}
						else if($curdatetime>$row['CTime']){
							echo "Contest ended";
						}
					?>
					</h3>

				<form action="GetContestProblem.php?CPid=<?php echo $_GET['CPid']; ?>" method="post" enctype="multipart/form-data">
					<h3 style="border: 1px solid #ddd; padding-top: 30px; padding-bottom: 30px; align-content: right; ">
					Submit Code:<br><br>
					Language:
					<select style="width: 55px; border:ridge; border-color: peachpuff" type="text" id="language" name="language" required>
						<option value="C++">C++</option>
						<option value="C">C</option>
					</select>
					<br><br>
					<input style="width: 175px;" type="file" title=".cpp/.c file only" name="fileToUpload" id="fileToUpload" required>
					<!--<input type="file" id="files" class="hidden" />
					<button><label for="files">.cpp file</label></button>-->
					<br><br>
					<a href="HomePage.php" style="color: white; text-decoration: none"><button type="Submit" name="Submit" class="button"><span>Submit </span></button></a>
					</h3>
				</form>
			</td>
		</tr>
	</table>
	</center>
	</div>

	<?php 
		include("footer.php");
	?>
</body>
</html>