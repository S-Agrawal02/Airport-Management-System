<html>
<head>
<title>Airline</title>
<link href="css.css" rel="stylesheet">
<link href="css2.css" rel="stylesheet">

<style type="text/css">
	#backbutton{
	margin-top: 10px;
	padding:10px;
	font-size:25px;
	padding-left:5px;
	padding-right:5px;
	border-radius: 5px;
	margin-left: 30%;
}
</style>

</head>
<body>
<h1>Airline Management System</h1>
<div id=navlist>
<ul>
<li id=active><a href="airport.php">Airports</a></li>
<li><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="index.php">Log out</a></li>
</ul></div><br><br>


<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

if($_POST)
{
		$airport_id=$_POST["airport_id"];
		$airport_name=$_POST["airport_name"];
		$location=$_POST["location"];
		$runways=$_POST["runways"];

		$query="insert into airport values('$airport_id','$airport_name','$location','$runways')";
		$result=mysql_query($query);

		if ($result)
		{
		echo '<h2>Successfully Added</h2>';
		}
		else{
			echo "<h2>".mysql_error()."</h2>";
			}

$query="select * from airport";
$data=mysql_query($query);
echo "
<table border = 1 align=Center>
<tr>
<th>Airport Id</th>
<th>Airport Name</th>
<th>Location</th>
<th>Runways</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["airport_id"];
	echo "<td>".$record["airport_name"];
	echo "<td>".$record["location"];
	echo "<td>".$record["runways"];
	echo "</tr>";
}
echo "</table><br/><br/>";
}

mysql_close($con) or die(mysql_error()+" occurs");
?>

<fieldset><legend>Airport : Add</legend>
<form action="" method=post>
<br>

<label>Airport ID : </label>
<input type="text" name= "airport_id" required pattern="[A-Za-z]{2,5}" title="Enter only alphabets of length 2-5">
<br><br><br>

<label>Airport Name : </label>
<input type="text" name= "airport_name" required pattern="[A-Za-z\s]{10,50}" title="Enter only alphabets of length 10-50">
<br><br><br>

<label>Location : </label>
<input type="text" name= "location" required pattern="[A-Za-z\s]{2,30}" title="Enter only alphabets of length 2-30">
<br><br><br>

<label>No Of Runways : </label>
<input type="number" min="2" max="10" name= "runways" required title="Enter a number between 2-10">
<br><br><br>


<input type="submit" value="Submit"/>
</form></fieldset>

<a href="airport.php"><button id=backbutton>Back</button></a><br><br>
</body>
</html>