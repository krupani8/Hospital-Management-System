<?php
include ('connect.php');

session_start();

if (! empty($_SESSION['login_user']))
{

	?>
	    <br>
	    <a href='logout.php'><font color='white'>Click here to log out</font></a>
	
	   <?php 
	}
	else
	{
	    echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
	}
	
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$mypayment=mysqli_real_escape_string($db,$_POST['payment']);
	$mymedicines=mysqli_real_escape_string($db,$_POST['medicines']);
	$mytreatment=mysqli_real_escape_string($db,$_POST['treatment']);
	
	if(empty($mypayment) || empty($mymedicines) || empty($mytreatment) )
		echo "<font color = 'red' size='4'><center><u> You did not fill out the required fields.</u></center></font>";
	else
	{
	$query = mysqli_query($db, "INSERT INTO discharge (payment,medicines,treatment)VALUES ('$mypayment','$mymedicines','$mytreatment')");

	if($query)
	{
		$last_id = mysqli_insert_id($db);
		echo "<font size='6' color = white ><center> Thank You! you are now registered for a Discharged Patient with ID $last_id.!!</center></font>";
	}


	}
}



?>


<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<center><font size = "8"><b>DISCHARGE PATIENT LOGIN</b></font><br></center>
<br><form action="discharge.php" method = "post">               

<font size = "5">Payment:</font><br>
<input type="text" name="payment">
<br>
<font size = "5">Medicines:</font><br>
<input type="text" name="medicines">
<br>

<font size = "5">Treatment:</font> <br>
<input type="text" name="treatment"><br>
<br>
<center><input type="Submit" value="Submit">
<a href="main1.php"><input type="button" value="Home"
onclick="main1.php = this.value"></a><br><br></center>
</form>


