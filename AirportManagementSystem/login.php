<!DOCTYPE html>
<html>
<head>
<title>Airline</title>
<link href="css.css" rel="stylesheet">
<style>
h1{
	font-size:40px;
}
h2, h3{
	text-decoration: none;
}
h3{
	font-size:20px;
}
</style></head>
<body>
<h1>Airline Management System</h1>
<div id=navlist><ul><li><a style="color:rgba(225,225,225,0)">Airports</a></li></ul></div>

<?php 
$user=$_POST["user"];
$pass= $_POST["pass"];
//Opens connection to server
$dbcon = mysql_connect('localhost','root', '');
if (!$dbcon){
	die('Connection Error' .mysql_error());}
//Select database
$dbselect = mysql_select_db('airline', $dbcon);
if(!$dbselect){
	die('Cant connect: ' .mysql_error());
}
if(!$pass){
	echo "<h2>Incorrect Login Credentials</h2><h3>Please try again.</h3>";
}else{
$query="SELECT password FROM admin WHERE username = '$user'";
$result1=mysql_query($query);
$arr_sa = mysql_fetch_array($result1);
$result = $arr_sa["password"];
if(!$result){
  echo "<h2>Incorrect Login Credentials</h2><h3>Please try again.</h3>";
  echo "hello : ";
}
elseif($pass==$result){
header("Location: airport.php");
}
else{
  echo "<h2>Incorrect Login Credentials</h2><h3>Please try again.</h3>";
 // echo "<h2>hello : </h2>"."<h3>$query</h3>";
}}
mysql_close($dbcon)
?>
</body>
</html>