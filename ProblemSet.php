<!DOCTYPE html>

<html>
<head>
  <title>Problem Set</title>
  <!--<link rel="stylesheet" type="text/css" href="linkStyle.css">-->
  <style>
    #sections01 
    {
      background-color: black;
        width:18%;
        float:left;
    }
    #sections02 
    {
      background-color: #fff0f0;
        width:82%;
        float:right;
        min-height: 600px;
    }
    div.fixed 
    {
      position: fixed;
      width: 18%;
    }
    table.user
    {
        border-collapse: collapse;
        background-color: #fff0f0;
        float: right;
    }
    tr.user{}
    td.user{}
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
        font-family: Harlow Solid;
        font-style: Semi Expanded Italic;
        font-size: 20px;
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
    a.set
    {
        color: #cc0044;
    }
    tr:nth-child(even).set{background-color: #eeeec3 }
    tr:nth-child(odd).set{background-color: #ccffff}
    tr.set:hover{background-color: #f1daf1 }
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
    include("OptionVol.php");
?>
<div id="sections01">
    <div>
        <div class="fixed">
            <table class="vol">
                <th class="vol" style="color:MediumOrchid ;border-top:10px solid LightSlateGray ;border-right: 10px solid LightSlateGray ;border-left: 10px solid LightSlateGray ;">VOLUME
                </th>
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
    <table class="user" width="100%">
        <tr class="user">
            <td class="user" style="border-top: 0px;border-right: 0px;border-left: 0px;border-bottom: 0px;padding: 0px">
            <div style="background-color: #fff0f0;">
                <h1 style="font-family: Monotype Corsiva;color:darkblue;text-align: center;">
                <b>The Total Set of Problems at a glance </b>
                </h1>
                <br>
    
                <table class="set" style="width: 70%" align="center">
                    <tr class="set" style="background-color: #e08585">
                    <th class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 20%;color: #0e1208">Problem Category</th>
                    <th class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 20%;color: #0e1208">Problem Id</th>
                    <th class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 30%;color: #0e1208">Problem Name</th>

                    </tr>
                </table>
                <br>
                <?php
                $center="center";
                $set="set";
                $desc="DescriptionPage.php";
                include("connection.php");
                $sql="SELECT problem_category,problem_id,problem_name
                      FROM problems
                      ORDER BY  FIELD(problem_category, 'Beginner','Medium','Hard','Advanced')";
                $rslt1=mysqli_query($conn,$sql);
                if(!isset($_GET['page'])) 
                {
                    $_GET['page']=0;
                }
                if(mysqli_num_rows($rslt1))
                {
                    if($conn->query($sql))
                    {
                        echo "<table class=$set align=$center>
                                <tr class=$set>
                                </tr>";
                        $cnt=0;
                        while($problem=mysqli_fetch_assoc($rslt1))
                        {
                            if($cnt>=($_GET['page']*20) and $cnt<(($_GET['page']*20)+20))
                            {
                                echo "<tr class=$set>
                                        <td class=$set width=20%>".$problem['problem_category']."</td>
                                        <td class=$set width=20%>";echo "<a href='".$desc."?name=".$problem['problem_name']."' style='color: #cc0044'>".$problem['problem_id']."</td>
                                        <td class=$set width=30%>";echo "<a href='".$desc."?name=".$problem['problem_name']."' style='color: #cc0044'>".$problem['problem_name']."</a></td>";
                                echo "</tr>";
                            }
                            $cnt++;
                        }
                        echo "</table>";
                    }
                    echo"<h4><a style='float: right; text-decoration: none;' href='Practice.php?";
                    if(isset($_GET['page']))
                    {
                        $k=$_GET['page'];
                        $k=$k+1;
                        echo "page=$k;'";
                    }
                    else echo "page=1;'";
                    if(($_GET['page']*20)+20<mysqli_num_rows($rslt1)){ echo ">Next&nbsp&nbsp&nbsp&nbsp&nbsp</a></h4>"; }
                    else{ echo "></a><h4>";}
                    if(isset($_GET['page']))
                    {
                        if($_GET['page']>0)
                        {
                            echo"<h4><a style='text-decoration: none' href='Practice.php?";
                            $k=$_GET['page'];
                            $k=$k-1;
                            echo "page=$k;'";
                            echo ">PREV&nbsp&nbsp&nbsp&nbsp&nbsp</a></h4>";
                        }
                    }
                }
                ?>
                <br>
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
            </div>
            </td>
        </tr>
  </table>
  <table class="user" style="border-top: 0px; border-right: 0px;border-left: 0px;border-bottom: 0px;padding: 0px;float: right;width: 82%">
      <tr class="user">
            <td class="user" style="border-top: 0px; border-right: 0px;border-left: 0px;border-bottom: 0px;padding: 0px;"><br><br><br><br><br><br></td>
      </tr>
    </table>
  </div>
  <?php include("footer.php") ?>

</body>
</html>