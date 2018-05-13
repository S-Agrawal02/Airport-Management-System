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
<li ><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li id=active><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="login.php">Log out</a></li>
</ul></div><br><br>

<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

if($_POST)
{
$flight_id=$_POST["flight_id"];
$airline=$_POST["airline"];
$class=$_POST["class"];
$capacity=$_POST["capacity"];

		//if(!($source_airport_id==$dest_airport_id))
	//{
		/*$query="delete from flight_schedule where flight_id='$flight_id' and dep_date='$dep_date' and source_airport_id='$source_airport_id'";
		mysql_query($query);
		$query="insert into flight_schedule values('$flight_id','$dep_date','$dep_time','$source_airport_id','$dest_airport_id',$passengers,'$status','$remarks')";
		*/
		$query="update flight_master set airline='$airline', class='$class', capacity=$capacity where flight_id='$flight_id'";
		$result=mysql_query($query);

		if ($result)
		{
		echo '<h2>Successfully Edited</h2>';
		}
		else{
			echo "<h2>".mysql_error()."</h2>";
			}

$query="select * from flight_master;";
$data=mysql_query($query);
echo "
<table border = 1 align=Center>
<tr>
<th>Flight Id</th>
<th>Airlines</th>
<th>Class Type</th>
<th>Capacity</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["flight_id"]."</td>";
	echo "<td>".$record["airline"]."</td>";
	echo "<td>".$record["class"]."</td>";
	echo "<td>".$record["capacity"]."</td>";
	echo "</tr>";
}
echo "</table><br/><br/>";
header("Location: flight_master_exec.php");
}
mysql_close($con) or die(mysql_error()+" occurs");

?>

<fieldset><legend>Flight_Details: Edit</legend>

<form action="" method=post name="ins_form" id="edit_form" onsubmit="return validate()">
<br>
<label>Flight ID : </label>
<input type="text" name="flight_id" readonly value=<?php
$flight_id = $_GET['flight_id'];
echo $flight_id;
?>
>
<br><br><br>

<label>Airline : </label>
<select name= "airline" id="airline" value=<?php
$airline = $_GET['airline'];
echo $airline;
?>
 required>
<option value="Air India"> Air India </option>
<option value="Jet Airways"> Jet Airways </option>
<option value="Spice Jet"> Spice Jet </option>
<option value="Indigo"> Indigo </option>
<option value="Go Air"> Go Air </option>
<option value="Vistara"> Vistara </option>
</select>
<br><br><br>


<label>Class : </label>
<select name= "class" id="class" value=<?php
$class = $_GET['class'];
echo $class;
?>
 required>
 	<option value="Economy">Economy</option>
	<option value="Business">Business</option>
	<option value="Luxury">Luxury</option>
</select>
<br><br><br>


<label>Capacity : </label>
<input type="text" name="capacity" value=<?php
$capacity = $_GET['capacity'];
echo $capacity;
?> required>
<br><br><br>



<input type="submit" value="Submit" />
</form>
</fieldset>

<a href="flight_master.php"><button id=backbutton>Back</button></a><br><br>
</body>
</html>