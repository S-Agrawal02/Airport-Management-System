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
<li ><a href="flight_crew.php">Flight Crew</a></li>
<li id=active><a href="crew_master.php">Crew Details</a></li>
<li><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="login.php">Log out</a></li>
</ul></div>

<!--
<table><tr><td  width="30%"></td><td><br/><br/><h2>Crew Details</h2></td></tr><tr><td>


<a href="crew_masteri.php"><button>Insert</button></a><br><br>
<a href="crew_masteru.php"><button>Update</button></a><br><br>
<a href="crew_masterd.php"><button>Delete</button></a><br><br></td><td>
-->

<h2>Crew Details  :  Edited Successfully</h2>

<table align="center">

<div id="t1">
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

$query="select * from crew_master;";
$data=mysql_query($query);
echo "
<table border = 1 align=Center>
<tr>
<th>Member id</th>
<th>Member name</th>
<th>Designation</th>
<th>Mobile number</th>
<th>Email</th>
<th>Delete</th>
<th>Edit</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["member_id"]."</td>";
	echo "<td>".$record["member_name"]."</td>";
	echo "<td>".$record["designation"]."</td>";
	echo "<td>".$record["mobile"]."</td>";
	echo "<td>".$record["email"]."</td>";
	echo "<td><a onClick=\"javascript: return confirm('Are you sure to delete this entry ?');\" href='crew_master_delete.php?member_id=".urlencode($record["member_id"])."'> <img src=\"delete_icon.jpg\"> </a></td>";

	echo "<td><a onClick=\"javascript: return confirm('Are you sure to edit this entry ?');\" href='crew_master_edit.php?member_id=".urlencode($record["member_id"])."&member_name=".urlencode($record["member_name"])."&designation=".urlencode($record["designation"])."&mobile=".urlencode($record["mobile"])."&email=".urlencode($record["email"])."'> <img src=\"edit_icon.png\"> </a></td>";
	echo "</tr>";
}
echo "</table><br/><br/>";
mysql_close($con) or die(mysql_error()+" occurs");
?>

</div>
</table>
<center><a href="crew_masteri.php"><button style="padding: 5px">ADD</button><br><br></center>
</body></html>