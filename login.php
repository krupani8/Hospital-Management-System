
<?php
include("connect.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// username and password sent from Form
	$myemail=mysqli_real_escape_string($db,$_POST['email']);
	$mypassword=mysqli_real_escape_string($db,$_POST['password']);

	$sql="SELECT id FROM login WHERE email='$myemail' and password='$mypassword'";
	$result = mysqli_query($db,$sql)
  or die("Error: ".mysqli_error($db));
	$row=mysqli_fetch_array($result);
	$active=$row["active"];
	$count=mysqli_num_rows($result);


	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1)
	{
		//session_register("myusername");
		$_SESSION['login_user']=$myemail;

		header("location: middle.php");
	}
	else
	{
		echo "<center><font color = 'white' size ='5'>Incorrect Email ID or Password</font></center>";
	}
	if (! empty($_SESSION['logged_in']))
	{
		
	?>
	    
	    <a href='logout.php'>Click here to log out</a>
	
	   <?php 
	}
	else
	{
	    echo "<center><font color = 'white' size ='5'>You are not logged in</font></center>";
	}
}
?>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="background.jpg">

<center><font size = "8"><b>HOSPITAL LOGIN</b></font><br></center>
<br>
<br>

<form action="" method="post">
 
<label><font  size = "6">Email:</font></label><br>
<input type="email" name="email"/><br />
<label><font font size = "6">Password :<font></label><br>
<input type="password" name="password"/><br/><br>
<center><input type="submit" value=" Submit "/><br></center>
<br>
<center><a href="signup.php"><input type="button" value="Register"
onclick="main1.php = this.value"></center></a><br><br>
</form>
</body>
