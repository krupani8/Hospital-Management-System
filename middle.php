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

?>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<center><font size = "8"><b>SELECT OPTION</b></font><br></center>
<br>
<br>
<br>
<br>
<center><a href="main1.php"><input type="button" value="New Entry"
onclick="main1.php = this.value"></a><br><br>
<a href="main2.php"><input type="button" value="Retrieve Data"
onclick="main2.php = this.value"></a><br><br></center>