<?php
include ('connect.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	
	$myemail=mysqli_real_escape_string($db,$_POST['email']);
	
	
	
$myfname=mysqli_real_escape_string($db,$_POST['fname']);
$mymname=mysqli_real_escape_string($db,$_POST['mname']);
$mylname=mysqli_real_escape_string($db,$_POST['lname']);

$mypassword=mysqli_real_escape_string($db,$_POST['password']);
$mycpwd=mysqli_real_escape_string($db,$_POST['cpass']);
?>
<br>
<br>
<?php

if(empty($myfname) || empty($mymname) || empty($mylname) || empty($mypassword) || empty($mycpwd) || empty($myemail) )
	echo "<font color = 'red' size='4'><center><u> You did not fill out the required fields.</u></center></font>";
else 
{


$sql = "SELECT email FROM login WHERE email='$myemail'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if(mysqli_num_rows($result) == 1)
{
	echo "<font size='5' color = white><center> Sorry.. This email id already exist.!!</center></font>";
}
else if ($mypassword!=$mycpwd)
{
	echo "<font size='5' color = white><center> Passwords do not match.!!</center></font>";
}

else
{
$query = mysqli_query($db, "INSERT INTO login (fname,mname,lname,password,email )VALUES ('$myfname','$mymname','$mylname','$mypassword', '$myemail')");
 
if($query)
{	require 'send-email.php';

	echo "<font size='5' color = white><center> Thank You! you are now registered.!!</center></font>";
}

}
}
}
?>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<center><font size = "8"><b>SIGN UP</b></font><br></center>
<br>
<form method="post" action="signup.php">

<label><font size = "5">First Name:</font></label><br>
<input type="text" name="fname"><br>


<label><font size = "5">Middle Name:</font></label><br>
<input type="text" name="mname"><br>

<label><font size = "5">Last Name:</font></label><br>
<input type="text" name="lname"><br>

<label><font size = "5">Email-Id:</font></label><br>
<input type="email" name="email"><br>


<label><font size = "5">Password:</font></label><br>
<input type="password" name="password"><br>

<label><font size = "5">Confirm Password:</font></label><br>
<input type="password" name="cpass"><br>
<br>


<center><input type="submit" value="Submit"></center>
<br>

<center><a href="login.php"><input type="button" value="Home"
onclick="login.php = this.value"></a><br><br></center>

</form>

