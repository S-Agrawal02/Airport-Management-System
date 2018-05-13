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
<li><a href="airport.php">Airports</a></li>
<li><a href="flight_crew.php">Flight Crew</a></li>
<li id=active><a href="crew_master.php">Crew Details</a></li>
<li><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="index.php">Log out</a></li>
</ul></div><br><br>


<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

if($_POST)
{
		$member_id=$_POST["member_id"];
		$member_name=$_POST["member_name"];
		$designation=$_POST["designation"];
		$mobile=$_POST["mobile"];
		$email=$_POST["email"];
		$query="insert into crew_master values(\"".$member_id."\", \"".$member_name."\", \"".$designation."\", \"".$mobile."\",\"".$email."\");";
		$result=mysql_query($query);
		if ($result){
		echo '<h2>Insertion Successful.</h2>';
		}
		else{
			echo "<h2>".mysql_error()."</h2>";
			}

$query="select * from crew_master";
$data=mysql_query($query);
echo "
<table border = 1 align=Center>
<tr>
<th>Member Id</th>
<th>Member Name</th>
<th>Designation</th>
<th>Mobile</th>
<th>Email</th>
</tr>";
while($record=mysql_fetch_array($data))
{
	echo "<tr>";
	echo "<td>".$record["member_id"];
	echo "<td>".$record["member_name"];
	echo "<td>".$record["designation"];
	echo "<td>".$record["mobile"];
	echo "<td>".$record["email"];
	echo "</tr>";
}
echo "</table><br/><br/>";
}
mysql_close($con) or die(mysql_error()+" occurs");
?>

<fieldset><legend>Crew_Details: Add</legend>
<form action="" method=post>
<br>
<label>Member ID : </label><input type="text" name="member_id" required>
<br><br><br>

<label>Member name : </label><input type="text" name="member_name" required>
<br><br><br>

<label>Designation :</label> <select name="designation">
			<option value="Pilot">Pilot</option>
			<option value="Manager">Manager</option>
			<option value="Air Hostess">Air Hostess</option>
			<option value="Staff">Staff</option>
		</select><br><br><br>

<label>Mobile :</label><input type="tel" name="mobile" pattern="[789]{1}[0-9]{9}" title="Please Enter a valid Mobile Number" required>
<br><br><br>
<label>Email :</label><input type="email" name="email" pattern="^[a-z]{2}[a-zA-Z0-9_]{0,}@[a-z]{2,10}.[a-z]{2,5}[?(.)[a-z]{2,5}]$" required>
<br><br><br>

<input type="submit" value="Submit"/>
</form></fieldset>

<!--
<?php 
//Opens connection to server
/* $dbcon = mysql_connect('localhost','root', '');
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
$member_id=$_POST["member_id"];
$source=$_POST["source_airport_id"];
$date=$_POST["departure_date"];
$query="insert into flight_crew values(\"".$flight_id."\", \"".$member_id."\", \"".$source."\", \"".$date."\");";
$result=mysql_query($query);
if ($result){
echo '<h2>Your query has been executed.</h2>';
}
else{
	echo "<h2>".mysql_error()."</h2>";
	}
}
mysql_close($dbcon)
*/
?>

-->

<!-- *************************************************** -->


<!-- *************************************************** -->
<a href="crew_master.php"><button id=backbutton>Back</button></a><br><br>

</body>
</html>