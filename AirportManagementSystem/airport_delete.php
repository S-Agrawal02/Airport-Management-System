<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

//$id = $_GET['id']; // $id is now defined
$airport_id = $_GET['airport_id'];

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

$query="delete from airport where airport_id='$airport_id'";
mysql_query($query);
mysql_close($con);
header("Location: airport.php");
?> 