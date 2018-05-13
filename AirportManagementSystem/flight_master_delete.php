<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

//$id = $_GET['id']; // $id is now defined
$flight_id = $_GET['flight_id'];

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

$query="delete from flight_master where flight_id='$flight_id'";
mysql_query($query);
mysql_close($con);
header("Location: flight_master.php");
?> 