<?php 
        include("header.php");
        include("options.php");

        $teamName = $Contestant1 = $Contestant2 = $Contestant3 = "";
        $matchErr = "";
        include("connection.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $CId = $_GET['CId'];
            $teamName = $_POST['teamName'];
            $Contestant1 = $_POST['Contestant1'];
            $Contestant2 = $_POST['Contestant2'];
            $Contestant3 = $_POST['Contestant3'];
            $password_match = $_POST["password_match"];
            $team_password = $_POST["team_password"];

            $sql="SELECT Team_Name FROM team WHERE Team_Name='".$teamName."' and Cntst_Id='".$CId."' ";
            $result=$conn->query($sql);
            if($result->num_rows){ 
                $matchErr="Team name is in use."; 
            }
            else if ($password_match != $team_password) {
                $matchErr = "*Password does not match"; 
            }
            else{
                $sql = "INSERT INTO team(Team_Name, Team_Password, Cntst_Id, Contestant1, Contestant2, Contestant3) VALUES ('".$teamName."', '".$team_password."', '".$CId."', '".$Contestant1."', '".$Contestant2."', '".$Contestant3."')" ;
                if($conn->query($sql)) {
                    $sql = "INSERT INTO contestrank(contestId, tName, totalSolved, totalPenalty) VALUES('".$CId."', '".$teamName."', 0, 0)";
                    $conn->query($sql);
                    header("location: ContestHome.php");
                }
                else{
                    echo "WHY MAN WHY<br>";
                    echo $conn->error;
                }
            }
        }
?>
<!DOCTYPE html>
<html>
    <style>
    input[type=text],input[type=password], select {
        width: 50%;
        padding: 12px 20px;
        margin: 8px 0;
        font-size: 100%;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 63%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div.rfc {
        width: 50%;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 30px;
    }
    </style>
<body style="background-color: grey">
    <?php 
    ?>
    <div style="background-color: lightslategrey; height: 700px; padding-top: 60px; padding-bottom: 60px">
        <center>
        <div class="rfc">
            <?php
                $CId = $_GET['CId'];
                include("connection.php");
                $sql = "SELECT CName FROM contest WHERE CId = '".$CId."' ";
                $result=$conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    $CName = $row['CName'];
                    echo "<h1>Contest #".($CId-100000).": ".$CName."</h1>";
                }
            ?>
            <form method="post" action="RegisterForContest.php?CId=<?php echo $CId; ?>">
                <h2>Enter info</h2>
                <span><?php echo "<p style='color:red'>".$matchErr."</p>"; ?></span>
                Team name: <input type="text" id="teamName" name="teamName" maxlength="30" minlength="4" pattern="[A-Z a-z_0-9]{1,30}" required placeholder="Letters, numbers or underscore only..." value="<?php echo $teamName; ?>"> <br>
                Contestant1: <input type="text" id="Contestant1" name="Contestant1" maxlength="30" minlength="4" required pattern="[A-Z a-z.]{1,30}" placeholder="Letters and dot only..." value="<?php echo "$Contestant1"; ?>"><br>
                Contestant2: <input type="text" id="Contestant2" name="Contestant2" maxlength="30" minlength="4" required pattern="[A-Z a-z.]{1,30}" placeholder="Letters and dot only..." value="<?php echo "$Contestant2"; ?>"><br>
                Contestant3: <input type="text" id="Contestant3" name="Contestant3" maxlength="30" minlength="4" required pattern="[A-Z a-z.]{1,30}" placeholder="Letters and dot only..." value="<?php echo "$Contestant3"; ?>"><br>
                Password: &nbsp &nbsp <input type="password" id="team_password" name="team_password" minlength="4" maxlength="30" required pattern="[A-Z a-z_0-9]{1,30}" placeholder="Letters, numbers or underscore only..."> <br>
                Confirm: &nbsp &nbsp &nbsp <input type="password" id="password_match" name="password_match" required placeholder="Match password..."><br>
              
                <input type="submit" value="register">
            </form>
            <p>Already registered? <a href="LoginForContest.php?CId=<?php echo $CId; ?>";">login</a> here.</p>
        </div>
        </center>
    </div>
    <?php
        include("footer.php");
    ?>
</body>
</html>
