<?php

session_start();
if (! empty($_SESSION['login_user']))
	{
		
	?>
	    <br>
	    <a href='logout.php'><font color = 'white'> click here to log out</font></a>
	 
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
<center><font size = "8"><b>HOSPITAL DATABASE MANAGEMENT SYSTEM</b></font><br></center>
<br>
<form>
<center><h2>click to fetch data:</h2></center><br>
<p>
<center>
<select name="specify" onChange="window.location.href=this.value">
<option value="">Select...</option>
  <option value="doctorfetch.php">Doctor</option>
  <option value="patientfetch.php">Patient</option>
   <option value="departmentfetch.php">Department</option>
   <option value="regularpatientfetch.php">Regular Patient</option>
    <option value="admitfetch.php">Admit</option>
     <option value="dischargefetch.php">Patient Discharge</option>
      
</select>
</center>
</p>
</form>
<form>
<br>
<center><a href="middle.php"><input type="button" value="Go Home"
onclick="middle.php = this.value"></a></center><br>
</form>
</html>

