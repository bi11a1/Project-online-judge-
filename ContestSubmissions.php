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
			border-left: 1px solid CornflowerBlue;
			border-right: 1px solid CornflowerBlue;
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
		    padding: 8px;
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
	<div style="width: 10%; height:950px; background-color: #fff0f0; float: left;"></div>
	<div style="width: 80%; height:950px; background-color: CornflowerBlue; float: left;">

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
			<h3 style="color: black ">SUBMISSIONS</h3>
		</center>
		<?php 
			include("connection.php");
			if(!$conn->connect_error){
			    
				$sql = "SELECT * FROM contestcode WHERE contest_id='".$_GET['CId']."' ORDER BY csubmission_id DESC";
				$result=$conn->query($sql);
				if(!isset($_GET['page'])) $_GET['page']=0;
 				//include 'showtable.php';
				
				if ($result->num_rows == 0) {
 					echo "<h1 style='padding:15px;text-align:center;color:red;'>No submission yet...Be the first one to submit..!! :)</h2>";
				}
				else{
					//$center = "center";
					echo "<table style='width:100%;'>
						<tr style='background-color:#25ada6 '>
							<th style='text-align:center'>Submission Id</th>
							<th style='text-align:center'>Team name</th>
							<th style='text-align:center'>Problem</th>
							<th style='text-align:center'>Submission Time</th>
							<th style='text-align:center'>Language</th>
							<th style='text-align:center'>Verdict</th>
						</tr>";
						$cnt=0;
						while($row = $result->fetch_assoc()) {
							/*$sql = "SELECT ProblemName FROM problems where Problem_Id = '".$row['ProblemId']."'";
							$result1=$conn->query($sql);
							$ProblemName = $result1->fetch_assoc();*/
							if($cnt>=($_GET['page']*20) and $cnt<(($_GET['page']*20)+20)){
								echo "<tr class='abc'>";

								   	echo"<td style='text-align:center'>".$row['csubmission_id']."</td>";
								   	echo"<td style='text-align:center'>".$row['team_name']."</td>";
								    echo"<td style='text-align:center'>".$row['problem_serial'].". ".$row['c_problemName']."</td>";
								    echo"<td style='text-align:center'>".$row['c_submissionTime']."</td>";
								    echo"<td style='text-align:center'>".$row['c_language']."</td>";
								    echo"<td style='text-align:center'>".$row['c_verdict']."</td>";
								echo "</tr>";
							}	
							$cnt++;
						}
					echo "</table>";
				}

 				$CId=$_GET['CId'];
 				echo"<h1><a class='janina' style='float: right;' title='Next' href='ContestSubmissions.php?";
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
 						echo"<h1><a title='Previous' class='janina' href='ContestSubmissions.php?";
 						$k=$_GET['page'];
 						$k=$k-1;

		 				echo "page=$k&CId=$CId;'";
		 				echo ">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp❮❮</a></h1>";
					}
				}
 			}
		?>
	</div>
	<div style="background-color: #fff0f0; width: 10%; height: 950px; float: left;">
		
	</div>
	<?php include("footer.php"); ?>
</body>
</html>