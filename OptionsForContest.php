<?php
    include("connection.php");
    session_start();
    if(!isset($_SESSION['teamName']) || $_SESSION['teamName']==""){
    	header("Location: HomePage.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
<style>
ul.optionsForC 
{
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li.optionsForC 
{
    float: left;
    color:aquamarine;
    display: block;
    text-align: center;
}

li a.optionsForC 
{
    display: block;
    color: aquamarine;
    text-align: center;
    padding: 16px 16px;
    text-decoration: none;
}
li a.optionsForC:hover:not(.active) {
    background-color: DarkSlateGrey ;
}

li a:active {
    background-color: #4CAF50;
}

li a.not(.active)
{
    background-color: yellow;
}

li a.active
{
    background-color: #111;
}
</style>
</head>
<body>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
    $(function(){
        $('a').each(function(){
            if ($(this).prop('href') == window.location.href) {
                $(this).addClass('active'); $(this).parents('li').addClass('active');
            }
            else
            {
            	$(this).addClass('not(.active)'); $(this).parents('li').addClass('not(.active)');
            }
        });
    });
</script>
<ul class="optionsForC">
  <!--<li class="optionsForC" style="float: left;"><p style="text-align: center;">&nbsp&nbsp&nbsp</p></li>-->
    <li class="optionsForC"><a class="optionsForC" href="HomePage.php" >Home</a></li>
  	<li class="optionsForC"><a class="optionsForC" href="RunningContest.php?CId=<?php echo $_GET['CId'] ?>" >Dashboard</a></li>
    <li class="optionsForC"><a class="optionsForC" href="ContestSubmissions.php?CId=<?php echo $_GET['CId'] ?>" >Submissions</a></li>
  	<li class="optionsForC"><a class="optionsForC" href="Standings.php?CId=<?php echo $_GET['CId'] ?>" >Standings</a></li>
  	<li class="optionsForC" style="float:right"><a class="optionsForC" style=" text-align:center;padding: 16px 8px;" href="Logout.php">(Logout)</a></li>
  	<li class="optionsForC" style="float:right"><p style="text-align: center;"><?php echo $_SESSION['teamName'] ?></p></li>
  	<li class="optionsForC" style="float: right;"><p style="text-align: center;">Welcome,&nbsp&nbsp</p></li>
</ul>

</body>
</html>
