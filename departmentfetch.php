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
<center><font size = "8"><b>Department Data</b></font></center><br>
<br>
<form action="departmentfetch.php" method="post">
<center>
<label><font size = "5">Enter Department ID:</font></label><br>
<input type="text" name="id1"><br>

</center>
<br>
<center><input type="submit" name = "submit" value="Submit"></center>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$myid1=mysqli_real_escape_string($db,$_POST['id1']);
	$sql = "SELECT * FROM department WHERE id = '$myid1'";
	$result = $db->query($sql);
	echo "<br>";
	if ($result->num_rows > 0) {
		//echo "<br><table><tr><th>First name</th><th>Room No.</th><th>Name</th><th>Gender</th><th>Phone No.</th><th>Age</th><th>Address</th></tr>";
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<center><font size = '5'><tr><td>ID: ".$row["id"]."</td></tr><br>";
			echo "<tr><td>Department No.: ".$row["deptno"]."</td></tr><br>";
			echo "<tr><td>Department name: ".$row["deptname"]."</td></tr><br>";
			echo "<tr><td>Facilities: ".$row["facilities"]."</td></tr><br><br></font></center>";


		}

	} else {
		echo "<center><font size = 6px>Data not found</font></center>";
	}
	$db->close();
}
?>

<form>
<br>
<center>
<a href="main2.php"><input type="button" value="Home"
onclick="main2.php = this.value"></a></center><br>
</form>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>