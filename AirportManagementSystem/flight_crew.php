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
<li id=active><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="index.php">Log out</a></li>
</ul></div>

<!--
<table><tr><td  width="30%"></td><td><br/><br/><h2>Flight Crew</h2></td></tr><tr><td>


<a href="flight_crewi.php"><button>Insert</button></a><br><br>
<a href="flight_crewu.php"><button>Update</button></a><br><br>
<a href="flight_crewd.php"><button>Delete</button></a><br><br></td><td>
-->

<h2>Flight Crew</h2>

<table align="center">

<div id="t1">
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

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
<th>Delete</th>
<th>Edit</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["flight_id"];
	echo "<td>".$record["member_id"];
	$query1="select designation from crew_master where member_id=\"".$record["member_id"]."\"";
	$data1=mysql_query($query1);
	$record1=mysql_fetch_array($data1);
	echo "<td>".$record1["designation"];
	echo "<td>".$record["dep_airport_id"];
	echo "<td>".$record["departure_date"];
	echo "<td><a onClick=\"javascript: return confirm('Are you sure to delete this entry ?');\" href='flight_crew_delete.php?member_id=".urlencode($record["member_id"])."&flight_id=".urlencode($record["flight_id"])."&dep_airport_id=".urlencode($record["dep_airport_id"])."'> <img src=\"delete_icon.jpg\"> </a></td>";

	echo "<td><a onClick=\"javascript: return confirm('Are you sure to edit this entry ?');\" href='flight_crew_edit.php?member_id=".urlencode($record["member_id"])."&flight_id=".urlencode($record["flight_id"])."&dep_airport_id=".urlencode($record["dep_airport_id"])."&dep_date=".urlencode($record["departure_date"])."'> <img src=\"edit_icon.png\"> </a></td>";
	echo "</tr>";
}
echo "</table><br/><br/>";
mysql_close($con) or die(mysql_error()+" occurs");
?>
</div>
</table>
<center><a href="flight_crewi.php"><button style="padding: 5px">ADD</button><br><br></center>
</td></tr></table></body></html>