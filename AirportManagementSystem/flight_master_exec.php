<html>
<head>
<title>Airline</title>
<link href="css.css" rel="stylesheet">
<link href="css2.css" rel="stylesheet">
<style>
th{
	width:100px;
}
</style>
</head>
<body>
<h1>Airline Management System</h1>
<div id=navlist><ul>
<li><a href="airport.php">Airports</a></li>
<li><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li id=active><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="index.php">Log out</a></li>
</ul></div>

<!--
<table><tr><td  width="40%"></td><td><br/><br/><h2>Flight Details</h2></td></tr><tr><td>


<a href="flight_masteri.php"><button>Insert</button></a><br><br>
<a href="flight_masteru.php"><button>Update</button></a><br><br>
<a href="flight_masterd.php"><button>Delete</button></a><br><br></td><td>

-->
<h2>Flight Details  :  Edited Successfully</h2>

<table align="center">

<div id="t1">
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

$query="select * from flight_master;";
$data=mysql_query($query);
echo "
<table border = 1 align=Center width=\"80%\">
<tr>
<th>Flight Id</th>
<th>Airlines</th>
<th>Class Type</th>
<th>Capacity</th>
<th>Delete</th>
<th>Edit</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["flight_id"];
	echo "<td>".$record["airline"];
	echo "<td>".$record["class"];
	echo "<td>".$record["capacity"];
	echo "<td><a onClick=\"javascript: return confirm('Are you sure to delete this entry ?');\" href='flight_master_delete.php?member_id=".urlencode($record["flight_id"])."'> <img src=\"delete_icon.jpg\"> </a></td>";

	echo "<td><a onClick=\"javascript: return confirm('Are you sure to edit this entry ?');\" href='flight_master_edit.php?flight_id=".urlencode($record["flight_id"])."&airline=".urlencode($record["airline"])."&class=".urlencode($record["class"])."&capacity=".urlencode($record["capacity"])."'> <img src=\"edit_icon.png\"> </a></td>";

	
	echo "</tr>";
}
echo "</table><br/><br/>";
mysql_close($con) or die(mysql_error()+" occurs");
?>
</div>
</table>
<center><a href="flight_masteri.php"><button style="padding: 5px">ADD</button><br><br></center>
</td></tr></table></body></html>