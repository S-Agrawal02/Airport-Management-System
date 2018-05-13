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

<script type="text/javascript">
function validate()
{

   var selectedText = document.getElementById('departure_date').value;
   var selectedDate = new Date(selectedText);
   var now = new Date();
   if (selectedDate < now) {
    alert("Date must be in the future");
    return false;
   }

   return true;
}
</script>

</head>
<body>
<h1>Airline Management System</h1>
<div id=navlist>
<ul>
<li><a href="airport.php">Airports</a></li>
<li id=active><a href="flight_crew.php">Flight Crew</a></li>
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
	$flight_id=$_POST["flight_id"];
	$member_id=$_POST["member_id"];
	$source=$_POST["dep_airport_id"];
	$date=$_POST["departure_date"];
	$query="insert into flight_crew values(\"".$flight_id."\", \"".$member_id."\", \"".$source."\", \"".$date."\");";
	$result=mysql_query($query);
	if ($result){
	echo '<h2>Added Successfully.</h2>';
	}else{
		echo "<h2>".mysql_error()."</h2>";
	}

	$query="select * from flight_crew";
	$data=mysql_query($query);

	echo "
	<table border = 1 align=Center>
	<tr>
	<th>Flight Id</th>
	<th>Member Id</th>
	<th>Designation</th>
	<th>Source Airport</th>
	<th>Date of departure</th>
	</tr>";
	while($record=mysql_fetch_array($data))
	{
		echo "<tr>";
		echo "<td>".$record["flight_id"];
		echo "<td>".$record["member_id"];
		$query1="select designation from crew_master where member_id=\"".$record["member_id"]."\"";
		$data1=mysql_query($query1);
		$record1=mysql_fetch_array($data1);
		echo "<td>".$record1["designation"];
		echo "<td>".$record["dep_airport_id"];
		echo "<td>".$record["departure_date"];
		echo "</tr>";
	}
	echo "</table><br/><br/>";
}

mysql_close($con) or die(mysql_error()+" occurs");
?>
<fieldset><legend>Flight Crew: Add</legend>
<form action="" method=post onsubmit="return validate()">

<br>

<label>Flight Number: </label><select name= "flight_id">
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");
$query="select flight_id from flight_master;";
$data=mysql_query($query);
while($record=mysql_fetch_array($data)){
	echo "<option value=\"".$record["flight_id"]."\">".$record["flight_id"]."</option>";
} 
mysql_close($con) or die(mysql_error()+" occurs");
?></select><br><br>


<label>Crew Id: </label>
<select name= "member_id">
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");
$query="select member_id from crew_master;";
$data=mysql_query($query);
while($record=mysql_fetch_array($data)){
	echo "<option value=\"".$record["member_id"]."\">".$record["member_id"]."</option>";
} 
mysql_close($con) or die(mysql_error()+" occurs");
?></select><br><br><br>

<label>Source Airport: </label><select name= "dep_airport_id">
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");
$query="select airport_id from airport;";
$data=mysql_query($query);
while($record=mysql_fetch_array($data)){
	echo "<option value=\"".$record["airport_id"]."\">".$record["airport_id"]."</option>";
} 
mysql_close($con) or die(mysql_error()+" occurs");
?></select><br><br><br>

<label>Departure Date: </label>
<input type="date" id="departure_date" name= "departure_date" required>
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
<a href="flight_crew.php"><button id=backbutton>Back</button></a><br><br>

</body>
</html>