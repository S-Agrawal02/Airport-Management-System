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
<li id=active><a href="airport.php">Airports</a></li>
<li><a href="flight_crew.php">Flight Crew</a></li>
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
		$airport_id=$_POST["airport_id"];
		$airport_name=$_POST["airport_name"];
		$location=$_POST["location"];
		$runways=$_POST["runways"];

		//if(!($source_airport_id==$dest_airport_id))
	//{
		/*$query="delete from flight_schedule where flight_id='$flight_id' and dep_date='$dep_date' and source_airport_id='$source_airport_id'";
		mysql_query($query);
		$query="insert into flight_schedule values('$flight_id','$dep_date','$dep_time','$source_airport_id','$dest_airport_id',$passengers,'$status','$remarks')";
		*/
		$query="update airport set location='$location', airport_name='$airport_name', runways=$runways where airport_id='$airport_id'";
		$result=mysql_query($query);

		if ($result)
		{
		echo '<h2>Successfully Edited</h2>';
		}
		else{
			echo "<h2>".mysql_error()."</h2>";
			}

$query="select * from airport";
$data=mysql_query($query);
echo "
<table border = 1 align=Center>
<tr>
<th>Airport Id</th>
<th>Airport Name</th>
<th>Location</th>
<th>Runways</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["airport_id"];
	echo "<td>".$record["airport_name"];
	echo "<td>".$record["location"];
	echo "<td>".$record["runways"];
	echo "</tr>";
}
echo "</table><br/><br/>";
header("Location: airport_exec.php");
}
mysql_close($con) or die(mysql_error()+" occurs");
?>

<fieldset><legend>Airport : Edit</legend>

<form action="" method=post name="ins_form" id="edit_form" onsubmit="return validate()">
<br>
<label>Airport ID : </label>
<input type="text" name="airport_id" readonly value=<?php
$airport_id = $_GET['airport_id'];
echo $airport_id;
?>
>
<br><br><br>

<label>Airport Name : </label>
<input type="text" name="airport_name" value=<?php
$airport_name = $_GET['airport_name'];
echo $airport_name;
?>
>
<br><br><br>

<label>Location : </label>
<input type="text" name="location" value=
<?php
$location = $_GET['location'];
echo $location;
?>
 readonly>
<br><br><br>


<label>No Of Runways : </label>
<input type="number" min="2" max="15" name= "runways" value=<?php
$runways = $_GET['runways'];
echo $runways;
?>
 required title="Enter a number between 10-150">
<br><br><br>

<input type="submit" value="Submit" />
</form>

</fieldset>



<a href="airport.php"><button id=backbutton>Back</button></a><br><br>
</body>
</html>
<!--
<h2>Airport</h2>
<?php
/*
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

if($_POST)
{
		$airport_id=$_POST["airport_id"];

		$attribute=$_POST["attribute"];
		$new=$_POST["new"];
		$query="update airport set ".$attribute."=\"".$new."\" where airport_id=\"".$airport_id."\";";
		//$query="update airport set ".'$attribute'."=".'$new'." where airport_id=".'$airport_id'."";

		$result=mysql_query($query);

		if ($result)
		{
		echo '<h2>Your query has been executed. Successfully Updated</h2>';
		}
		else{
			echo "<h2>".mysql_error()."</h2>";
			}
}

$query="select * from airport";
$data=mysql_query($query);
echo "
<table border = 1 align=Center>
<tr>
<th>Airport Id</th>
<th>Airport Name</th>
<th>Location</th>
<th>Runways</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["airport_id"];
	echo "<td>".$record["airport_name"];
	echo "<td>".$record["location"];
	echo "<td>".$record["runways"];
	echo "</tr>";
}
echo "</table><br/><br/>";

mysql_close($con) or die(mysql_error()+" occurs");
*/
?>
-->