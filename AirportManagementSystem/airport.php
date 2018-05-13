<html>
<head>
<title>Airline</title>
<link href="css.css" rel="stylesheet">
<link href="css2.css" rel="stylesheet">
<!--
	<style>
#t1 table {
    border-collapse: collapse;
    width: 100%;
}

#t1 th, td {
    text-align: left;
    padding: 8px;
}

#t1 tr:nth-child(even){background-color: #111}

#t1 th {
    background-color: #4CAF50;
    color: white;
}
</style>
-->
</head>
<body>
<h1>Airline Management System</h1>
<div id=navlist><ul>
<li id=active><a href="airport.php">Airports</a></li>
<li><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="index.php">Log out</a></li>
</ul></div>
<br>
<!--
<table><tr><td  width="30%"></td><td><br/><br/><h2>Airport</h2></td></tr><tr><td>


<a href="airporti.php"><button>Insert</button></a><br><br>
<a href="airportu.php"><button>Update</button></a><br><br>
<a href="airportd.php"><button>Delete</button></a><br><br></td><td>

-->

<h2>Airports</h2>

<table align="center">
<div id="t1">
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

$query="select * from airport";
$data=mysql_query($query);
echo "
<table border = 1 align=Center>
<tr>
<th>Airport Id</th>
<th>Airport Name</th>
<th>Location</th>
<th>Runways</th>
<th>Delete</th>
<th>Edit</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["airport_id"];
	echo "<td>".$record["airport_name"];
	echo "<td>".$record["location"];
	echo "<td>".$record["runways"];
	echo "<td><a onClick=\"javascript: return confirm('Are you sure to delete this entry ?');\" href='airport_delete.php?airport_id=".urlencode($record["airport_id"])."'> <img src=\"delete_icon.jpg\"> </a></td>";

	echo "<td><a onClick=\"javascript: return confirm('Are you sure to edit this entry ?');\" href='airport_edit.php?airport_id=".urlencode($record["airport_id"])."&airport_name=".urlencode($record["airport_name"])."&location=".urlencode($record["location"])."&runways=".urlencode($record["runways"])."'> <img src=\"edit_icon.png\"> </a></td>";

	echo "</tr>";

}
echo "</table><br/><br/>";
mysql_close($con) or die(mysql_error()+" occurs");
?>
</div>
</table>
<center><a href="airporti.php"><button style="padding: 5px">ADD</button><br><br></center>
</body></html>