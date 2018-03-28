<?php 
	include("header.php");
	include("optionsforContest.php");
	if($_SESSION['teamName']==""){
		header("Location: homepage.php");
	}
   	$contestId = $_GET['CId']; //// SET Contest id here
   	date_default_timezone_set("Asia/Dhaka");
	$time = date("h:i:s a");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Running Contest</title>
	<style>
		a:link.rc {
			background-color: white;
			text-decoration:none; 
		}
		a:hover.rc{
			background-color: lightgrey;
		}
		tr:hover.rc{
		   	text-decoration: none;
		}
		td a.rc{
			text-decoration: none;
		   	display: block; 
		   	border: 0px solid black;
			padding: 15px; 
		}
		a:link {
			text-decoration: none;
		}
		a:hover {
			color: coral;
			background-color: transparent;
			text-decoration: underline;
		}

	</style>
</head>
<body style="background-color: black">
	<div style="width: 100%; background-color: white">
		<center>
		<table style="width: 300px; height: 100px;">
			<?php
				$sql = "SELECT CName FROM contest where CId = '".$contestId."'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				echo "<tr>
					<td style='padding: 10px; text-align: center'>
						<h1> Contest # ".($contestId-100000).": ".$row['CName'];
				echo "</h1></td></tr>";
			?>
		</table>
		</center>
	</div>
	<div style="width: 5%; height: 1010px; background-color: white; float: left;"></div>
	<div style="width: 64%; height: 994px; background-color: white; float: left; padding-top: 16px; padding-left: 13px">
		<table style="width: 96%; border-color: red; border-collapse: collapse;border: 1px solid #ddd;">
		<?php
			$sql = "SELECT * FROM cproblems where CId = '".$contestId."' ORDER BY Pserial";
			$result=$conn->query($sql);
			echo "
			<tr>
				<th style='border-bottom: 1px solid #ddd'>
					<h2>Problems:</h2>
				</th>
			</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo"<td style='border-bottom: 1px solid #ddd'><a class='rc' style='font-size:120%; color: black' href='GetContestProblem.php?";
				$tmp=$row['CId'].$row['PSerial'];
				echo "CPid=$tmp'><b>".$row['PSerial']. "</b>.&nbsp&nbsp" .$row['CPName']."</a></td>";
				echo "</tr>";
			}
		?>
		</table>
	</div>
	<div style="width: 25%; height: 1010px; background-color: white; float: left; padding-top: 0px">
		<br>
		<table style="width: 300px; height: 100px; border: 1px solid #ddd;">
			<tr>
				<td style="padding: 10px; text-align: center;">
					<?php
					//for (; ; ) {
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
							echo"<td style='text-align:center'><h3 style='font-size:110%;color: black'>Time remaining:<br> ".$tmp."</h3></td>";
						}
						else if($curdatetime>$row['CTime']){
							echo"<td style='text-align:center'><h3 style='font-size:110%;color: black'>Contest ended</h3></td>";
						}
					//}
					?>
					<!--<h3>Time remaining:<?php echo "<br>",$time; ?></h3>-->
				</td>
			</tr>
		</table>
		<br>
		<table style="width: 300px; height: 100px; border: 1px solid #ddd;">
			<tr>
				<td style="padding: 10px; text-align: center;">
					Click <a href="MySubmissionsForContest.php?CId=<?php echo $contestId; ?>">here</a> to see your submissions.
				</td>
			</tr>
		</table>
		<br>
		
	</div>
	<div style="width: 5%; height: 1010px; background-color: white; float: right; border:none;"></div>
	<?php include("footer.php") ?>
</body>
</html>

<!--
			$rank=1; $solved=-1;

			if($solved!=$currentSolve){
				$rank++;
				$solved=$currentSolve;
			}

-->