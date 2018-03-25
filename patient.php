<?php
include ('connect.php');
session_start();
if (! empty($_SESSION['login_user']))
{

	?>
	    <br>
	    <a href='logout.php'><font color = "white">Click here to log out</font></a>
	
	   <?php 
	}
	else
	{
	    echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
	}
	
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$myfname=mysqli_real_escape_string($db,$_POST['fname']);
	$mylname=mysqli_real_escape_string($db,$_POST['lname']);
	$mysex=mysqli_real_escape_string($db,$_POST['sex']);
	$myphnumber=mysqli_real_escape_string($db,$_POST['phnumber']);
	$myage=mysqli_real_escape_string($db,$_POST['age']);
	$myaddress=mysqli_real_escape_string($db,$_POST['address']);
	if(empty($myfname) || empty($mylname) || empty($mysex)|| empty($myphnumber)|| empty($myaddress)|| empty($myage) )
		echo "<font color = 'red' size='4'><center><u> You did not fill out the required fields.</u></center></font>";
	else
	{
	

	$query = mysqli_query($db, "INSERT INTO patient (fname,lname,sex,phnumber,age,address)VALUES ('$myfname','$mylname','$mysex','$myphnumber','$myage','$myaddress' )");

	if($query)
	{	
		$last_id = mysqli_insert_id($db);
		echo "<font size='6' color = white><center> Thank You! you are now registered as a Patient with ID $last_id.!!</center></font>";
	}

	}

}



?>


<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<center><font size = "8"><b>PATIENT LOGIN</b></font><br></center>
<br>
<form action="patient.php" method = "post">               

<font size = "5">First name:</font><br>
<input type="text" name="fname">
<br>
<font size = "5">Last name:</font><br>
<input type="text" name="lname">
<br>
<font size = "5">Sex:<br>
<input type="radio" name="sex" value="male" checked> Male
<input type="radio" name="sex" value="female"> Female<font size = "5">
<br>
<font size = "5">Phone Number:</font><br>
<input type="text" name="phnumber"><br>
<font size = "5">Age:</font> <br>
<input type="text" name="age"><br>
<font size = "5">Address</font><br>
<input type="text" name="address"><br><br>
<center><input type="Submit" value="Submit">
<a href="main1.php"><input type="button" value="Home"
onclick="main1.php = this.value"></a></center><br><br>
</form>


