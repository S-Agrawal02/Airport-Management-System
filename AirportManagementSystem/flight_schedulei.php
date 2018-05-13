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

	var s = document.getElementById("source_airport_id");
	var d = document.getElementById("dest_airport_id");
	if(s.value==d.value)
	{
		//window.alert("Wrong");
   		alert("Source and Destination Airport cant be same");
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
<li><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li><a href="flight_master.php">Flight Details</a></li>
<li id=active><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="index.php">Log out</a></li>
</ul></div><br><br>

<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

if($_POST)
{
		$flight_id=$_POST["flight_id"];
		$dep_date=$_POST["dep_date"];
		$dep_time=$_POST["dep_time"];
		$source_airport_id=$_POST["source_airport_id"];
		$dest_airport_id=$_POST["dest_airport_id"];
		$passengers=$_POST["passengers"];
		$status=$_POST["status"];
		$remarks=$_POST["remarks"];

		//if(!($source_airport_id==$dest_airport_id))
	//{
		$query="select capacity from flight_master where flight_id='$flight_id'";
		$result=mysql_query($query);
		$record=mysql_fetch_array($result);

		if((int)$record[0]<=120)
		{
			$query="insert into flight_schedule values('$flight_id','$dep_date','$dep_time','$source_airport_id','$dest_airport_id',$passengers,1,'$status','$remarks')";
		}

		else
			$query="insert into flight_schedule values('$flight_id','$dep_date','$dep_time','$source_airport_id','$dest_airport_id',$passengers,2,'$status','$remarks')";

		$result=mysql_query($query);

		if ($result)
		{
		echo '<h2>Successfully Added</h2>';
		}
		else{
			echo "<h2>".mysql_error()."</h2>";
			}
	/*}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Source & Destination cant be same")';
			echo '</script>';
		}
	*/
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
<th>Remarks</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["flight_id"];
	echo "<td>".$record["dep_date"];
	echo "<td>".$record["dep_time"];
	echo "<td>".$record["source_airport_id"];
	echo "<td>".$record["dest_airport_id"];
	echo "<td>".$record["no_of_passengers"];
	echo "<td>".$record["status"];
	echo "<td>".$record["remarks"];
	echo "</tr>";
}
echo "</table><br/><br/>";
}
mysql_close($con) or die(mysql_error()+" occurs");
?>

<fieldset><legend>Flight_Schedule : Insert</legend>
<form action="" method=post name="ins_form" id="ins_form" onsubmit="return validate()">
<br>
<label>Flight ID : </label>
<select name= "flight_id">
		<?php
		$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
		mysql_select_db("airline",$con) or die(mysql_error()+" occurs");
		$query="select flight_id from flight_master";
		$data=mysql_query($query);
		while($record=mysql_fetch_array($data)){
			echo "<option value=\"".$record["flight_id"]."\">".$record["flight_id"]."</option>";
		} 
		mysql_close($con) or die(mysql_error()+" occurs");
		?>
</select><br><br><br>

<label>Departure Date : </label>
<input type="date" name= "dep_date" id="dep_date" required>
<br><br><br>

<label>Departure Time : </label>
<input type="time" name= "dep_time" required">
<br><br><br>

<label>Source Airport : </label>
<select name= "source_airport_id" id="source_airport_id" required>
		<?php
		$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
		mysql_select_db("airline",$con) or die(mysql_error()+" occurs");
		$query="select airport_id from airport";
		$data=mysql_query($query);
		while($record=mysql_fetch_array($data)){
			echo "<option value=\"".$record["airport_id"]."\">".$record["airport_id"]."</option>";
		} 
		mysql_close($con) or die(mysql_error()+" occurs");
		?>
</select><br><br><br>

<label>Destination Airport : </label>
<select name= "dest_airport_id" id="dest_airport_id" required>
		<?php
		$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
		mysql_select_db("airline",$con) or die(mysql_error()+" occurs");
		$query="select airport_id from airport;";
		$data=mysql_query($query);
		while($record=mysql_fetch_array($data)){
			echo "<option value=\"".$record["airport_id"]."\">".$record["airport_id"]."</option>";
		} 
		mysql_close($con) or die(mysql_error()+" occurs");
		?>
</select><br><br><br>

<label>No Of Passengers : </label>
<input type="number" min="10" max="150" name= "passengers" required title="Enter a number between 10-150">
<br><br><br>

<label>Status : </label>
<select name="status">
	<option value="Ontime">Ontime</option>
	<option value="Delayed">Delayed</option>
</select>
<br><br><br>

<label>Remarks : </label>
<input type="text" name= "remarks" required>
<br><br><br>

<input type="submit" value="Submit" />
</form></fieldset>

<a href="flight_schedule.php"><button id=backbutton>Back</button></a><br><br>
</body>
</html>