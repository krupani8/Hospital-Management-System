<?php
include ('connect.php');

session_start();
if (! empty($_SESSION['login_user']))
{

	?>
	    <br>
	    <a href='logout.php'><font color = 'white'>Click here to log out</font></a>
	
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
	$mymedicines=mysqli_real_escape_string($db,$_POST['medicines']);
	$mypay=mysqli_real_escape_string($db,$_POST['pay']);
	
	if(empty($myfname) || empty($mylname) || empty($mysex)|| empty($mymedicines)|| empty($mypay) )
		echo "<font color = 'red' size='4'><center><u> You did not fill out the required fields.</u></center></font>";
	else
	{

	$query = mysqli_query($db, "INSERT INTO regular (fname,lname,sex,medicines,pay)VALUES ('$myfname','$mylname','$mysex','$mymedicines','$mypay' )");

	if($query)
	{
		$last_id = mysqli_insert_id($db);
		echo "<font size='6' color = white><center> Thank You! you are now registered as Regular Patient with ID $last_id.!!</center></font>";
	}



}

}

?>


<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<center><font size = "8"><b>REGULAR PATIENT LOGIN</b></font><br></center>
<br>
<form action="regularpatient.php" method = "post">               

<font size = "5">First name:</font><br>
<input type="text" name="fname">
<br>
<font size = "5">Last name:</font><br>
<input type="text" name="lname">
<br>
<font size = "5">Sex:<br>
<input type="radio" name="sex" value="male" checked> Male
<input type="radio" name="sex" value="female"> Female</font>
<br>
<font size = "5">Medicines:</font><br>
<input type="text" name="medicines"><br>
<font size = "5">Payment: </font><br>
<input type="text" name="pay"><br>
<br>
<center><input type="Submit" value="Submit">
<a href="main1.php"><input type="button" value="Home"
onclick="main1.php = this.value"></a></center><br><br>
</form>


