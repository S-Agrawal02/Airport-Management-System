<html>
<head>
<title>Airline</title>
<link href="css.css" rel="stylesheet">
<link href="css2.css" rel="stylesheet">
<style>
th{
	width:100px;
}
table{
	margin-left:160px;
}
h2{
	text-decoration:none;
	font-size:30px;
}
</style>

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
<li><a href="airport.php">Airports</a></li>
<li ><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li id=active><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="index.php">Log out</a></li>
</ul></div><br><br>

<?php 
//Opens connection to server
$dbcon = mysql_connect('localhost','root', '');
if (!$dbcon){
	die('Connection Error' .mysql_error());}
//Select database
$dbselect = mysql_select_db('airline', $dbcon);
if(!$dbselect){
	die('Cant connect: ' .mysql_error());
}


if($_POST)
{
$flight_id=$_POST["flight_id"];
$airline=$_POST["airline"];
$class=$_POST["class"];
$capacity=$_POST["capacity"];
$query="insert into flight_master values(\"".$flight_id."\", \"".$airline."\", \""."$class"."\", \"".$capacity."\");";
$result=mysql_query($query);
if ($result){
echo '<h2>Added Successfully.</h2>';
}else{
	echo "<h2>".mysql_error()."</h2>";
}

//echo "<h2> Flight Details </h2>";
$query="select * from flight_master;";
$data=mysql_query($query);
echo "
<table border = 1 align=center>
<tr>
<th>Flight Id</th>
<th>Airlines</th>
<th>Class Type</th>
<th>Capacity</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["flight_id"];
	echo "<td>".$record["airline"];
	echo "<td>".$record["class"];
	echo "<td>".$record["capacity"];
	echo "</tr>";
}
echo "</table><br><br>";
}
mysql_close($dbcon)
?>

<fieldset><legend>Flight_Details: Add</legend>
<form action="" method=post>
<br>
<label>Flight Number: </label><input type="text" name= "flight_id" required pattern="^[A-Z]{1,3}[-]{0,1}[0-9]{1,4}" placeholder="XX000"></br></br></br>

<label>Airline: </label><select name= "airline">
<option value="Air India"> Air India </option>
<option value="Jet Airways"> Jet Airways </option>
<option value="Spice Jet"> Spice Jet </option>
<option value="Indigo"> Indigo </option>
<option value="Go Air"> Go Air </option>
<option value="Vistara"> Vistara </option>
</select><br><br><br>

<label>Class: </label><select name= "class">
<option value="Economy"> Economy </option>
<option value="Business"> Business </option>
<option value="Luxury"> Luxury </option>

</select><br><br><br>

<label>Capacity: </label><input type="text" name= "capacity" placeholder="000" required pattern="[0-9]{3}">
<br><br><br>

<input type="submit" value="Submit"/>
</form></fieldset>

<a href="flight_master.php"><button id=backbutton>Back</button></a><br><br>
</body>
</html>