<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

//$id = $_GET['id']; // $id is now defined
$member_id = $_GET['member_id'];

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

$query="delete from crew_master where member_id='$member_id'";
mysql_query($query);
mysql_close($con);
header("Location: crew_master.php");
?> 