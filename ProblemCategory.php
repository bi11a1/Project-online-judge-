<!DOCTYPE html>

<html>
<head>
  <title>Problem Category</title>
  <!--<link rel="stylesheet" type="text/css" href="linkStyle.css">-->
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
        <b>Categorized Problem for </b><b><?php echo $_SESSION['user_name']?></b>
        </h1>
        <br><br>
        <table class="set" style="width: 75%" align="center">
            <tr class="set" style="height: 5px;background-color: #eda891">
                <th class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 18%;color: #0e1208">Category</th>
                <th class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 50%;color: #0e1208">List</th>
                <th class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;color: #0e1208">Problem Solved/Total</th>
                <th class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;color: #0e1208">Problem Solved/Tried</th>
            </tr>
        </table>
        <br>
        <table class="set" style="width: 75%;" align="center" >
        <tr class="set">
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 18%">Beginner</td>
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 50%"><a href="beginnersproblems.php" style="color: #cc0044">Beginners Problems</a></td>
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue">
            <table class="set" style="height: 10px" align="center">
                <tr class="set">
                    <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;">
                    <?php
                    include("connection.php");
                    $sql="SELECT COUNT(prob_id) AS no_of_solved
                          FROM problems,solve
                          WHERE problem_id=prob_id AND problem_category='Beginner' AND UName='".$_SESSION['user_name']."'";
                    $rslt1=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rslt1))
                    {
                        if($conn->query($sql))
                        {
                            while($problem=mysqli_fetch_assoc($rslt1))
                            {
                                echo $problem['no_of_solved'];
                            }
                        }
                    }
                    echo " / ";
                    $sql="SELECT COUNT(problem_id) AS total
                          FROM problems
                          WHERE problem_category='Beginner'";
                    $rslt1=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rslt1))
                    {
                        if($conn->query($sql))
                        {
                            while($problem=mysqli_fetch_assoc($rslt1))
                            {
                                echo $problem['total'];
                            }
                        }
                    }
                    ?>
                    </td>
                </tr>
            </table>
            </td>
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue">
            <table class="set" align="center">
                <tr class="set">
                    <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue">
                    <?php
                    include("connection.php");
                    $sql="SELECT COUNT(prob_id) AS no_of_solved
                          FROM problems,solve
                          WHERE problem_id=prob_id AND problem_category='Beginner' AND UName='".$_SESSION['user_name']."'";
                    $rslt1=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rslt1))
                    {
                        if($conn->query($sql))
                        {
                            while($problem=mysqli_fetch_assoc($rslt1))
                            {
                                echo $problem['no_of_solved'];
                            }
                        }
                    }
                    echo " / ";
                    $sql="SELECT COUNT(problemId) AS no_of_try
                          FROM problems,code
                          WHERE problemId=problem_id AND problem_category='Beginner' AND verdict<>'Accepted'";
                    $rslt1=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rslt1))
                    {
                        if($conn->query($sql))
                        {
                            while($problem=mysqli_fetch_assoc($rslt1))
                            {
                                echo $problem['no_of_try'];
                            }
                        }
                    }
                    ?>
                    </td>
                </tr>
            </table>
            </td>
        </tr>
    </table>
    <br>
    <table class="set" style="width: 75%" align="center">
        <tr class="set">
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 18%">Medium</td>
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 50%"><a href="mediumproblems.php" style="color: #cc0044">Medium hard Problems</a></td>
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue">
            <table class="set" align="center">
                <tr class="set">
                    <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;">
                    <?php
                    include("connection.php");
                    $sql="SELECT COUNT(prob_id) AS no_of_solved
                          FROM problems,solve
                          WHERE problem_id=prob_id AND problem_category='Medium' AND UName='".$_SESSION['user_name']."'";
                    $rslt1=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rslt1))
                    {
                        if($conn->query($sql))
                        {
                            while($problem=mysqli_fetch_assoc($rslt1))
                            {
                                echo $problem['no_of_solved'];
                            }
                        }
                    }
                    echo " / ";
                    $sql="SELECT COUNT(problem_id) AS total
                          FROM problems
                          WHERE problem_category='Medium'";
                    $rslt1=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rslt1))
                    {
                        if($conn->query($sql))
                        {
                            while($problem=mysqli_fetch_assoc($rslt1))
                            {
                                echo $problem['total'];
                            }
                        }
                    }
                    ?>
                    </td>
                </tr>
                </table>
            </td>
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue">
            <table class="set" align="center">
                <tr class="set">
                    <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue">
                    <?php
                    include("connection.php");
                    $sql="SELECT COUNT(prob_id) AS no_of_solved
                          FROM problems,solve
                          WHERE problem_id=prob_id AND problem_category='Medium' AND UName='".$_SESSION['user_name']."'";
                    $rslt1=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rslt1))
                    {
                        if($conn->query($sql))
                        {
                            while($problem=mysqli_fetch_assoc($rslt1))
                            {
                                echo $problem['no_of_solved'];
                            }
                        }
                    }
                    echo " / ";
                    $sql="SELECT COUNT(problemId) AS no_of_try
                          FROM problems,code
                          WHERE problemId=problem_id AND problem_category='Medium' AND verdict<>'Accepted'";
                    $rslt1=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rslt1))
                    {
                        if($conn->query($sql))
                        {
                            while($problem=mysqli_fetch_assoc($rslt1))
                            {
                                 echo $problem['no_of_try'];
                            }
                        }
                    }
                    ?>  
                    </td>
                </tr>
            </table>
            </td>
        </tr>
    </table>
    <br>
    <table class="set" style="width: 75%" align="center">
        <tr class="set">
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 18%">Hard</td>
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 50%"><a href="hardproblems.php" style="color: #cc0044">Hard Problems</a></td>
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue">
            <table class="set" align="center">
                <tr class="set">
                    <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;">
                    <?php
                    include("connection.php");
                    $sql="SELECT COUNT(prob_id) AS no_of_solved
                          FROM problems,solve
                          WHERE problem_id=prob_id AND problem_category='Hard' AND UName='".$_SESSION['user_name']."'";
                    $rslt1=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rslt1))
                    {
                        if($conn->query($sql))
                        {
                            while($problem=mysqli_fetch_assoc($rslt1))
                            {
                                echo $problem['no_of_solved'];
                            }
                        }
                    }
                    echo " / ";
                    $sql="SELECT COUNT(problem_id) AS total
                          FROM problems
                          WHERE problem_category='Hard'";
                    $rslt1=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rslt1))
                    {
                        if($conn->query($sql))
                        {
                            while($problem=mysqli_fetch_assoc($rslt1))
                            {
                                echo $problem['total'];
                            }
                        }
                    }
                    ?>
                    </td>
                </tr>
            </table>
            </td>
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue">
            <table class="set" align="center">
                <tr class="set">
                <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue">
                <?php
                include("connection.php");
                $sql="SELECT COUNT(prob_id) AS no_of_solved
                      FROM problems,solve
                      WHERE problem_id=prob_id AND problem_category='Hard' AND UName='".$_SESSION['user_name']."'";
                $rslt1=mysqli_query($conn,$sql);
                if(mysqli_num_rows($rslt1))
                {
                    if($conn->query($sql))
                    {
                        while($problem=mysqli_fetch_assoc($rslt1))
                        {
                            echo $problem['no_of_solved'];
                        }
                    }
                }
                echo " / ";
                $sql="SELECT COUNT(problemId) AS no_of_try
                      FROM problems,code
                      WHERE problemId=problem_id AND problem_category='Hard' AND verdict<>'Accepted'";
                $rslt1=mysqli_query($conn,$sql);
                if(mysqli_num_rows($rslt1))
                {
                    if($conn->query($sql))
                    {
                        while($problem=mysqli_fetch_assoc($rslt1))
                        {
                            echo $problem['no_of_try'];
                        }
                    }
                }
                ?>  
                </td>
            </tr>
            </table>
        </td>
    </tr>
    </table>
    <br>
    <table class="set" style="width: 75%" align="center">
        <tr class="set">
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 18%">Advanced</td>
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 50%"><a href="AdvancedProblems.php" style="color: #cc0044">Advanced Problems</a></td>
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue">
            <table class="set" align="center">
                <tr class="set">
                    <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;">
                    <?php
                    include("connection.php");
                    $sql="SELECT COUNT(prob_id) AS no_of_solved
                          FROM problems,solve
                          WHERE problem_id=prob_id AND problem_category='Advanced' AND UName='".$_SESSION['user_name']."'";
                    $rslt1=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rslt1))
                    {
                        if($conn->query($sql))
                        {
                            while($problem=mysqli_fetch_assoc($rslt1))
                            {
                                echo $problem['no_of_solved'];
                            }
                        }
                    }
                    echo " / ";
                    $sql="SELECT COUNT(problem_id) AS total
                          FROM problems
                          WHERE problem_category='Advanced'";
                    $rslt1=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rslt1))
                    {
                        if($conn->query($sql))
                        {
                            while($problem=mysqli_fetch_assoc($rslt1))
                            {
                                echo $problem['total'];
                            }
                        }
                    }
                    ?>
                    </td>
                </tr>
            </table>
            </td>
            <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;">
            <table class="set" align="center">
                <tr class="set">
                <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;">
                <?php
                include("connection.php");
                $sql="SELECT COUNT(prob_id) AS no_of_solved
                      FROM problems,solve
                      WHERE problem_id=prob_id AND problem_category='Advanced' AND UName='".$_SESSION['user_name']."'";
                $rslt1=mysqli_query($conn,$sql);
                if(mysqli_num_rows($rslt1))
                {
                    if($conn->query($sql))
                    {
                        while($problem=mysqli_fetch_assoc($rslt1))
                        {
                            echo $problem['no_of_solved'];
                        }
                    }
                }
                echo " / ";
                $sql="SELECT COUNT(problemId) AS no_of_try
                      FROM problems,code
                      WHERE problemId=problem_id AND problem_category='Advanced' AND verdict<>'Accepted'";
                $rslt1=mysqli_query($conn,$sql);
                if(mysqli_num_rows($rslt1))
                {
                    if($conn->query($sql))
                    {
                        while($problem=mysqli_fetch_assoc($rslt1))
                        {
                            echo $problem['no_of_try'];
                        }
                    }
                }
                ?>
                </td>
            </tr>
            </table>
        </td>
        </tr>
    </table>
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
    <?php include("footer.php") ?>
</body>
</html>