<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

//$id = $_GET['id']; // $id is now defined
$flight_id = $_GET['flight_id'];
$dep_date = $_GET['dep_date'];
$source_airport_id = $_GET['source_airport_id'];

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

$query="delete from flight_schedule where flight_id='$flight_id' and dep_date='$dep_date' and source_airport_id='$source_airport_id'";
mysql_query($query);
mysql_close($con);
header("Location: flight_schedule.php");
?> 