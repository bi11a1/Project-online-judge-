<!DOCTYPE html>

<html>
<head>
	<title>Home Page</title>
	<style>
		#sections01 
		{
			background-color: #fff0f0;
		    width:10%;
		    float:left;
		    height: 600px;
		}
		#sections02 
		{
			background-color: #fff0f0;
		    width:90%;
		    float:left;
		    height: 600px;
		}
		#sections03 
		{
			background-color: #fff0f0;
		    width:10%;
		    float:left;
		    height: 600px;
		}
		table 
		{ 
    		border-collapse: collapse;
    		width: 100%;
		}

		th 
		{
    		padding: 8px;
    		text-align: center;
    		border-bottom: 1px solid #ddd;
		}

		td
		{
			color: lightblue;
    		padding: 8px;
    		text-align: center;
    		border-bottom: 1px solid #ddd;
    		height: 5px;
		}

		td:hover{background-color:DarkGray }
	</style>
</head>
<body style="background-color: black">
	<?php
		include("header.php");
		include("Options.php");
	?>
	<div id="sections01">
	</div>
	<div id="sections02">
		<h1 style="font-family: Monotype Corsiva;color:darkblue;text-align: center;">
			<b>Welcome </b><b><?php echo $_SESSION['user_name']?></b>
		</h1>
		<pre>
			<h3 style="font-size: 22px;color: DimGray;">   Greetings From Online Judge</h3>     <b><p>&nbsp&nbsp&nbsp&nbsp&nbspHey there....Welcome to the world of programming. Here comes the complete guidelines for practicing programming and </p></b><b><p>&nbsp&nbsp&nbsp&nbsp problem solving skill.</p></b>
		</pre>
		<pre>
			<h3 style="font-size: 22px;color: DimGray;">   Contests</h3>     <b>Here you can find the <a href="ContestHome.php" style="color: Brown ;">link</a> for the contests which have been scheduled.</b>
		</pre>
		<pre style="text-align: center; font-size: 23px;font-family: Magneto;font-style: Bold Oblique;color: IndianRed">
			

Happy coding
		</pre>
	</div>
	<?php include("footer.php") ?>

</body>
</html>