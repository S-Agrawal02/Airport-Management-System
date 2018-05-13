<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

//$id = $_GET['id']; // $id is now defined
$member_id = $_GET['member_id'];
$flight_id = $_GET['flight_id'];
$dep_airport_id = $_GET['dep_airport_id'];

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

$query="delete from flight_crew where member_id='$member_id' and flight_id='$flight_id' and dep_airport_id='$dep_airport_id'";
mysql_query($query);
mysql_close($con);
header("Location: flight_crew_exec.php");
?> 