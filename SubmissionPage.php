<!DOCTYPE html>
<html>
<head>
	<title>Compiler</title>
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
	</style>
</head>
<body style="background-color: black">
	<?php
	include("header.php");
	include("Optionvol.php");
	$current = "";
	$answer = "";
	$problemId = "";
	$language = "";
	$verdict = "";

	if(!empty($_POST)){
		$current=$_POST['cppcode'];
		$problemId=$_POST['problemId'];
		$language=$_POST['language'];

		if(is_readable ("code1.exe")){
			if(unlink("code1.exe"));
		}

		include("connection.php");
		$sql= "select Problem_Id from problems where Problem_Id='".$_POST['problemId']."'";
		$rslt1=mysqli_query($conn, $sql);
		if(mysqli_num_rows($rslt1) && $current!=""){
			if($conn->query($sql)){
				$locIn="";
				$locOut="";
				$judgeOutput = $judgeInput = $userOutput = "";
				$locIn = "judge/".$problemId."in.txt";
				$locOut = "judge/".$problemId."out.txt";
				$judgeInput=file_get_contents($locIn);
				$judgeOutput=file_get_contents($locOut);

				file_put_contents("input.txt", $judgeInput);
				putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");

				date_default_timezone_set("Asia/Dhaka");
				$time = date("Y-m-d H:i:s");
				//if($language=="C++"){
					ini_set('max_execution_time', 10);
					file_put_contents("code1.cpp", $current);
					$init1 = microtime(true);
					exec("g++ code1.cpp -o code1.exe", $output, $return);
					$answer=shell_exec("code1.exe");
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
				//else {
				//	echo "Enter your c++ code";
				//}
				$sql = "SELECT problem_name FROM problems WHERE problem_id='".$problemId."' ";
				$result1=$conn->query($sql);
				$problem_name = $result1->fetch_assoc();
				$safecode = mysql_real_escape_string($current);
				$sql = "INSERT INTO code(language, verdict, U_name, ProblemId, Source, Submission_Time, ProblemName) VALUES ('".$language."', '".$verdict."', '".$_SESSION['user_name']."', '".$problemId."', '".$safecode."', '".$time."', '".$problem_name['problem_name']."')";
				if($conn->query($sql)){
					if($verdict=='Accepted')
					{
						$query="INSERT INTO solve(prob_id,UName) VALUES ('".$problemId."','".$_SESSION['user_name']."')";
						$conn->query($query);
					}
					header("location:MySubmission.php");
				}
				else{
					echo $conn->error;
				}
			}
		}
		else{
			$Err="Enter valid problem id!";
		}
	}
	?>
	<div>
		<div style="width: 18%; height: 750px; float: left; background-color: black">
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
		<div style="width: 82%; height: 750px; float: left; background-color: #fff0f0">
		<center>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<table border="0">
				<tr>
					<td><p></p></td>
				</tr>
				<tr>
					<th colspan="2" style="font-family: Monotype Corsiva;color:darkblue;font-size:170%;width: 393px">Submit Problem</th>
				</tr>
				<tr>
					<td><p></p></td>
				</tr>
				<tr>
					<th style="color: black;" >Problem ID: </th>
					<td><input type="textarea" name="problemId" style="width: 60px" maxlength="4" value="<?php echo $problemId; ?>"</td>
				</tr>
				<tr>
					<th style="color: black;" >Select Language:</th>
					<td>
						<select type="" id="" name="language" style="width: 65px; border:ridge; border-color: peachpuff;">
							<option value="C++">C++</option>
							<option value="C">C</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><p></p></td>
				</tr>
				<tr>
					<td><p></p></td>
				</tr>
			</table>
			<table border="0">		
				<tr>
					<td>
						<textarea name="cppcode" cols="93" rows="30" style="padding:3px; border-top: 15px; border-bottom: 10px solid DarkSlateGrey; border-left: 5px; border-right: 5px solid DarkSlateGrey; border-style: inset; padding: 2px; color: black;" placeholder="Enter your code here..."><?php echo $current ?></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<center><input type="submit" value="Submit"></center>
					</td>
				</tr>
			</table>
		</form>
		</center>
		</div>
	</div>
	<?php
		include("footer.php");
	?>
</body>
</html>
