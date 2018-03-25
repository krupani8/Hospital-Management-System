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
<center>
<form>
<p><h2>Specify your login:</h2><p><br>
<p>

<select name="search_categories" id="search_categories" onChange="window.location.href=this.value">
  <option value="">Select...</option>
  <option value="doctor.php">Doctor</option>
  <option value="patient.php">Patient</option>
   <option value="department.php">Department</option>
   <option value="regularpatient.php">Regular Patient</option>
    <option value="admit.php">Admit</option>
     <option value="discharge.php">Patient Discharge</option>
      
</select>
</p>
<a href="middle.php"><input type="button" value="Go Home"
onclick="middle.php = this.value"></a></center><br>

<br>


</form>
</center>
</html>

