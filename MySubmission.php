<?php
	include("header.php");
	include("OptionVol.php");
	if(!isset($_SESSION['user_name'])){
	   	header("location: LoginPage.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>MySubmission</title>
	<style>

    	#sections01 
	    {
	        background-color: black;
	        width:18%;
	        float:left;
	        height: 600px;
	    }
	    #sections02 
	    {
	        background-color: #fff0f0;
	        width:82%;
	        float:left;
	        height: 600px;
	    }
	    div.fixed 
	    {
	        position: fixed;
	        width: 18%;
	    }
	    table.set 
	    { 
	        border-collapse: collapse;
	        width: 70%;
	    }

	    th.set 
	    {
	        padding: 8px;
	        text-align: center;
	        border-bottom: 1px solid LightSteelBlue;
	        font-family: Monotype Corsiva;
	        font-style: Italic Bold;
	        font-size: 17px;
	    }

	    td.set
	    {
	        color: red;
	        padding: 8px;
	        text-align: center;
	        border-top: 1px solid LightSteelBlue;
	        border-bottom: 1px solid LightSteelBlue;
	        border-right: 1px solid LightSteelBlue;
	        border-left: 1px solid LightSteelBlue;
	        height: 5px;
	    }
	    td a.set
	    {
	        color: coral;
	    }
	    table:nth-child(even).set{background-color: #eeeec3 }
	    table:nth-child(odd).set{background-color: #f3d8d8}
	    tr.set:hover{background-color:#f1daf1}
	    table.vol 
	    { 
	        border-collapse: collapse;
	        width: 100%;
	    }

	    th.vol 
	    {
	        padding: 8px;
	        text-align: center;
	        border-bottom: 1px solid #ddd;
	    }
	    tr:hover.vol 
	    {
	        text-decoration: none;
	    }
	    td a.vol
	    {
	        color: aquamarine;
	    }
	    a:link.vol
	    {
	      
	        text-decoration:none; 
	    }
	    a:hover.vol 
	    {
	        background-color: DarkSlateGrey;
	    }
	    td a.vol 
	    {
	        text-decoration: none;
	        display: block; 
	        border-bottom: 1px solid #ddd;
	        padding: 8px; 
	    }

	    td.vol:hover{background-color:DarkSlateGrey }
	    a, .dropbtn 
	    {
	        color: coral;
	        text-align: center;
	        text-decoration: none;
	    }

	    a:hover, .dropdown:hover .dropbtn
	    {
	        color: coral;
	    }

	    .dropdown 
	    {
	        color: coral;
	    }

	    .dropdown-content 
	    {
	        display: none;
	        text-align: center;
	    }

	    .dropdown-content a 
	    {
	        color: lightblue;
	        padding: 2px;
	        text-decoration: none;
	        display: block;
	        text-align: center;
	        border-bottom: 1px solid #ddd;
	    }

	    .dropdown-content a:hover {background-color: #f1f1f1}

	    .show {display:block;}
		table.abc {	
		    border-collapse: collapse;
		    width: 100%;
		}
		th.abc, td.abc {
		    text-align: left;
		    padding: 8px;
		}
		tr:nth-child(even).abc{background-color: WhiteSmoke; border-bottom: 1px solid lightgrey; }
		tr:nth-child(odd).abc{background-color: PaleTurquoise; border-bottom: 1px solid lightgrey; }
		tr:hover.abc{background-color: MediumTurquoise }

		/* unvisited link */
		a:link.abc {
			text-decoration: none;
		    color: black;
		}
		/* visited link */
		a:visited.abc {
			text-decoration: none;
		    color: black;
		}
		/* mouse over link */
		a:hover.abc {
			text-decoration: underline;
		    color: black;
		}
		/* selected link */
		a:active.abc {
		    color: black;
		}

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
	<script>
	    function myFunction()
	    {
	        document.getElementById("myDropdown").classList.toggle("show");
	    }

	    // Close the dropdown if the user clicks outside of it
	    window.onclick = function(e) 
	    {
	        if (!e.target.matches('.dropbtn')) 
	        {

	          var dropdowns = document.getElementsByClassName("dropdown-content");
	          for (var d = 0; d < dropdowns.length; d++) 
	          {
	              var openDropdown = dropdowns[d];
	              if (openDropdown.classList.contains('show')) 
	              {
	                openDropdown.classList.remove('show');
	              }
	          }
	        }
	    }
    </script>

	<div style="width: 18%; height:900px; background-color: black; float: left;">
		<div class="fixed">
        <table class="vol">
            <th class="vol" style="color:MediumOrchid ;border-top:10px solid LightSlateGray ;border-right: 10px solid LightSlateGray ;border-left: 10px solid LightSlateGray ;">VOLUME</th>
            <tr class="vol"  onclick="highlight()">
                <td class="vol"><a class="vol" href="VolumeHome.php"> Volume Home</a></td>
            </tr>
            <tr class="vol">
                <td class="vol"><a class="vol" href="ProblemSet.php">Problem Set</a></td>
            </tr>
            <tr class="vol">
                <td class="vol"><a class="vol" href="ProblemCategory.php">Problem Category</a></td>
            </tr>
            <tr class="vol">
                <td class="vol"><a class="vol" href="ProblemSetter.php">Problem Setters</a></td>
            </tr>
            <tr class="vol">
                <td class="vol"><a class="vol" href="SubmissionPage.php">Submit Problems</a></td>
            </tr>
            <tr class="vol">
                <td class="vol"><a class="vol" href="MySubmission.php">My Submission</a></td>
            </tr>
            <tr class="vol">
                <td class="vol dropdown">
                    <a style="color: aquamarine;" href="javascript:void(0)" class="vol dropbtn" onclick="myFunction()">Ranklist</a>
                        <div class="dropdown-content" id="myDropdown">
                            <a href="FullRanklist.php" style="color: LightPink">Full Ranklist</a>
                            <a href="InstitutionRanklist.php" style="color: LightPink">Institution Ranklist</a>
                            <a href="CountryRanklist.php" style="color: LightPink">Country Ranklist</a>
                        </div>
                </td>
            </tr>
            <tr class="vol">
                <td class="vol"><a class="vol" href="UserStatistics.php">User Statistics</a></td>
            </tr>
            <th class="vol" style="height:5px;border-bottom: 10px solid LightSlateGray ;border-right: 10px solid LightSlateGray ;border-left: 10px solid LightSlateGray;"></th>
        </table>
    </div>
	</div>
	<div style="width: 0%; height:900px; background-color: lightblue; float: left;"></div>
	<div style="width: 82%; height:900px; background-color: #fff0f0 ; float: left;">

		<center><h1 style="font-family: Monotype Corsiva; color: MediumBlue "><?php echo $_SESSION['user_name']."'s"; ?> Submissions</h1></center>
		<?php 
			include("connection.php");
			if(!$conn->connect_error){
			    
				$sql = "SELECT * FROM code where U_name='".$_SESSION['user_name']."' ORDER BY Submission_Id DESC";
				$result=$conn->query($sql);
				if(!isset($_GET['page'])) $_GET['page']=0;
 				//include 'showtable.php';
				
				if ($result->num_rows == 0) {
 					echo "<h1 style='padding:15px;text-align:center;color:red;'>You have not submitted any problem :)</h2>";
				}
				else{
					//$center = "center";
					echo "<table class='abc' style='width:100%;'>
						<tr style='background-color:#25ada6 '>
							<th class='abc' style='text-align:center'>Submission Id</th>
							<th class='abc' style='text-align:center'>Submission Time</th>
							<th class='abc' style='text-align:center'>Language</th>
							<th class='abc' style='text-align:center'>Problem</th>
							<th class='abc' style='text-align:center'>Verdict</th>
						</tr>";
						$cnt=0;
						$desc="DescriptionPage.php";
						while($row = $result->fetch_assoc()) {
							/*$sql = "SELECT ProblemName FROM problems where Problem_Id = '".$row['ProblemId']."'";
							$result1=$conn->query($sql);
							$ProblemName = $result1->fetch_assoc();*/
							if($cnt>=($_GET['page']*20) and $cnt<(($_GET['page']*20)+20)){
								echo "<tr class='abc'>";

								   	echo"<td class='abc' style='text-align:center'><a target = '_blank' class='abc' href='ShowSubmittedCode.php?";
								   	$tmp=$row['submission_id'];
								   	echo "submissionId=$tmp'>".$row['submission_id']."</a></td>";

								   	echo"<td class='abc' style='text-align:center'>".$row['submission_time']."</td>";
								    echo"<td class='abc' style='text-align:center'>".$row['language']."</td>";

								   	echo"<td class='abc' style='text-align:center'><a target = '_blank' class='abc' href='".$desc."?name=".$row['ProblemName']."'";
								   	$tmp=$row['problemId'];
								   	echo "problemId=$tmp'>".$row['problemId']. "-" .$row['ProblemName']."</a></td>";
								    echo"<td class='abc' style='text-align:center'>".$row['verdict']."</td>";
								echo "</tr>";
							}	
							$cnt++;
						}
					echo "</table>";
				}

 				echo"<h1><a class='janina' style='float:right' title='Next' href='MySubmission.php?";
 				if(isset($_GET['page'])){
 					$k=$_GET['page'];
 					$k=$k+1;
 					echo "page=$k;'";
 				}
 				else { echo "page=1;'"; }
 				if(($_GET['page']*20)+20<$result->num_rows){ echo ">❯❯&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></h1>"; }
 				else{ echo "></a><h1>";}
 				if(isset($_GET['page'])){
 					if($_GET['page']>0){
 						echo"<h1><a title='Previous' class='janina' href='MySubmission.php?";
 						$k=$_GET['page'];
 						$k=$k-1;
		 				echo "page=$k;'";
		 				echo ">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp❮❮</a></h1>";
					}
				}
 			}
		?>
	</div>
	<div style="background-color: lightblue; width: 0%; height: 900px; float: left;"></div>
	<?php include("footer.php"); ?>
</body>
</html>