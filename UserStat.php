<!DOCTYPE html>

<html>
<head>
  <title>User Statistics</title>
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
    #sections03{
      background-color: red;
      width: 10%;
      float: right;
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
    }

    th.set {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid LightSteelBlue;
        font-family: Informal Roman;
        font-style: Bold Oblique;
        font-size: 17px;
        color: #0e1208;
    }

    td.set{
      color: Sienna;
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
    tr:nth-child(odd).set{background-color: #efd9c2}
    tr.hov:hover{background-color:#f1daf1}
    table.hov { 
        border-collapse: collapse;
    }

    th.hov {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid LightSteelBlue;
    }

    td.hov{
      color: Sienna;
        padding: 8px;
        text-align: center;
        border-top: 1px solid LightSteelBlue;
        border-bottom: 1px solid LightSteelBlue;
        border-right: 1px solid LightSteelBlue;
        border-left: 1px solid LightSteelBlue;
        height: 5px;
    }
    a.hov{
      color: #cc0044;
    }
    tr:nth-child(even).hov{background-color: #eeeec3 }
    tr:nth-child(odd).hov{background-color: #efd9c2}
    tr.hov:hover{background-color:#f1daf1}
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
    <div id="sections02">
  <table class="user" style="width: 100%" align="center">
  <tr class="user">
  <td class="user" style="border-top: 0px;border-right: 0px;border-left: 0px;border-bottom: 0px;padding: 0px">
  <div style="background-color: #fff0f0">
    <h1 style="font-family: Monotype Corsiva;color:darkblue;text-align: center;">
      <b>User Statistics</b>
    </h1>
    <br>
    <table class="set" style="width: 70%;" align="center">
      <tr class="set">
        <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 7%">
        <?php
        include("connection.php");
        $sql = "SELECT image FROM user WHERE user_name='".$_GET['name']."'";
        $rslt1=mysqli_query($conn,$sql);
        while($image=mysqli_fetch_assoc($rslt1))
        {
          if($image['image']=="")
          {
            ?>
            <img width="110" style="float: center" src="<?php echo "images/default.jpg" ?>">
            <?php
          }
          else
          {
          ?>
          <img width="110" style="float: center" src="<?php echo $image['image']?>">
          <?php
          }
        }
        ?>
        </td>
        <td class="set" style="border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;width: 63%;">
        <table class="set" style="width: 70%">
        <tr class="set">
          <td class="set" style="border-top: 0px;border-right: 0px;border-left: 0px;border-bottom: 0px;text-align: left;">&nbsp&nbsp&nbsp <?php echo $_GET['name'];?></td>
        </tr>
        <tr class="set">
          <td class="set" style="border-top: 0px;border-right: 0px;border-left: 0px;border-bottom: 0px;text-align: left;font-family: Footlight MT;font-style: Light">
          &nbsp&nbsp&nbsp Join:
          <?php 
          $cnt=0;
            include("connection.php");
          $sql= "select TIMESTAMPDIFF(YEAR,reg_date,SYSDATE()) AS join_date_year,TIMESTAMPDIFF(MONTH,reg_date,SYSDATE()) AS join_date_month,TIMESTAMPDIFF(DAY,reg_date,SYSDATE()) AS join_date_day
             from user where user_name='".$_GET['name']."'";
          $rslt1=mysqli_query($conn, $sql);
          if(mysqli_num_rows($rslt1))
          {
            if($conn->query($sql))
            {
              while($user=mysqli_fetch_assoc($rslt1))
              {
                if($user['join_date_year']>0)
                {
                  echo $user['join_date_year'];
                  $cnt++;
                  if($user['join_date_year']>1)
                  {
                    echo " years";
                  }
                  else
                  {
                    echo " year";
                  }
                }
                if($user['join_date_month']>0)
                {
                  echo $user['join_date_month'];
                  $cnt++;
                  if($user['join_date_month']>1)
                  {
                    echo " months";
                  }
                  else
                  {
                    echo " month";
                  } 
                }
                if($user['join_date_day']>0)
                {
                  echo $user['join_date_day'];
                  $cnt++;
                  if($user['join_date_day']>1)
                  {
                    echo " days";
                  }
                  else
                  {
                    echo " day";
                  }
                }
                if($cnt>0)
                {
                  echo " ago";
                }
                else
                {
                  echo "Joined Today";
                }
              }
            }
          }
          ?>
          <br>
          &nbsp&nbsp&nbsp Institution:
          <?php
          include("connection.php");
          $sql="SELECT institution_name FROM user WHERE user_name='".$_GET['name']."'";
          $rslt1=mysqli_query($conn,$sql);
          if(mysqli_num_rows($rslt1)!=0)
          {
            if($conn->query($sql))
            {
              while ($user=mysqli_fetch_assoc($rslt1))
              {
                echo $user['institution_name'];
              }
            }
          }
          else
          {
            echo "NA";
          }
          ?>
          <br>
          &nbsp&nbsp&nbsp Country:
          <?php
          include("connection.php");
          $sql="SELECT country_name FROM user WHERE user_name='".$_GET['name']."'";
          $rslt1=mysqli_query($conn,$sql);
          if(mysqli_num_rows($rslt1)!=0)
          {
            if($conn->query($sql))
            {
              while ($user=mysqli_fetch_assoc($rslt1))
              {
                echo $user['country_name'];
              }
            }
          }
          else
          {
            echo "NA";
          }
          ?>
          </td>
        </tr>
        </table>
        </td>
      </tr>
    </table>
    <br><br>
    <h1 style="font-family: Monotype Corsiva;color:darkblue;text-align: center;">
      <b>SUM UP STATS</b>
    </h1>
    <table class="set" style="width: 40%" align="center">
      <tr class="set">
        <td class="set" style="text-align: center;font-family: Footlight MT;font-style: Light">
          Total Solved:
        </td>
        <td class="set" style="text-align: center">
          <?php
          include("connection.php");
          $sql="SELECT COUNT(prob_id) AS no_of_solve FROM solve WHERE UName='".$_GET['name']."'";
          $rslt1=mysqli_query($conn,$sql);
          if(mysqli_num_rows($rslt1))
          {
            if($conn->query($sql))
            {
              while($user=mysqli_fetch_assoc($rslt1))
              {
                echo $user['no_of_solve'];
              }
            }
          }
          ?>
        </td>
      </tr>
      <tr class="set">
        <td class="set" style="text-align: center;font-family: Footlight MT;font-style: Light">
          Total Tried:
        </td>
        <td class="set" style="text-align: center;">
          <?php
          include("connection.php");
          $sql="SELECT COUNT(submission_id) AS no_of_try FROM code WHERE U_name='".$_GET['name']."' AND verdict<>'Accepted'";
          $rslt1=mysqli_query($conn,$sql);
          if(mysqli_num_rows($rslt1))
          {
            if($conn->query($sql))
            {
              while($user=mysqli_fetch_assoc($rslt1))
              {
                echo $user['no_of_try'];
              }
            }
          }
          ?>
        </td>
      </tr>
      <tr class="set">
        <td class="set" style="text-align: center;font-family: Footlight MT;font-style: Light">
          Total Accepted:
        </td>
        <td class="set" style="text-align: center;">
          <?php
          include("connection.php");
          $sql="SELECT COUNT(submission_id) AS no_of_solve FROM code WHERE U_name='".$_GET['name']."' AND verdict='Accepted'";
          $rslt1=mysqli_query($conn,$sql);
          if(mysqli_num_rows($rslt1))
          {
            if($conn->query($sql))
            {
              while($user=mysqli_fetch_assoc($rslt1))
              {
                echo $user['no_of_solve'];
              }
            }
          }
          ?>
        </td>
      </tr>
      <tr class="set">
        <td class="set" style="text-align: center;font-family: Footlight MT;font-style: Light">
          Total Submission:
        </td>
        <td class="set" style="text-align: center;">
          <?php
          include("connection.php");
          $sql="SELECT COUNT(submission_id) AS no_of_submit FROM code WHERE U_name='".$_GET['name']."'";
          $rslt1=mysqli_query($conn,$sql);
          if(mysqli_num_rows($rslt1))
          {
            if($conn->query($sql))
            {
              while($user=mysqli_fetch_assoc($rslt1))
              {
                echo $user['no_of_submit'];
              }
            }
          }
          ?>
        </td>
      </tr>
      <tr class="set">
        <td class="set" style="text-align: center;font-family: Footlight MT;font-style: Light">
          Rank:
        </td>
        <td class="set" style="text-align: center;font-family: Footlight MT;font-style: Light">
          <?php
          include("connection.php");
          $sql="SELECT rank FROM ranklist WHERE uname='".$_GET['name']."'";
          $rslt1=mysqli_query($conn,$sql);
          if(mysqli_num_rows($rslt1))
          {
            if($conn->query($sql))
            {
              while($user=mysqli_fetch_assoc($rslt1))
              {
                echo $user['rank'];
              }
            }
          }
          else
          {
              echo "NA";
          }
          ?>
        </td>
      </tr>
    </table>
    <br><br>
    <h1 style="font-family: Monotype Corsiva;color:darkblue;text-align: center;">
      <b>Solved List</b>
    </h1>
    <?php
    $center="center";
    $desc="DescriptionPage.php";
    $hov="hov";
    include("connection.php");
    $sql="SELECT prob_id,problem_name
             FROM solve,problems
             WHERE prob_id=problem_id AND UName='".$_GET['name']."'";
    $rslt1=mysqli_query($conn,$sql);
    if(!isset($_GET['page'])) 
      {
          $_GET['page']=0;
      }
    if(mysqli_num_rows($rslt1)!=0)
    {
      if($conn->query($sql))
      {
        ?>
        <table class="set" align="center" style="width: 40%">
      <tr class="set" style="background-color: #f48662">
        <th class="set" style="border-top: 1px solid LightSteelBlue;border-bottom: 1px solid LightSteelBlue;border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;height: 5px;width: 20%;">Problem Id</th>
        <th class="set" style="border-top: 1px solid LightSteelBlue;border-bottom: 1px solid LightSteelBlue;border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;height: 5px;width: 20%;">Problem Name</th>
      </tr>
    </table>
    <?php
        echo "<table class=$hov width=40% align=$center>
              <tr class=$hov>
                </tr>";
        $cnt=0;
        while($problem=mysqli_fetch_assoc($rslt1))
        {
          if($cnt>=($_GET['page']*10) and $cnt<(($_GET['page']*10)+10))
                {
            echo "<tr class=$hov>
                <td class=$hov width=20% align=$center>";echo "<a href='".$desc."?name=".$problem['problem_name']."' style='color: #cc0044'>".$problem['prob_id']."</td>
                <td class=$hov width=20% align=$center>";echo "<a href='".$desc."?name=".$problem['problem_name']."' style='color: #cc0044'>".$problem['problem_name']."</a></td>";
            echo "</tr>";
          }
          $cnt++;
        }
        echo "</table>";
      }
      echo"<h4><a style='float: right; text-decoration: none;' href='UserStat.php?";
          if(isset($_GET['page'])){
              $k=$_GET['page'];
              $k=$k+1;
              echo "page=$k;'";
          }
          else echo "page=1;'";
          if(($_GET['page']*10)+10<mysqli_num_rows($rslt1)){ echo ">Next&nbsp&nbsp&nbsp&nbsp&nbsp</a></h4>"; }
          else{ echo "></a><h4>";}
          if(isset($_GET['page'])){
              if($_GET['page']>0){
              echo"<h4><a style='text-decoration: none' href='UserStat.php?";
              $k=$_GET['page'];
              $k=$k-1;
              echo "page=$k;'";
              echo ">&nbsp&nbsp&nbsp&nbsp&nbspPrev</a></h4>";
            }
        }
    }
  else
  {
     ?> <h3 align="center" style="font-family: Kunstler Script;font-style: Bold Oblique;font-size: 35px">You are yet to solve a problem</h3>
     <?php
  }
  ?>
    <br><br>
    <h1 style="font-family: Monotype Corsiva;color:darkblue;text-align: center;">
      <b>Tried List</b>
    </h1>
    <?php
    $center="center";
    $desc="DescriptionPage.php";
    $hov="hov";
    include("connection.php");
    $sql="SELECT DISTINCT problemId,problem_name
             FROM code,problems
             WHERE problemId=problem_id AND U_name='".$_GET['name']."' AND verdict<>'Accepted'";
    $rslt1=mysqli_query($conn,$sql);
    if(!isset($_GET['page1'])) 
      {
          $_GET['page1']=0;
      }
    if(mysqli_num_rows($rslt1)!=0)
    {
      if($conn->query($sql))
      {
        ?>
        <table class="set" align="center" style="width: 50%">
      <tr class="set" style="background-color: #f48662">
        <th class="set" style="border-top: 1px solid LightSteelBlue;border-bottom: 1px solid LightSteelBlue;border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;height: 5px;width: 20%;">Problem Id</th>
        <th class="set" style="border-top: 1px solid LightSteelBlue;border-bottom: 1px solid LightSteelBlue;border-right: 1px solid LightSteelBlue;border-left: 1px solid LightSteelBlue;height: 5px;width: 20%;">Problem Name</th>
      </tr>
    </table>
    <?php
        echo "<table class=$hov width=50% align=$center>
              <tr class=$hov>
                </tr>";
        $cnt=0;
        while($problem=mysqli_fetch_assoc($rslt1))
        {
          if($cnt>=($_GET['page1']*10) and $cnt<(($_GET['page1']*10)+10))
                {
          echo "<tr class=$hov>
                <td class=$hov width=20% align=$center>";echo "<a href='".$desc."?name=".$problem['problem_name']."' style='color: #cc0044'>".$problem['problemId']."</td>
                <td class=$hov width=20% align=$center>";echo "<a href='".$desc."?name=".$problem['problem_name']."' style='color: #cc0044'>".$problem['problem_name']."</a></td>";
          echo "</tr>";
        }
        $cnt++;
      }
        echo "</table>";
      }
      echo"<h4><a style='float: right; text-decoration: none; color: #cc0044' href='UserStat.php?";
          if(isset($_GET['page1'])){
              $k=$_GET['page1'];
              $k=$k+1;
              echo "page1=$k;'";
          }
          else echo "page1=1;'";
          if(($_GET['page1']*10)+10<mysqli_num_rows($rslt1)){ echo ">Next&nbsp&nbsp&nbsp&nbsp&nbsp</a></h4>"; }
          else{ echo "></a><h4>";}
          if(isset($_GET['page1'])){
              if($_GET['page1']>0){
              echo"<h4><a style='text-decoration: none;color: #cc0044' href='UserStat.php?";
              $k=$_GET['page1'];
              $k=$k-1;
              echo "page1=$k;'";
              echo ">&nbsp&nbsp&nbsp&nbsp&nbspPrev</a></h4>";
            }
        }
    }
    else
    {
      ?> <h3 align="center" style="font-family: Kunstler Script;font-style: Bold Oblique;font-size: 35px">No Problem in the Try List</h3>
      <?php
    }
    ?>
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