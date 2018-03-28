<?php
	include("header.php");
	include("optionsforcontest.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>MySubmission</title>
	<style>

		table {	
			border-right: 1px solid CornflowerBlue;
			border-left: 1px solid CornflowerBlue;
		    border-collapse: collapse;
		    width: 100%;
		}
		th {
			border-top: 1px solid black;
			border-bottom: 1px solid black;
		    text-align: left;
		    padding: 8px;
		} 
		td {
		    text-align: left;
		    padding: 12px;
		}
		tr:nth-child(even).abc{background-color: WhiteSmoke; border-bottom: 1px solid lightgrey;}
		tr:nth-child(odd).abc{background-color: PaleTurquoise; border-bottom: 1px solid lightgrey;}
		tr:hover.abc{background-color: MediumAquaMarine  }

		a:link.janina {
			text-decoration: none;
		    color: black;
		}
		a:visited.janina {
			text-decoration: none;
		    color: black;
		}
		a:hover.janina {
			text-decoration: none;
		    color: black;
		}
		a:active.janina {
		    color: red;
		}

	</style>
</head>
<body style="background-color: black">
	<div style="width: 10%; height:1180px; background-color: #fff0f0; float: left;"></div>
	<div style="width: 80%; height:1180px; background-color: CornflowerBlue  ; float: left;">

		<center>
			<?php
				$CName="";
				$sql = "SELECT CName FROM contest where CId='".$_GET['CId']."' ";
				$result = $conn->query($sql);
				while ($row = $result->fetch_assoc()) {
					$CName = $row['CName'];
				}
			?>
			<h1 style="font-family: Monotype Corsiva; color: black ">Contest #<?php echo ($_GET['CId']-100000).": ", $CName; ?></h1>
			<h3 style="color: black ">
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
		</center>
		<?php 
			include("connection.php");
			if(!$conn->connect_error){
				$sql = "SELECT * FROM contestrank WHERE contestId = '".$_GET['CId']."' ORDER BY totalSolved DESC, totalPenalty ASC ";
				$result=$conn->query($sql);

				$sql = "SELECT * FROM contest WHERE CId='".$_GET['CId']."' ";
				$result1=$conn->query($sql);
				$row = $result1->fetch_assoc();

				if(!isset($_GET['page'])) $_GET['page']=0;

				if ($result->num_rows == 0) {
 					echo "<h1 style='padding:15px;text-align:center;color:red;'>No contestant found..!!</h2>";
				}
				else{
					//$center = "center";
					echo "<table style='width:100%;'>
						<tr style='background-color:#25ada6 '>
							<th style='text-align:center; width: 40px'>Rank</th>
							<th style='text-align:center'>Team name</th>
							<th style='text-align:center'>Solve/Penalty</th>";
							for ($i=0, $j='A'; $i < $row['CPNumber']; $i++, $j++) { 
								echo "<th style='text-align:center'>".$j."</th>";
							}
						echo "</tr>";
						$cnt=0;
						$tmpcnt=0;
						$prevSolve=-1;
						$prevPenalty=-1;
						while($row1 = $result->fetch_assoc()) {
							/*$sql = "SELECT ProblemName FROM problems where Problem_Id = '".$row['ProblemId']."'";
							$result1=$conn->query($sql);
							$ProblemName = $result1->fetch_assoc();*/
							if($prevSolve==$row1['totalSolved'] && $prevPenalty==$row1['totalPenalty']){}
							else $tmpcnt++;
							if($cnt>=($_GET['page']*20) and $cnt<(($_GET['page']*20)+20)){
								echo "<tr class='abc'>";
									echo"<td style='text-align:center'>".$tmpcnt."</td>";
								   	echo"<td style='text-align:center'>".$row1['tName']."</td>";
								    echo"<td style='text-align:center'>".$row1['totalSolved']."/".$row1['totalPenalty']."</td>";
								    for ($i=0, $j='A'; $i < $row['CPNumber']; $i++, $j++) {
								    	$sql = "SELECT team_name FROM contestcode WHERE contest_id = '".$_GET['CId']."' AND team_name='".$row1['tName']."' AND problem_serial = '".$j."' AND c_verdict = 'Accepted' ";
								    	$found=$conn->query($sql);
								    	$sql = "SELECT penalty FROM contestcode WHERE contest_id = '".$_GET['CId']."' AND team_name='".$row1['tName']."' AND problem_serial = '".$j."' AND penalty != 0 ";
								    	$sm=$conn->query($sql);
								    	$totaltry=$sm->num_rows;
								    	if($found->num_rows) echo"<td style='text-align:center; color:green'>&#10004(".$totaltry.")</td>";
								    	else if($totaltry) echo"<td style='text-align:center; color: red'>&#10008(".$totaltry.")</td>";
								    	else echo"<td style='text-align:center'>-</td>";
								    }
								echo "</tr>";
							}
							$cnt++;
							$prevSolve=$row1['totalSolved']; 
							$prevPenalty=$row1['totalPenalty'];
						}
					echo "</table>";
				}

 				$CId=$_GET['CId'];
 				echo"<h1><a class='janina' style='float: right;' title='Next' href='Standings.php?";
 				if(isset($_GET['page'])){
 					$k=$_GET['page'];
 					$k=$k+1;
 					echo "page=$k&CId=$CId;'";
 				}
 				else { echo "page=1&CId=$CId;'"; }
 				if(($_GET['page']*20)+20<$result->num_rows){ echo ">❯❯&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></h1>"; }
 				else{ echo "></a><h1>";}
 				if(isset($_GET['page'])){
 					if($_GET['page']>0){
 						echo"<h1><a title='Previous' class='janina' href='Standings.php?";
 						$k=$_GET['page'];
 						$k=$k-1;

		 				echo "page=$k&CId=$CId;'";
		 				echo ">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp❮❮</a></h1>";
					}
				}
 			}
		?>
	</div>
	<div style="background-color: #fff0f0; width: 10%; height: 1180px; float: left;">
		
	</div>
	<?php include("footer.php"); ?>
</body>
</html>