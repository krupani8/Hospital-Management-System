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
	$myqualification=mysqli_real_escape_string($db,$_POST['qualification']);
	if(empty($myfname) || empty($mylname) || empty($mysex) || empty($myqualification) )
		echo "<font color = 'red' size='4'><center><u> You did not fill out the required fields.</u></center></font>";
	else
	{

	$query = mysqli_query($db, "INSERT INTO doctor (id,fname,lname,sex,qualification )VALUES (LAST_INSERT_ID(),'$myfname','$mylname','$mysex','$myqualification' )");
	
	if($query)
	{	
		
		$last_id = mysqli_insert_id($db);
		echo "<font size='6' color = white><center> Thank You! you are now registered as Doctor with ID $last_id..!!</center></font>";
		
		
	}
	
	}

}

?>



<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<center><font size = "8"><b>DOCTOR LOGIN</b></font><br></center>
<br>
<form action="doctor.php" method = "post">               

<label><font size = "5">First name:</font></label><br>
<input type="text" name="fname">
<br>
<label><font size = "5">Last name:</font></label><br>
<input type="text" name="lname">
<br>
<label><font size = "5">Sex:<br>
<input type="radio" name="sex" value="male" checked> Male
<input type="radio" name="sex" value="female"> Female</font></label>
<br>
<label><font size = "5">Doctor Qualifications:</font><br></label>
<input type="text" name="qualification"><br><br>
<center><input type="submit" value="Submit">
<a href="main1.php"><input type="button" value="Home"
onclick="main1.php = this.value"></a></center><br><br>
</form>

