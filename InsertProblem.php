<!DOCTYPE html>
<html>
<head>
	<title>Insert Problem</title>
</head>
<body>
<?php
include("header.php");
include("OptionVol.php");
?>
<?php
	$cnt=0;
	$problem_name = $problem_category = $problem_setter = $description = $sample_input = $sample_output = $time_limit = $memory_limit = "";
	$problem_nameerr = $problem_categoryerr = $problem_settererr = $descriptionerr = $sample_inputerr = $sample_outputerr = $time_limiterr = $memory_limiterr = $inputfileerr = $outputfileerr = "";
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(empty($_POST["name"]))
		{
			$problem_nameerr="Problem name is required";
		}
		else
		{
			$cnt++;
		}
		if(empty($_POST["category"]))
		{
			$problem_categoryerr="Problem Category is required";
		}
		else
		{
			$cnt++;
		}
		if(empty($_POST["setter"]))
		{
			$problem_settererr="Problem Setter name is required";
		}
		else
		{
			$problem_setter= test_input($_POST["setter"]);
		    if(!preg_match("/^[a-z A-Z 0-9]*$/",$problem_setter))
		    {
				$problem_settererr="Invalid name";
			}
			else
			{
				$cnt++;
			}
		}
		if(empty($_POST["desc"]))
		{
			$descriptionerr="Problem description is required";
		}
		else
		{
			$cnt++;
		}
		if(empty($_POST["input"]))
		{
			$sample_inputerr="Input is required";
		}
		else
		{
			$cnt++;
		}
		if(empty($_POST["output"]))
		{
			$sample_outputerr="Output is required";
		}
		else
		{
			$cnt++;
		}
		if(empty($_POST["time"]))
		{
			$time_limiterr="Time limit is required";
		}
		else
		{
			$cnt++;
		}
		if(empty($_POST["memory"]))
		{
			$memory_limiterr="Memory limit is required";
		}
		else
		{
			$memory_limit=test_input($_POST["memory"]); 
		    if(!preg_match("/^[a-z A-Z 0-9]*$/",$memory_limit))
		    {
				$memory_limiterr="Invalid memory";
			}
			else
			{
				$cnt++;
			}
		}
		if($_FILES["inputfile"]['size']== 0)
		{
			$inputfileerr="Input file is required";
		}
		else
		{
			$cnt++;
		}
		if($_FILES["outputfile"]['size']== 0)
		{
			$outputfileerr="Output file is required";
		}
		else
		{
			$cnt++;
		}
		if($cnt==10)
		{
			include("connection.php");
			$sql="select problem_name from problems WHERE problem_name='".$_POST['name']."'";
			$rslt1=mysqli_query($conn, $sql);
		    if(mysqli_num_rows($rslt1))
		    { 
		   		$problem_nameerr="Problem name is in use."; 
		   	}

		    $sql="select description from problems where description='".$_POST['desc']."'";
		    $rslt2=mysqli_query($conn, $sql);
		    if(mysqli_num_rows($rslt2))
		    {
		    	$descriptionerr="Problem is already there";
		    }
		    if(!mysqli_num_rows($rslt1) && !mysqli_num_rows($rslt2))
		    {
		    	$sql= "CREATE TABLE problems
		    		  ( problem_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		    		    problem_name VARCHAR(50) NOT NULL,
		    		    problem_category VARCHAR(30) NOT NULL,
		    		    problem_setter VARCHAR(50) NOT NULL,
		    		    description VARCHAR(1000) NOT NULL,
		    		    sample_input VARCHAR(100) NOT NULL,
		    		    sample_output VARCHAR(100) NOT NULL,
		    		    time_limit VARCHAR(30) NOT NULL,
		    		    memory_limit VARCHAR(30) NOT NULL
		    		  )";
		    	if ($conn->query($sql)) 
				{
		    		//echo "Table problems created successfully";
				}	 
				else 
				{
		    		//echo "Error creating table: " . $conn->error;
				}
				if(!$conn->connect_error)
				{
					$sql="ALTER TABLE problems AUTO_INCREMENT=1001";
				}
				if($conn->query($sql))
				{
					//echo "alter successful";
				}
				else
				{
					//echo "Alter Unsuccessful";
				}
				if(!$conn->connect_error)
				{
					$sql = "INSERT INTO problems(problem_name,problem_category,problem_setter,description,sample_input,sample_output,time_limit,memory_limit) VALUES ('".$_POST["name"]."','".$_POST["category"]."','".$_POST["setter"]."','".$_POST["desc"]."','".$_POST["input"]."','".$_POST["output"]."','".$_POST["time"]."','".$_POST["memory"]."')";
				}
				if($conn->query($sql))
				{
					echo "Value inserted";
				}
				else
				{
					echo "Value not inserted";
				}
		    }
		}
	}
	function test_input($data) 
	{
	   	$data = trim($data);
	   	$data = stripslashes($data);
	   	$data = htmlspecialchars($data);
	   	return $data;
	}

?>

<div style="background-color: white;padding: 1px;"> 
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
	<p>Enter the name of the Problem:</p>
	<input type="text" name="name">
	<span class="error"><?php echo $problem_nameerr ?></span>
	<p>Enter the problem category name:</p>
	<!--<input type="text" name="category">
	<span class="erroe"><?php //echo $problem_categoryerr ?></span>-->
	<select id="problem_category" name="category" style="width: 170px">
		<option value="Beginner">Beginner</option>
		<option value="Medium">Medium</option>
		<option value="Hard">Hard</option>
		<option value="Advanced">Advanced</option>
	</select>
	<p>Enter the problem setter name:</p>
	<input type="text" name="setter">
	<span class="error"><?php echo $problem_settererr ?></span>
	<p>Problem Description:</p>
	<textarea cols="100" rows="50" name="desc"></textarea>
	<span class="error"><?php echo $descriptionerr ?></span>
	<p>Enter the sample input:</p>
	<textarea cols="10" rows="20" name="input"></textarea>
	<span class="error"><?php echo $sample_inputerr ?></span>
	<p>Enter the sample output:</p>
	<textarea cols="5" rows="10" name="output"></textarea>
	<span class="error"><?php echo $sample_outputerr ?>;</span>
	<p>Enter the time limit</p>
	<input type="text" name="time">
	<span class="error"><?php echo $time_limiterr ?>;</span>
	<p>Enter the memory limit:</p>
	<input type="text" name="memory">
	<span class="error"><?php echo $memory_limiterr ?></span>
	<p>Enter the input file:</p>
	<input style="width: 200px" type="file" name="inputfile" id="">
	<span> Files must be in txt format</span>
	<?php
	if(isset($_FILES['inputfile']['tmp_name'])) 
	{
    $fileCount = count (glob ('judge/*in.txt'));
    $newName = 'judge/' . ( $fileCount + 1001) .'in' . '.txt';
    $tf = fopen($newName, 'w');
    fclose($tf);
    move_uploaded_file($_FILES['inputfile']['tmp_name'], $newName);
    echo $newName;
	}
	?>
	<p>Enter the output file:</p>
	<input style="width: 200px" type="file" name="outputfile" id="">
	<span> Files must be in txt format</span>
	<?php
	if(isset($_FILES['outputfile']['tmp_name'])) 
	{
    $fileCount1 = count (glob ('judge/*out.txt'));
    $newName1 = 'judge/' . ( $fileCount + 1001) .'out' . '.txt';
    $tf1 = fopen($newName1, 'w');
    fclose($tf1);
    move_uploaded_file($_FILES['outputfile']['tmp_name'], $newName1);
    echo $newName1;
	}
	echo "<br/>";
	echo "<br/>";
	?>
	<input type="submit" name="submit" value="Submit">	
</form>
<br>
</div>
<?php include("footer.php"); ?>
</body>
</html>