<!DOCTYPE html>

<?php
    include("connection.php");
    session_start();
    ob_start();
    if(!isset($_SESSION['user_name']))
    {
      header("location: LoginPage.php");
   }
?>

<html>
<head>
<style>
ul.options 
{
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li.options 
{
    float: left;
    color:aquamarine;
    display: block;
    text-align: center;
}

li a.options 
{
    display: block;
    color: aquamarine;
    text-align: center;
    padding: 16px 16px;
    text-decoration: none;
}
li a.options:hover:not(.active) 
{
    background-color: DarkSlateGrey;
}

li a:active 
{
    background-color: #4CAF50;
}

li a.not(.active) 
{
    background-color: yellow;
}

li a.active 
{
    background-color: black;
}
li a.active:hover
{
    background-color: black;
}
ul.dropbutton 
{
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li 
{
    float: left;
}

li a, .dropbutton 
{
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown1:hover .dropbutton 
{
    background-color: lightblue;
    text-decoration: none;
}

li.dropdown1 
{
    display: inline-block;
}

.dropdown1-content1 
{
    display: none;
    position: absolute;
    background-color: #17827d;
    min-width: 105px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown1-content1 a 
{
    color: lightblue;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown1-content1 a:hover {background-color: darkslategrey}

.dropdown1:hover .dropdown1-content1 
{
    display: block;
}

</style>
</head>
<body>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
    $(function()
    {
        $('a').each(function()
        {
            if ($(this).prop('href') == window.location.href) 
            {
                $(this).addClass('active'); $(this).parents('li').addClass('active');
            }
            else
            {
                $(this).addClass('not(.active)'); $(this).parents('li').addClass('not(.active)');
            }
        });
    });
</script>
<ul class="options">
  <li class="options"><a class="options" href="HomePage.php" >Home</a></li>
  <li class="options"><a class="options active" href="VolumeHome.php" >Volume</a></li>
  <li class="options"><a class="options" href="ContestHome.php">Contest</a></li>
  <li class="options"><a class="options" href="Credit.php">Credit</a></li>
  <li class="options" style="float:right"><a class="options" style=" text-align:center;padding: 16px 8px;" href="Logout.php">(Logout)</a></li>
  <li class="optios dropdown1" style="float:right"><a class="options dropbutton" style=" text-align:center;padding: 16px 6px;color: aquamarine;" href="javascript:void(0)"><?php echo $_SESSION['user_name']; ?></a>
     <div class="dropdown1-content1" id="Dropdown">
      <a href="UserStatistics.php">My Info</a>
      <a href="UpdateProfile.php">Edit Profile</a>
    </div>
    </li>
  <li class="options" style="float: right;"><p style="text-align: center;">Welcome,</p></li>
</ul>

</body>
</html>
