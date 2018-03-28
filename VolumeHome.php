<!DOCTYPE html>

<html>
<head>
	<title>Volume Home </title>
	<link rel="stylesheet" type="text/css" href="linkStyle.css">
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
		include("Options.php");
	?>
	<div id="sections01">
		<div>
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
	</div>
	<div id="sections02">
		<h1 style="font-family: Monotype Corsiva;color:darkblue;text-align: center;">
			<b>Welcome </b><b><?php echo $_SESSION['user_name']?></b>
		</h1>
		<pre>
			<h3 style="font-size: 22px;color: DimGray;">   Volume Information</h3>     <b>Here you will find hundreds of problems.You will also find problems in some categories.So,pick one and start hunting. :)</b>
		</pre>
		<h3 style="text-align: center;">
		<?php
			if($_SESSION['user_name']=="admin"){
				echo "Want to insert problem? click ";
				echo "<a href='InsertProblem.php' style='color: coral'>"."here"."</a> .";
			}
		?>
		</h3>
	</div>
	<script>
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
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
	<?php include("footer.php") ?>

</body>
</html>