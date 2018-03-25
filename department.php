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
	$mydeptno=mysqli_real_escape_string($db,$_POST['deptno']);
	$mydeptname=mysqli_real_escape_string($db,$_POST['deptname']);
	$myfacilities=mysqli_real_escape_string($db,$_POST['facilities']);
	
	if(empty($mydeptno) || empty($mydeptname) || empty($myfacilities) )
		echo "<font color = 'red' size='4'><center><u> You did not fill out the required fields.</u></center></font>";
	else
	{

	

	$query = mysqli_query($db, "INSERT INTO department (deptno,deptname,facilities)VALUES ('$mydeptno','$mydeptname','$myfacilities' )");

	if($query)
	{
		$last_id = mysqli_insert_id($db);
		echo "<font size='6' color = white><center> Thank You! you are now registered a Department with ID $last_id .!!</center></font>";
	}



}

}

?>


<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<center><font size = "8"><b>DEPARTMENT LOGIN</b></font><br></center>
<br>
<form action="department.php" method = "post">               

<font size = "5">Department Number:</font><br>
<input type="text" name="deptno">
<br>
<font size = "5">Department Name:</font><br>
<input type="text" name="deptname">
<br>
<font size = "5">Department Facilities:</font><br>
<input type="text" name="facilities">
<br>
<br>

<center><input type="Submit" value="Submit">
<a href="main1.php"><input type="button" value="Home"
onclick="main1.php = this.value"></a></center><br><br>
</form>


