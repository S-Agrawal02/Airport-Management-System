<html>
<head>
<title>Airline</title>
<link href="css.css" rel="stylesheet">
<link href="css2.css" rel="stylesheet">

</head>
<body>
<h1>Airline Management System</h1>
<div id=navlist><ul>
<li><a href="airport.php">Airports</a></li>
<li><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li><a href="flight_master.php">Flight Details</a></li>
<li id=active><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="index.php">Log out</a></li>
</ul></div>

<!--
<table><tr><td  width="30%"></td><td><br/><br/><h2>Flight Schedule</h2></td></tr><tr><td>

<td>


<a href="flight_schedulei.php"><button>Insert</button></a><br><br>
<a href="flight_scheduleu.php"><button>Update</button></a><br><br>
<a href="flight_scheduled.php"><button>Delete</button></a><br><br></td>
-->

<h2>Flight Schedule : Edited Successfully</h2>
<br><br>
<table><td>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

$query="select * from flight_schedule";
$data=mysql_query($query);
echo "
<table border = 1 align=Center>
<tr>
<th>Flight Id</th>
<th>Departure Date</th>
<th>Departure Time</th>
<th>Source Airport</th>
<th>Destination Airport</th>
<th>Passengers</th>
<th>Status</th>
<th>Delete</th>
<th>Edit</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	//echo "<td>".$record["No"]."</td>";
	echo "<td>".$record["flight_id"]."</td>";
	echo "<td>".$record["dep_date"]."</td>";
	echo "<td>".$record["dep_time"]."</td>";
	echo "<td>".$record["source_airport_id"]."</td>";
	echo "<td>".$record["dest_airport_id"]."</td>";
	echo "<td>".$record["no_of_passengers"]."</td>";
	echo "<td>".$record["status"]."</td>";
	//echo "<td>".$record["remarks"]."</td>";
	//echo "<td><a href=\"delete.php?id=".$record["No"]."\"&eventid=" . $event_id><img src=\"delete_icon.jpg\"></a></td>";
	//echo "<td><a href=\"delete.php?flight_id='$record["flight_id"]' & dep_date='$record["dep_date"]' & source_airport_id='$record["source_airport_id"]' \"><img src=\"delete_icon.jpg\"></a></td>";
	echo "<td><a onClick=\"javascript: return confirm('Are you sure to delete this entry ?');\" href='flight_schedule_delete.php?flight_id=".urlencode($record["flight_id"])."&dep_date=".urlencode($record["dep_date"])."&source_airport_id=".urlencode($record["source_airport_id"])."'> <img src=\"delete_icon.jpg\"> </a></td>";

	echo "<td><a onClick=\"javascript: return confirm('Are you sure to edit this entry ?');\" href='flight_schedule_edit.php?flight_id=".urlencode($record["flight_id"])."&dep_date=".urlencode($record["dep_date"])."&source_airport_id=".urlencode($record["source_airport_id"])."&dep_time=".urlencode($record["dep_time"])."&dest_airport_id=".urlencode($record["dest_airport_id"])."&no_of_passengers=".urlencode($record["no_of_passengers"])."&status=".urlencode($record["status"])."'> <img src=\"edit_icon.png\"> </a></td>";
	
	echo "</tr>";
}

echo "</table><br/><br/>";


mysql_close($con) or die(mysql_error()+" occurs");
?>


</td></tr></table>
<center><a href="flight_schedulei.php"><button style="padding: 5px">ADD</button><br><br></center>
</body></html>