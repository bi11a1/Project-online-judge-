<!DOCTYPE html>

<html>
<head>
	<title>Update Profile</title>
	<link rel="stylesheet" type="text/css" href="linkStyle.css">
	<style>
		table 
		{
			border-collapse: collapse;
		}

		tr 
		{
			height: 5px;
		}

		td 
		{
			padding: 2px;
			color: lightcyan;
			text-align: center;
		}
	</style>
</head>
<body>
<?php
	include("connection.php");
	include("header.php");
	include("Options.php");
?>
<?php
		// define variables and set to empty values
		$user_pass = $user_passwordErr = $password_matchErr = $institution_nameErr= "";
		$user_password = $password_match = $institution_name= "";

		$cnt=0;
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			$sql= "select user_password from user where user_name='".$_SESSION['user_name']."'";
			$rslt1=mysqli_query($conn, $sql);
			if(mysqli_num_rows($rslt1))
			{
				if($conn->query($sql))
				{
					while($user=mysqli_fetch_assoc($rslt1))
					{
						if($user['user_password']==$_POST["user_password1"])
						{
							$cnt++;
						}
						else if($_POST["user_password1"]=="")
						{
							$user_pass="Current password is required";
						}
						else
						{
							$user_pass="Invalid password";
						}
					}
				}
			}
			if($cnt==1)
			{
		   		if(empty($_POST["user_password"]))
		   		{
		   			$user_passwordErr = "Password is required";
		   		}
		   	    else 
		   	    {
		   			$user_password = test_input($_POST["user_password"]);
		   			if(strlen($user_password)<5)
		   			{
		   				$user_passwordErr = "Password length must be atleast five"; 
		   			} 
		   			else if (!preg_match("/^[a-zA-Z0-9]*$/",$user_password)) 
		   			{
		       			$user_passwordErr = "Only letters and numbers are allowed";
		     		} 
		     		else 
		     		{ 
		     			$cnt++; 
		     		}
		   		}

		   		if($cnt==2)
		   		{
		   			if(empty($_POST["password_match"]))
		   			{
		   				$password_matchErr = "Confirm password";
		   			}	 
		   			else 
		   			{
		   				$password_match = test_input($_POST["password_match"]);
		   				if ($password_match!=$user_password) 
		   				{	
		       				$password_matchErr = "Password not matched"; 
		    			}	 
		    			else 
		    			{ 
		    				$cnt++; 
		    			}
					}
				}
				else
				{
					$passwor_matchErr="";
				}
			if($cnt==3)
			{
		   		include("connection.php");

		   		$sql="UPDATE user SET user_password='$_POST[user_password]' WHERE user_name='".$_SESSION['user_name']."'";
	    		$rslt1=mysqli_query($conn,$sql);				}
			}   
		}
		function test_input($data) 
		{
	   		$data = trim($data);
	  		$data = stripslashes($data);
 			$data = htmlspecialchars($data);
	   		return $data;
		}
?>



<div>
  	<div style="height: 570px;width: 15%; background-color:SeaGreen; float: left;"></div>
  	<div style="height: 570px; width: 15%; background-color:SeaGreen; float: right;"></div>
  	<div style="height: 570px; width: 70%; background-color:Lavender; float: left;">
  	<h1 style="font-size:170%;font-family:Snap ITC;color:darkslategrey"><center> Edit Personal Info</center></h1>
  		<div style="height: 530px; width: 15%; ; float: left">
  			
  		</div>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
		<table align="left" width="70%">
		<br>
		  	<tr>
				<td style=" border-top: 1px solid LightGreen;border-left: 1px solid LightGreen; color:DarkCyan ">
					User name:
				</td>
				<td style=" border-top: 1px solid LightGreen;border-left: 1px solid LightGreen; color:DarkCyan ">
					<?php echo $_SESSION['user_name'];?>
				</td>
				<td style="border-top: 1px solid LightGreen;border-right: 1px solid LightGreen;border-left: 1px solid LightGreen;width: 40%"></td>
			</tr>
			<tr></tr>
		   	<tr>
				<td style=" border-top: 1px solid LightGreen;border-left: 1px solid LightGreen; color:DarkCyan ">
					E-mail:
				</td>
				<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen; color:DarkCyan ">
		   			<?php 

						include("connection.php");
						$sql= "select email from user where user_name='".$_SESSION['user_name']."'";
						$rslt1=mysqli_query($conn, $sql);
						if(mysqli_num_rows($rslt1))
						{
							if($conn->query($sql))
							{
								while($user=mysqli_fetch_assoc($rslt1))
								{
									echo $user['email'];
								}
							}
						}
					?>
	
				</td>
				<td style="border-top: 1px solid LightGreen;border-right: 1px solid LightGreen;border-left: 1px solid LightGreen;width: 40%"></td>
			</tr>
			<tr></tr>
		   	<tr>
				<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ">
					Current Password:
				</td>
				<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ">
					<input maxlength="50" style="border:ridge;border-color:LightBlue; width: 200px" placeholder="Enter Password" type="password" name="user_password1" value="<?php ?>">
				</td>
				<td  style="border-top: 1px solid LightGreen;border-right: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ;width: 40%">
					<span class="error" style="float: center"> <?php echo $user_pass;?></span>
				</td>
			</tr>
			<tr></tr>
		   	<tr>
				<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ">
					New Password:
				</td>
				<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ">
					<input maxlength="50" style="border:ridge;border-color:LightBlue; width: 200px" placeholder="Enter your password" type="password" name="user_password" value="<?php ?>">
				</td>
				<td style="border-top: 1px solid LightGreen;border-right: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ;width: 40%">
					<div style="float: center"> <?php echo "Atleast 5 characters";?></div>
				</td>
			</tr>
			<tr></tr>
		   	<tr>
				<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ">
					Confirm Password:
				</td>
				<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ">
					<input maxlength="50" style="border:ridge;border-color:LightBlue; width: 200px" placeholder="Confirm password" type="password" name="password_match" value="<?php ?>">
				</td>
				<td style="border-top: 1px solid LightGreen;border-right: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ;width: 40%">
					<span class="error" style="float: center"> <?php echo $password_matchErr;?></span>
				</td>
			</tr>
			<tr></tr>
			<tr>
				<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ">
					Institution:
				</td>
				<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ">	
					<input maxlength="70" style="border:ridge;border-color:LightBlue; width: 200px" placeholder="Enter institution name" type="text" name="institution_name" value="">
					<!--<span class="error"> <?php //echo $user_nameErr;?></span>-->
					<?php
					$cnt=0;
					if ($_SERVER["REQUEST_METHOD"] == "POST") 
					{
						$sql= "select user_password from user where user_name='".$_SESSION['user_name']."'";
						$rslt1=mysqli_query($conn, $sql);
						if(mysqli_num_rows($rslt1))
						{
							if($conn->query($sql))
							{
								while($user=mysqli_fetch_assoc($rslt1))
								{
									if($user['user_password']==$_POST["user_password1"])
									{
										$cnt++;
									}
									else if($_POST["user_password1"]=="")
									{
										$user_pass="Current password is required";
									}
									else
									{
										$user_pass="Invalid password";
									}
								}
							}
						}
            			if($cnt==1)
            			{
		   					if(empty($_POST["institution_name"]))
		   					{
		   						$institution_nameErr = "name is required";
		   					} 
		   					else 
		   					{
		   						$institution_name = test_input($_POST["institution_name"]);
		   						if (!preg_match("/^[a-z A-Z 0-9]*$/",$institution_name)) 
		   						{
		       						$institution_nameErr = "Only letters and numbers are allowed";
		     					} 
		     					else 
		     					{ 
		     						$cnt++; 
		     					}
		   					}
		   					if($cnt==2)
		   					{
			   					include("connection.php");

			    				$sql="UPDATE user SET institution_name='$_POST[institution_name]' WHERE user_name='".$_SESSION['user_name']."'";
			    				$rslt1=mysqli_query($conn,$sql);
							}
						}
					}
					?>   
				</td>
				<td style="border-top: 1px solid LightGreen;border-right: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ;width: 40%">
					<span class="error" style="float: center"> <?php echo $institution_nameErr;?></span>
				</td>
			</tr>
			<tr>
				<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ">
					Country:
				</td>
				<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ">	
					<select id="country" name="country_name" style="border:ridge; border-color:LightBlue; width: 210px">
									<option value="AFGHANISTAN" >AFGHANISTAN</option>
									<option value="ALBANIA" >ALBANIA</option>
									<option value="ALGERIA" >ALGERIA</option>
									<option value="AMERICAN SAMOA" >AMERICAN SAMOA</option>
									<option value="ANDORRA" >ANDORRA</option>
									<option value="ANGOLA" >ANGOLA</option>
									<option value="ANGUILLA" >ANGUILLA</option>
									<option value="ANTARCTICA" >ANTARCTICA</option>
									<option value="ANTIGUA AND BARBUDA" >ANTIGUA AND BARBUDA</option>
									<option value="ARGENTINA" >ARGENTINA</option>
									<option value="ARMENIA" >ARMENIA</option>
									<option value="ARUBA" >ARUBA</option>
									<option value="AUSTRALIA" >AUSTRALIA</option>
									<option value="AUSTRIA" >AUSTRIA</option>
									<option value="AZERBAIJAN" >AZERBAIJAN</option>
									<option value="BAHAMAS" >BAHAMAS</option>
									<option value="BAHRAIN" >BAHRAIN</option>
									<option value="BANGLADESH" selected="yes">BANGLADESH</option>
									<option value="BARBADOS" >BARBADOS</option>
									<option value="BELARUS" >BELARUS</option>
									<option value="BELGIUM" >BELGIUM</option>
									<option value="BELIZE" >BELIZE</option>
									<option value="BENIN" >BENIN</option>
									<option value="BERMUDA" >BERMUDA</option>
									<option value="BHUTAN" >BHUTAN</option>
									<option value="BOLIVIA" >BOLIVIA</option>
									<option value="BOSNIA AND HERZEGOVINA" >BOSNIA AND HERZEGOVINA</option>
									<option value="BOTSWANA" >BOTSWANA</option>
									<option value="BOUVET ISLAND" >BOUVET ISLAND</option>
									<option value="BRAZIL" >BRAZIL</option>
									<option value="BRITISH INDIAN OCEAN TERRITORY" >BRITISH INDIAN OCEAN TERRITORY</option>
									<option value="BRUNEI DARUSSALAM" >BRUNEI DARUSSALAM</option>
									<option value="BULGARIA" >BULGARIA</option>
									<option value="BURKINA FASO" >BURKINA FASO</option>
									<option value="BURUNDI" >BURUNDI</option>
									<option value="CAMBODIA" >CAMBODIA</option>
									<option value="CAMEROON" >CAMEROON</option>
									<option value="CANADA" >CANADA</option>
									<option value="CAPE VERDE" >CAPE VERDE</option>
									<option value="CAYMAN ISLANDS" >CAYMAN ISLANDS</option>
									<option value="CENTRAL AFRICAN REPUBLIC" >CENTRAL AFRICAN REPUBLIC</option>
									<option value="CHAD" >CHAD</option>
									<option value="CHILE" >CHILE</option>
									<option value="CHINA" >CHINA</option>
									<option value="CHRISTMAS ISLAND" >CHRISTMAS ISLAND</option>
									<option value="COCOS (KEELING) ISLANDS" >COCOS (KEELING) ISLANDS</option>
									<option value="COLOMBIA" >COLOMBIA</option>
									<option value="COMOROS" >COMOROS</option>
									<option value="CONGO" >CONGO</option>
									<option value="CONGO, THE DEMOCRATIC REPUBLIC OF THE" >CONGO, THE DEMOCRATIC REPUBLIC OF THE</option>
									<option value="COOK ISLANDS" >COOK ISLANDS</option>
									<option value="COSTA RICA" >COSTA RICA</option>
									<option value="COTE D IVOIRE" >COTE D IVOIRE</option>
									<option value="CROATIA" >CROATIA</option>
									<option value="CUBA" >CUBA</option>
									<option value="CYPRUS" >CYPRUS</option>
									<option value="CZECH REPUBLIC" >CZECH REPUBLIC</option>
									<option value="DENMARK" >DENMARK</option>
									<option value="DJIBOUTI" >DJIBOUTI</option>
									<option value="DOMINICA" >DOMINICA</option>
									<option value="DOMINICAN REPUBLIC" >DOMINICAN REPUBLIC</option>
									<option value="EAST TIMOR" >EAST TIMOR</option>
									<option value="ECUADOR" >ECUADOR</option>
									<option value="EGYPT" >EGYPT</option>
									<option value="EL SALVADOR" >EL SALVADOR</option>
									<option value="EQUATORIAL GUINEA" >EQUATORIAL GUINEA</option>
									<option value="ERITREA" >ERITREA</option>
									<option value="ESTONIA" >ESTONIA</option>
									<option value="ETHIOPIA" >ETHIOPIA</option>
									<option value="FALKLAND ISLANDS (MALVINAS)" >FALKLAND ISLANDS (MALVINAS)</option>
									<option value="FAROE ISLANDS" >FAROE ISLANDS</option>
									<option value="FIJI" >FIJI</option>
									<option value="FINLAND" >FINLAND</option>
									<option value="FRANCE" >FRANCE</option>
									<option value="FRENCH GUIANA" >FRENCH GUIANA</option>
									<option value="FRENCH POLYNESIA" >FRENCH POLYNESIA</option>
									<option value="FRENCH SOUTHERN TERRITORIES" >FRENCH SOUTHERN TERRITORIES</option>
									<option value="GABON" >GABON</option>
									<option value="GAMBIA" >GAMBIA</option>
									<option value="GEORGIA" >GEORGIA</option>
									<option value="GERMANY" >GERMANY</option>
									<option value="GHANA" >GHANA</option>
									<option value="GIBRALTAR" >GIBRALTAR</option>
									<option value="GREECE" >GREECE</option>
									<option value="GREENLAND" >GREENLAND</option>
									<option value="GRENADA" >GRENADA</option>
									<option value="GUADELOUPE" >GUADELOUPE</option>
									<option value="GUAM" >GUAM</option>
									<option value="GUATEMALA" >GUATEMALA</option>
									<option value="GUINEA" >GUINEA</option>
									<option value="GUINEA-BISSAU" >GUINEA-BISSAU</option>
									<option value="GUYANA" >GUYANA</option>
									<option value="HAITI" >HAITI</option>
									<option value="HEARD ISLAND AND MCDONALD ISLANDS" >HEARD ISLAND AND MCDONALD ISLANDS</option>
									<option value="HOLY SEE (VATICAN CITY STATE)" >HOLY SEE (VATICAN CITY STATE)</option>
									<option value="HONDURAS" >HONDURAS</option>
									<option value="HONG KONG" >HONG KONG</option>
									<option value="HUNGARY" >HUNGARY</option>
									<option value="ICELAND" >ICELAND</option>
									<option value="INDIA" >INDIA</option>
									<option value="INDONESIA" >INDONESIA</option>
									<option value="IRAN, ISLAMIC REPUBLIC OF" >IRAN, ISLAMIC REPUBLIC OF</option>
									<option value="IRAQ" >IRAQ</option>
									<option value="IRELAND" >IRELAND</option>
									<option value="ITALY" >ITALY</option>
									<option value="JAMAICA" >JAMAICA</option>
									<option value="JAPAN" >JAPAN</option>
									<option value="JORDAN" >JORDAN</option>
									<option value="KAZAKSTAN" >KAZAKSTAN</option>
									<option value="KENYA" >KENYA</option>
									<option value="KIRIBATI" >KIRIBATI</option>
									<option value="KOREA DEMOCRATIC PEOPLES REPUBLIC OF" >KOREA DEMOCRATIC PEOPLES REPUBLIC OF</option>
									<option value="KOREA REPUBLIC OF" >KOREA REPUBLIC OF</option>
									<option value="KUWAIT" >KUWAIT</option>
									<option value="KYRGYZSTAN" >KYRGYZSTAN</option>
									<option value="LAO PEOPLES DEMOCRATIC REPUBLIC" >LAO PEOPLES DEMOCRATIC REPUBLIC</option>
									<option value="LATVIA" >LATVIA</option>
									<option value="LEBANON" >LEBANON</option>
									<option value="LESOTHO" >LESOTHO</option>
									<option value="LIBERIA" >LIBERIA</option>
									<option value="LIBYAN ARAB JAMAHIRIYA" >LIBYAN ARAB JAMAHIRIYA</option>
									<option value="LIECHTENSTEIN" >LIECHTENSTEIN</option>
									<option value="LITHUANIA" >LITHUANIA</option>
									<option value="LUXEMBOURG" >LUXEMBOURG</option>
									<option value="MACAU" >MACAU</option>
									<option value="MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF" >MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF</option>
									<option value="MADAGASCAR" >MADAGASCAR</option>
									<option value="MALAWI" >MALAWI</option>
									<option value="MALAYSIA" >MALAYSIA</option>
									<option value="MALDIVES" >MALDIVES</option>
									<option value="MALI" >MALI</option>
									<option value="MALTA" >MALTA</option>
									<option value="MARSHALL ISLANDS" >MARSHALL ISLANDS</option>
									<option value="MARTINIQUE" >MARTINIQUE</option>
									<option value="MAURITANIA" >MAURITANIA</option>
									<option value="MAURITIUS" >MAURITIUS</option>
									<option value="MAYOTTE" >MAYOTTE</option>
									<option value="MEXICO" >MEXICO</option>
									<option value="MICRONESIA, FEDERATED STATES OF" >MICRONESIA, FEDERATED STATES OF</option>
									<option value="MOLDOVA, REPUBLIC OF" >MOLDOVA, REPUBLIC OF</option>
									<option value="MONACO" >MONACO</option>
									<option value="MONGOLIA" >MONGOLIA</option>
									<option value="MONTSERRAT" >MONTSERRAT</option>
									<option value="MOROCCO" >MOROCCO</option>
									<option value="MOZAMBIQUE" >MOZAMBIQUE</option>
									<option value="MYANMAR" >MYANMAR</option>
									<option value="NAMIBIA" >NAMIBIA</option>
									<option value="NAURU" >NAURU</option>
									<option value="NEPAL" >NEPAL</option>
									<option value="NETHERLANDS" >NETHERLANDS</option>
									<option value="NETHERLANDS ANTILLES" >NETHERLANDS ANTILLES</option>
									<option value="NEW CALEDONIA" >NEW CALEDONIA</option>
									<option value="NEW ZEALAND" >NEW ZEALAND</option>
									<option value="NICARAGUA" >NICARAGUA</option>
									<option value="NIGER" >NIGER</option>
									<option value="NIGERIA" >NIGERIA</option>
									<option value="NIUE" >NIUE</option>
									<option value="NORFOLK ISLAND" >NORFOLK ISLAND</option>
									<option value="NORTHERN MARIANA ISLANDS" >NORTHERN MARIANA ISLANDS</option>
									<option value="NORWAY" >NORWAY</option>
									<option value="OMAN" >OMAN</option>
									<option value="PAKISTAN" >PAKISTAN</option>
									<option value="PALAU" >PALAU</option>
									<option value="PALESTINIAN TERRITORY, OCCUPIED" >PALESTINIAN TERRITORY, OCCUPIED</option>
									<option value="PANAMA" >PANAMA</option>
									<option value="PAPUA NEW GUINEA" >PAPUA NEW GUINEA</option>
									<option value="PARAGUAY" >PARAGUAY</option>
									<option value="PERU" >PERU</option>
									<option value="PHILIPPINES" >PHILIPPINES</option>
									<option value="PITCAIRN" >PITCAIRN</option>
									<option value="POLAND" >POLAND</option>
									<option value="PORTUGAL" >PORTUGAL</option>
									<option value="PUERTO RICO" >PUERTO RICO</option>
									<option value="QATAR" >QATAR</option>
									<option value="REUNION" >REUNION</option>
									<option value="ROMANIA" >ROMANIA</option>
									<option value="RUSSIAN FEDERATION" >RUSSIAN FEDERATION</option>
									<option value="RWANDA" >RWANDA</option>
									<option value="SAINT HELENA" >SAINT HELENA</option>
									<option value="SAINT KITTS AND NEVIS" >SAINT KITTS AND NEVIS</option>
									<option value="SAINT LUCIA" >SAINT LUCIA</option>
									<option value="SAINT PIERRE AND MIQUELON" >SAINT PIERRE AND MIQUELON</option>
									<option value="SAINT VINCENT AND THE GRENADINES" >SAINT VINCENT AND THE GRENADINES</option>
									<option value="SAMOA" >SAMOA</option>
									<option value="SAN MARINO" >SAN MARINO</option>
									<option value="SAO TOME AND PRINCIPE" >SAO TOME AND PRINCIPE</option>
									<option value="SAUDI ARABIA" >SAUDI ARABIA</option>
									<option value="SENEGAL" >SENEGAL</option>
									<option value="SEYCHELLES" >SEYCHELLES</option>
									<option value="SIERRA LEONE" >SIERRA LEONE</option>
									<option value="SINGAPORE" >SINGAPORE</option>
									<option value="SLOVAKIA" >SLOVAKIA</option>
									<option value="SLOVENIA" >SLOVENIA</option>
									<option value="SOLOMON ISLANDS" >SOLOMON ISLANDS</option>
									<option value="SOMALIA" >SOMALIA</option>
									<option value="SOUTH AFRICA" >SOUTH AFRICA</option>
									<option value="SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS" >SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS</option>
									<option value="SPAIN" >SPAIN</option>
									<option value="SRI LANKA" >SRI LANKA</option>
									<option value="SUDAN" >SUDAN</option>
									<option value="SURINAME" >SURINAME</option>
									<option value="SVALBARD AND JAN MAYEN" >SVALBARD AND JAN MAYEN</option>
									<option value="SWAZILAND" >SWAZILAND</option>
									<option value="SWEDEN" >SWEDEN</option>
									<option value="SWITZERLAND" >SWITZERLAND</option>
									<option value="SYRIAN ARAB REPUBLIC" >SYRIAN ARAB REPUBLIC</option>
									<option value="TAIWAN, PROVINCE OF CHINA" >TAIWAN, PROVINCE OF CHINA</option>
									<option value="TAJIKISTAN" >TAJIKISTAN</option>
									<option value="TANZANIA, UNITED REPUBLIC OF" >TANZANIA, UNITED REPUBLIC OF</option>
									<option value="THAILAND" >THAILAND</option>
									<option value="TOGO" >TOGO</option>
									<option value="TOKELAU" >TOKELAU</option>
									<option value="TONGA" >TONGA</option>
									<option value="TRINIDAD AND TOBAGO" >TRINIDAD AND TOBAGO</option>
									<option value="TUNISIA" >TUNISIA</option>
									<option value="TURKEY" >TURKEY</option>
									<option value="TURKMENISTAN" >TURKMENISTAN</option>
									<option value="TURKS AND CAICOS ISLANDS" >TURKS AND CAICOS ISLANDS</option>
									<option value="TUVALU" >TUVALU</option>
									<option value="UGANDA" >UGANDA</option>
									<option value="UKRAINE" >UKRAINE</option>
									<option value="UNITED ARAB EMIRATES" >UNITED ARAB EMIRATES</option>
									<option value="UNITED KINGDOM" >UNITED KINGDOM</option>
									<option value="UNITED STATES" >UNITED STATES</option>
									<option value="UNITED STATES MINOR OUTLYING ISLANDS" >UNITED STATES MINOR OUTLYING ISLANDS</option>
									<option value="URUGUAY" >URUGUAY</option>
									<option value="UZBEKISTAN" >UZBEKISTAN</option>
									<option value="VANUATU" >VANUATU</option>
									<option value="VENEZUELA" >VENEZUELA</option>
									<option value="VIET NAM" >VIET NAM</option>
									<option value="VIRGIN ISLANDS, BRITISH" >VIRGIN ISLANDS, BRITISH</option>
									<option value="VIRGIN ISLANDS, U.S." >VIRGIN ISLANDS, U.S.</option>
									<option value="WALLIS AND FUTUNA" >WALLIS AND FUTUNA</option>
									<option value="WESTERN SAHARA" >WESTERN SAHARA</option>
									<option value="YEMEN" >YEMEN</option>
									<option value="YUGOSLAVIA" >YUGOSLAVIA</option>
									<option value="ZAMBIA" >ZAMBIA</option>
									<option value="ZIMBABWE" >ZIMBABWE</option>
						
    				</select>
			<?php
			$cnt=0;
			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{
				$sql= "select user_password from user where user_name='".$_SESSION['user_name']."'";
				$rslt1=mysqli_query($conn, $sql);
				if(mysqli_num_rows($rslt1))
				{
					if($conn->query($sql))
					{
						while($user=mysqli_fetch_assoc($rslt1))
						{
							if($user['user_password']==$_POST["user_password1"])
							{
								$cnt++;
							}
							else if($_POST["user_password1"]==0)
							{
								$user_pass="Current password is required";
							}
							else
							{
								$user_pass="Invalid password";
							}
						}
					}
				}
				if($cnt==1)
				{	
					
		   			if($country_name= test_input($_POST["country_name"]))
		   			{
			   			include("connection.php");

			    		$sql="UPDATE user SET country_name='$_POST[country_name]' WHERE user_name='".$_SESSION['user_name']."'";
			    		$rslt1=mysqli_query($conn,$sql);
					}
				}
			}
			?>
		</td>
		<td style="border-top: 1px solid LightGreen;border-right: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ;width: 40%"></td>
		</tr>
		<tr>
			<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ">
				Upload a new picture:
			</td>
			<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ">
				<input style="width: 200px" type="file" name="img" id="">
				<?php
				$cnt=0;
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{
					$sql= "select user_password from user where user_name='".$_SESSION['user_name']."'";
					$rslt1=mysqli_query($conn, $sql);
					if(mysqli_num_rows($rslt1))
					{
						if($conn->query($sql))
						{
							while($user=mysqli_fetch_assoc($rslt1))
							{
								if($user['user_password']==$_POST["user_password1"])
								{
									$cnt++;
								}
								else if($_POST["user_password1"]==0)
								{
									$user_pass="Current password is required";
								}
								else
								{
									$user_pass="Invalid password";
								}
							}
						}
					}
					if($cnt==1)
					{
						if(isset($_FILES['img']))
						{
							$allowed = ['jpeg','jpg'];
							$fl_name = $_FILES['img']['name'];
							$fl_extn = strtolower(end(explode('.', $fl_name)));
							$fl_temp = $_FILES['img']['tmp_name'];

							if(in_array($fl_extn,$allowed))
							{
								function img($fl_extn, $fl_temp)
								{
									$file_path= 'images/' . substr(md5(time()), 0,10) . '.' . $fl_extn;
									move_uploaded_file($fl_temp, $file_path);
									include("connection.php");
									$sql = "UPDATE user SET image= '$file_path' WHERE user_name='".$_SESSION['user_name']."'";
									$rslt1=mysqli_query($conn,$sql);
								}
								img($fl_extn,$fl_temp);
							}
						}
					}
				}
				?>
			</td>
			<td style="border-top: 1px solid LightGreen;border-right: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan;width: 40%">
				<div style="float: center"> <?php echo " In jpg or jpeg format and size is below 40 KB";?></div>
			</td>
		</tr>
		<tr>
			<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ">
				Your image:
			</td>
			<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan ">
				<?php
				include("connection.php");
				$sql = "SELECT image FROM user WHERE user_name='".$_SESSION['user_name']."'";
				$rslt1=mysqli_query($conn,$sql);
				while($image=mysqli_fetch_assoc($rslt1))
				{
					if($image['image']=="")
					{
						?>
						<img width="100" src="<?php echo "images/default.jpg" ?>">
						<?php
					}
					else
					{
					?>
					<img width="100" src="<?php echo $image['image']?>">
					<?php
					}
				}
				?>
			</td>
			<td style="border-top: 1px solid LightGreen;border-right: 1px solid LightGreen;border-left: 1px solid LightGreen;color:DarkCyan;width: 40%"></td>
		</tr>
		<tr></tr>
		<tr>
			<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;border-bottom: 1px solid LightGreen;color:DarkCyan ">
				Join Date:
			</td>
			<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;border-bottom: 1px solid LightGreen;color:DarkCyan ">	
			  <?php 

     			include("connection.php");
				$sql= "select reg_date from user where user_name='".$_SESSION['user_name']."'";
				$rslt1=mysqli_query($conn, $sql);
				if(mysqli_num_rows($rslt1))
				{
					if($conn->query($sql))
					{
						while($user=mysqli_fetch_assoc($rslt1))
						{
							echo $user['reg_date'];
						}
					}
				}
			?>
			</td>
			<td style="border-top: 1px solid LightGreen;border-left: 1px solid LightGreen;border-right: 1px solid LightGreen;border-bottom: 1px solid LightGreen;color:DarkCyan ;width: 40%"></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<br>
		<tr>			
			<td style="color:DarkCyan"></td>
			<td style="color:DarkCyan ">
				<input type="submit" name="Submit" value="Submit" style="background-color:Lavender">
			</td>
		</tr>

	</table>
		
	</form>
	</div>

</div>
	<?php include("footer.php") ?>
</body>
</html>