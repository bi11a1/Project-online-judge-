<?php
	include("header.php");
	include("options.php");
	if(isset($_SESSION['teamName']) && $_SESSION['teamName']!=""){
		$tmp = $_SESSION['contest'];
		header("location: RunningContest.php?CId=".$tmp);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contest Home</title>
	<style>
	
		a:link.abc {
			background-color: white;
			text-decoration:none; 
		}
		a:hover.abc{
			background-color: lightgrey;
		}
		tr:hover.abc{
		   	text-decoration: none;
		}
		td a.abc{
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

		table {	
		    border-collapse: collapse;
		    width: 100%;
		}
		th, td {
			border-bottom: 3px solid #ddd;
		    text-align: left;
		    padding: 8px;
		}
		tr:nth-child(even).abc{background-color: MediumAquaMarine }
		tr:nth-child(odd).abc{background-color: MediumAquaMarine }
		tr:hover.abc{background-color: darkcyan  }

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
	<div style="width: 10%; height:1350px; background-color: #fff0f0; float: left;"></div>
	<div style="width: 80%; height:1350px; background-color: CornflowerBlue  ; float: left;">

		<center><h1 style="font-family: Monotype Corsiva; color: MediumBlue">
			<?php 
				if($_SESSION['user_name']=='admin'){
					echo "<a href='setcontest.php' title='SET CONTEST'>Contests</a>";
				}
				else echo "Contests";
			?>
		</h1></center>
		<?php 
			include("connection.php");
			if(!$conn->connect_error){
			    
				$sql = "SELECT * FROM contest ORDER BY CTime DESC";
				$result=$conn->query($sql);
				if(!isset($_GET['page'])) $_GET['page']=0;
				
				if ($result->num_rows == 0) {
 					echo "<h1 style='padding:15px;text-align:center;color:red;'>No contest Yet :)</h2>";
				}
				else{
					//$center = "center";
					echo "<table style='width:100%;'>
						<tr style='background-color:#25ada6 '>
							<th style='text-align:center'>Contest</th>
							<th style='text-align:center'>Time</th>
						</tr>";
						$cnt=0;
						while($row = $result->fetch_assoc()) {
							if($cnt>=($_GET['page']*10) and $cnt<(($_GET['page']*10)+10)){
								echo "<tr class='abc'>";

								   	echo"<td style='text-align:center; padding: 30px'><a class='abc' style='color: black' href='LoginForContest.php?";
								   	$tmp=$row['CId'];
								   	echo "CId=$tmp'>".$row['CName']."</a></td>";
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
								echo "</tr>";
							}	
							$cnt++;
						}
					echo "</table>";
				}

 				echo"<h1><a class='janina' style='float: right;' title='Next' href='ContestHome.php?";
 				if(isset($_GET['page'])){
 					$k=$_GET['page'];
 					$k=$k+1;
 					echo "page=$k;'";
 				}
 				else { echo "page=1;'"; }
 				if(($_GET['page']*10)+10<$result->num_rows){ echo ">❯❯&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></h1>"; }
 				else{ echo "></a><h1>";}
 				if(isset($_GET['page'])){
 					if($_GET['page']>0){
 						echo"<h1><a class='janina' title='Previous' style='text-decoration: none' href='ContestHome.php?";
 						$k=$_GET['page'];
 						$k=$k-1;
		 				echo "page=$k;'";
		 				echo ">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp❮❮</a></h1>";
					}
				}
 			}
		?>
	</div>
	<div style="background-color: #fff0f0; width: 10%; height: 1350px; float: left;">
		
	</div>
	<?php include("footer.php"); ?>
</body>
</html>