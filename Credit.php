<!DOCTYPE html>

<html>
<head>
    <title>Volume Home Page</title>
    <link rel="stylesheet" type="text/css" href="linkStyle.css">
    <style>
        #sections02 {
            background-color: #fff0f0;
            width:100%;
            float:left;
            height: 600px;
        }
        div.fixed {
            position: fixed;
            width: 18%;
        }
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
        include("Options.php");
    ?>
    
    <div id="sections02">
        <h1 style="font-family: Monotype Corsiva;color:darkblue;text-align: center;"><b>Credits</b></h1>
        <pre>
            <h3 style="font-size: 23px;color: DimGray;">            Developed and Maintained by:</h3>                            <i style="font-size: 18px">MD Billal Hossain</i>
                            <i style="font-size: 18px">Sabiha Anan</i>
        </pre>
            <h3 style="font-size: 23px;color: DimGray;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSpecial Thanks To:</h3>
            <i style="font-size: 16px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMrs.Rahma Bintey Mufiz Mukta</i> 
            <br>    
             <i style="font-size: 16px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMiss Farzana Yasmin</i>
             <br>
             <b style="font-size: 13px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLecturer, CUET</b>
             <br><br>
             <p style="font-size: 27px;font-family: Blackadder ITC;font-style: Bold Oblique">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFinally a big thanks to our family members,friends and well wisher who have inspired us all the time.</p>
    </div>
    <?php include("footer.php") ?>

</body>
</html>