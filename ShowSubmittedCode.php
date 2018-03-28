<!DOCTYPE html>
<html>
<head>
	<title>See Code</title>
	<style>

		table.ssc {
		    border-collapse: collapse;
		    width: 100%;
		}
		tr.ssc {
			border: 1px solid Indigo  ;
		    padding: 8px;
		}
		th.ssc {
		    text-align: left;
		    padding: 8px;
		}
		td.ssc{
			text-align: left;
		    padding: 8px;	
		}
		
		/* unvisited link */
		a:link.ssc {
			text-decoration: none;
		    color: black;
		}
		/* visited link */
		a:visited.ssc {
			text-decoration: none;
		    color: black;
		}
		/* mouse over link */
		a:hover.ssc {
			text-decoration: underline;
		    color: black;
		}
		/* selected link */
		a:active.ssc {
		    color: black;
		}

	</style>
</head>
<body>
	<?php
		include("header.php");
		include("OptionVol.php");
	?>
	<div style="width: 10%; height:900px; background-color:#fff0f0 ; float: left;"></div>
	<div style="width: 80%; height:900px; background-color: CornflowerBlue ; float: left;">
		<center><h1 style="font-family: Monotype Corsiva; color: MediumBlue ">Source code</h1></center>
		<?php
			echo "<table class='ssc'>";
			echo "<tr class='ssc' style='background-color:#25ada6  '>
					<th class='ssc' style='text-align:center'>Submission Id</th>
					<th class='ssc' style='text-align:center'>Submission Time</th>
					<th class='ssc' style='text-align:center'>Language</th>
					<th class='ssc' style='text-align:center'>Problem</th>
					<th class='ssc' style='text-align:center'>Verdict</th>
				</tr>";

			$sql = "SELECT * FROM code where submission_id = '".$_GET['submissionId']."'";
			$result=$conn->query($sql);
			while($row = $result->fetch_assoc()) {
				/*$sql = "SELECT ProblemName FROM problem where Problem_Id = '".$row['ProblemId']."'";
				$result1=$conn->query($sql);
				$ProblemName = $result1->fetch_assoc();*/
				$desc="DescriptionPage.php";
				echo "<tr class='ssc' style='background-color: PaleTurquoise'>";
					echo"<td class='ssc' style='text-align:center'>".$row['submission_id']."</td>";
					echo"<td class='ssc' style='text-align:center'>".$row['submission_time']."</td>";
					echo"<td class='ssc' style='text-align:center'>".$row['language']."</td>";
					echo"<td style='text-align:center'><a class='ssc' href='".$desc."?name=".$row['ProblemName']."'";
					$tmp=$row['problemId'];
					echo "problemId=$tmp'>".$row['problemId']. "-" .$row['ProblemName']."</a></td>";
					echo"<td class='ssc' style='text-align:center'>".$row['verdict']."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td class='ssc' colspan='5'><br></td>";
				echo "</tr>";
				echo "<tr class='ssc'>";
					echo "<td class='ssc' colspan='5' style='background-color: white'><b><u>Code:</b><u></td>";
				echo "</tr>";
				echo "<tr class='ssc' style='background-color:white'>";
					echo "<td colspan='5' style='border-collapse: collapse;'>
						<textarea style='width:98%; height: 600px; padding: 10px;' readonly='yes'>".$row['Source']."</textarea>
					</td>";
				echo "</tr>";
			}
			echo "</table>";
		?>
	</div>
	<div style="width: 10%; height:900px; background-color: #fff0f0 ; float: left;"></div>

	<?php include("footer.php"); ?>
</body>
</html>