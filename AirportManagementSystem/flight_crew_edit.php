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

<script type="text/javascript">

function validate()
{

   var selectedText = document.getElementById('dep_date').value;
   var selectedDate = new Date(selectedText);
   var now = new Date();
   if (selectedDate < now) {
    alert("Date must be in the future");
    return false;
   }

   return true;
}
	
</script>

</head>
<body>
<h1>Airline Management System</h1>
<div id=navlist>
<ul>
<li><a href="airport.php">Airports</a></li>
<li id=active><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="login.php">Log out</a></li>
</ul></div><br><br>

<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

if($_POST)
{
		$member_id=$_POST["member_id"];
		$flight_id=$_POST["flight_id"];
		$dep_airport_id=$_POST["dep_airport_id"];
		$dep_date=$_POST["dep_date"];

		//if(!($source_airport_id==$dest_airport_id))
	//{
		/*$query="delete from flight_schedule where flight_id='$flight_id' and dep_date='$dep_date' and source_airport_id='$source_airport_id'";
		mysql_query($query);
		$query="insert into flight_schedule values('$flight_id','$dep_date','$dep_time','$source_airport_id','$dest_airport_id',$passengers,'$status','$remarks')";
		*/
		$query="update flight_crew set departure_date='$dep_date' where member_id='$member_id' and flight_id='$flight_id' and dep_airport_id='$dep_airport_id'";
		$result=mysql_query($query);

		if ($result)
		{
		echo '<h2>Successfully Edited</h2>';
		}
		else{
			echo "<h2>".mysql_error()."</h2>";
			}

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
header("Location: flight_crew_exec.php");
}
mysql_close($con) or die(mysql_error()+" occurs");
?>

<fieldset><legend>Flight Crew: Edit</legend>

<form action="" method=post name="ins_form" id="edit_form" onsubmit="return validate()">
<br>
<label>Flight ID : </label>
<input type="text" name="flight_id" value=<?php
$flight_id = $_GET['flight_id'];
echo $flight_id;
?>
>
<br><br><br>


<label>Member ID : </label>
<input type="text" name="member_id" readonly value=<?php
$member_id = $_GET['member_id'];
echo $member_id;
?>
>
<br><br><br>

<label>Source Airport : </label>
<input type="text" name="dep_airport_id" readonly value=<?php
$dep_airport_id = $_GET['dep_airport_id'];
echo $dep_airport_id;
?>
 readonly>
<br><br><br>

<label>Departure Date : </label>
<input type="Date" name="dep_date" id="dep_date" value=<?php
$dep_date = $_GET['dep_date'];
echo $dep_date;
?>
>
<br><br><br>


<input type="submit" value="Submit" />
</form>
</fieldset>

<a href="crew_master.php"><button id=backbutton>Back</button></a><br><br>
</body>
</html>