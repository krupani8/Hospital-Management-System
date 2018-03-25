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
<center><font size = "8"><b>Admit Data</b></font></center><br>
<br>
<form action="admitfetch.php" method="post">
<center>
<label><font size = "5">Enter Admit Number:</font></label><br>
<input type="text" name="id1"><br>

</center>
<br>
<center><input type="submit" name = "submit" value="Submit"></center>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$myid1=mysqli_real_escape_string($db,$_POST['id1']);
	$sql = "SELECT * FROM admit WHERE admitno = '$myid1'";
	$result = $db->query($sql);
	echo "<br>";
	if ($result->num_rows > 0) {
		//echo "<br><table><tr><th>First name</th><th>Room No.</th><th>Name</th><th>Gender</th><th>Phone No.</th><th>Age</th><th>Address</th></tr>";
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<center><font size = '5' color = white><tr><td>Admit No.: ".$row["admitno"]."</td></tr><br>";
			echo "<tr><td>Room No.: ".$row["roomno"]."</td></tr><br>";
				
echo "<tr><td>First name: ".$row["fname"]."</td></tr><br>";
echo "<tr><td>Last name: ".$row["lname"]."</td></tr><br>";
echo "<tr><td>Gender: ".$row["sex"]."</td></tr><br>";
echo "<tr><td>Phone No.: ".$row["phnumber"]."</td></tr><br>";

echo "<tr><td>Age: ".$row["age"]."</td></tr><br>";

echo "<tr><td>Address: ".$row["address"]."</td></tr><br><br></font></center>";


		}

	} else {
		echo "<center><font size = 6px color = white>Data not found</font></center>";
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