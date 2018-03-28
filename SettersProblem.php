<!DOCTYPE html>

<html>
<head>
  <title>Problem Set</title>
  <!--<link rel="stylesheet" type="text/css" href="linkStyle.css">-->
  <style>
    #sections01 {
      background-color: black;
        width:18%;
        float:left;
    }
    #sections02 {
      background-color: #fff0f0;
        width:82%;
        float:right;
        min-height: 600px;
    }
    div.fixed {
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
    table.set { 
        border-collapse: collapse;
        width: 75%;
    }

    th.set {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid LightSteelBlue;
        font-family: Monotype Corsiva;
        font-style: Italic Bold;
        font-size: 17px;
    }

    td.set{
      color: red;
        padding: 8px;
        text-align: center;
        border-top: 1px solid LightSteelBlue;
        border-bottom: 1px solid LightSteelBlue;
        border-right: 1px solid LightSteelBlue;
        border-left: 1px solid LightSteelBlue;
        height: 5px;
    }
    a.set{
      color: #cc0044;
    }
    tr:nth-child(even).set{background-color: #eeeec3 }
    table:nth-child(odd).set{background-color: #f3d8d8}
    tr.set:hover{background-color:#f1daf1}
    table.vol { 
        border-collapse: collapse;
        width: 100%;
    }

    th.vol {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }
    tr:hover.vol {
        text-decoration: none;
    }
    td a.vol{
      color: aquamarine;
    }
    a:link.vol{
      
      text-decoration:none; 
    }
    a:hover.vol {
      background-color: DarkSlateGrey;
    }
    td a.vol {
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
          <td class="vol"><a class="vol" href="">User Statistics</a></td>
        </tr>
          <th class="vol" style="height:5px;border-bottom: 10px solid LightSlateGray ;border-right: 10px solid LightSlateGray ;border-left: 10px solid LightSlateGray;"></th>
      </table>
    </div>
    </div>
  </div>
  <div id="sections02">
  <table class="user" style="width: 100%">
  <tr class="user">
  <td class="user" style="border-top: 0px;border-right: 0px;border-left: 0px;border-bottom: 0px;padding: 0px">
  <div style="background-color: #fff0f0">
    <h1 style="font-family: Monotype Corsiva;color:darkblue;text-align: center;">
      <b><?php echo $_GET['name'];?></b><b>'s problems List for </b><b><?php echo $_SESSION['user_name']?></b>
    </h1>
    <br>
    
    <table class="set" style="width: 75%;" align="center">
      <tr class="set" style="background-color: #d6d6fa">
        <th class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 13%;color: #0e1208">Submit</th>
        <th class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 15%;color: #0e1208">Problem Id</th>
        <th class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 40%;color: #0e1208">Problem Name</th>
        <th class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 18%;color: #0e1208">User Solved/Tried</th>
        <th class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;color: #0e1208">Submission Accepted</th>
      </tr>
    </table>
    <br>
    <?php
    $submit="Submit";
    $Submission="SubmissionPage.php";
    $desc="DescriptionPage.php";
    $center="center";
    $color="#cc0044";
    $set="set";
    include("connection.php");
    $sql="SELECT problem_id,problem_name FROM problems WHERE problem_setter='".$_GET['name']."'";
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
        while($problem=mysqli_fetch_assoc($rslt1))
        {
          echo "<tr class=$set>
                <td class=$set width=13%>";echo "<a href='".$Submission."' style='color: #cc0044'>$submit</a></td>
                <td class=$set width=15%>";echo "<a href='".$desc."?name=".$problem['problem_name']."' style='color: #cc0044'>".$problem['problem_id']."</td>
                <td class=$set width=40%>";echo "<a href='".$desc."?name=".$problem['problem_name']."' style='color: #cc0044'>".$problem['problem_name']."</a></td>";
                $query="SELECT COUNT(prob_id) AS no_of_solve
                    FROM problems,Solve
                    WHERE prob_id='".$problem['problem_id']."' AND UName='".$_SESSION['user_name']."' AND problem_name='".$problem['problem_name']."'";
                $rslt2=mysqli_query($conn,$query);
                if(mysqli_num_rows($rslt2))
                {
                    if($conn->query($query))
                    {
                    while($solve=mysqli_fetch_assoc($rslt2))
                    {
                      $result=$solve['no_of_solve'];
                    }
                  }
                }
                $query1="SELECT COUNT(problemId) AS no_of_try
                     FROM code
                     WHERE problemId='".$problem['problem_id']."' AND U_name='".$_SESSION['user_name']."' AND verdict<>'Accepted'";
                $rslt3=mysqli_query($conn,$query1);
                if(mysqli_num_rows($rslt3))
                {
                  if($conn->query($query1))
                  {
                    while($try=mysqli_fetch_assoc($rslt3))
                    {
                      $result1=$try['no_of_try'];
                    }
                  }
                }
                $query2="SELECT COUNT(problemId) AS solve
                     FROM code
                     WHERE problemId='".$problem['problem_id']."' AND U_name='".$_SESSION['user_name']."' AND verdict='Accepted'";
                $rslt4=mysqli_query($conn,$query2);
                if(mysqli_num_rows($rslt4))
                {
                  if($conn->query($query2))
                  {
                    while($solved=mysqli_fetch_assoc($rslt4))
                    {
                      $result2=$solved['solve'];
                    }
                  }
                }
                echo "<td class=$set width=18%><table class=$set align=$center>
                    <tr class=$set>
                      <td class=$set>$result / $result1</td>
                    </tr>
                </table>
                <td class=$set><table class=$set align=$center>
                    <tr class=$set>
                      <td class=$set>$result2</td>
                    </tr>
                </table>
            </tr>";
        }
        echo "</table>";
      }
      echo"<h4><a style='float: right; text-decoration: none;' href='Practice.php?";
        if(isset($_GET['page'])){
          $k=$_GET['page'];
          $k=$k+1;
          echo "page=$k;'";
        }
        else echo "page=1;'";
        if(($_GET['page']*20)+20<mysqli_num_rows($rslt1)){ echo ">Next&nbsp&nbsp&nbsp&nbsp&nbsp</a></h4>"; }
        else{ echo "></a><h4>";}
        if(isset($_GET['page'])){
          if($_GET['page']>0){
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