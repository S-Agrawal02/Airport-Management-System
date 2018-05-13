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
<li><a href="airport.php">Airports</a><

</li>
<li><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li><a href="flight_master.php">Flight Details</a></li>
<li id=active><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="index.php">Log out</a></li>
</ul></div><br><br><br>

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
		/*$query="delete from flight_schedule where flight_id='$flight_id' and dep_date='$dep_date' and source_airport_id='$source_airport_id'";
		mysql_query($query);
		$query="insert into flight_schedule values('$flight_id','$dep_date','$dep_time','$source_airport_id','$dest_airport_id',$passengers,'$status','$remarks')";
		*/
		$query="update flight_schedule set dep_time='$dep_time',dest_airport_id='$dest_airport_id', no_of_passengers=$passengers, status='$status', remarks='$remarks' where flight_id='$flight_id' and dep_date='$dep_date' and source_airport_id='$source_airport_id'";
		$result=mysql_query($query);

		if ($result)
		{
		echo '<h2>Successfully Executed</h2>';
		}
		else{
			echo "<h2>".mysql_error()."</h2>";
			}
			header("Location: flight_schedule_exec.php");

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

<fieldset><legend>Flight_Schedule : Edit</legend>


<form action="" method=post name="ins_form" id="ins_form" onsubmit="return validate()">
<br>
<label>Flight ID : </label>
<input type="text" name="flight_id" readonly value=<?php
$flight_id = $_GET['flight_id'];
echo $flight_id;
?>
>
<br><br><br>

<label>Departure Date : </label>
<input type="text" name="dep_date" readonly value=<?php
$dep_date = $_GET['dep_date'];
echo $dep_date;
?>
>
<br><br><br>

<label>Source Airport : </label>
<input type="text" name="source_airport_id" readonly value=<?php
$source_airport_id = $_GET['source_airport_id'];
echo $source_airport_id;
?>
 readonly>
<br><br><br>

<label>Departure Time : </label>
<input type="time" name="dep_time" value=
<?php
$dep_time = $_GET['dep_time'];
echo $dep_time;
?>
>
<br><br><br>

<label>Destination Airport : </label>
<select name= "dest_airport_id" id="dest_airport_id" value=<?php
$dest_airport_id = $_GET['dest_airport_id'];
echo $dest_airport_id;
?>
 required>
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
<input type="number" min="10" max="150" name= "passengers" value=<?php
$no_of_passengers = $_GET['no_of_passengers'];
echo $no_of_passengers;
?>
 required title="Enter a number between 10-150">
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
</form>

</fieldset>

<a href="flight_schedule.php"><button id=backbutton>Back</button></a><br><br>
</body>
</html>


<!--<form action="" method=post>
<br>

<!--
<label>Current Departure Date : </label>
<input type="date" name= "dep_date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
<br><br><br>
-->

<!-- 
<label>Current Source Airport : </label>
<select name= "source_airport_id" required>
		<?php
	/*	$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
		mysql_select_db("airline",$con) or die(mysql_error()+" occurs");
		$query="select airport_id from airport";
		$data=mysql_query($query);
		while($record=mysql_fetch_array($data)){
			echo "<option value=\"".$record["airport_id"]."\">".$record["airport_id"]."</option>";
		} 
		mysql_close($con) or die(mysql_error()+" occurs");
	*/
		?>
</select><br><br><br>
-->

<!--
<label>Update: </label>
<select name= "attribute">
	<!--	<option value="flight_id">Flight Id</option>
		<option value="dep_date">Date of departure</option>
		<option value="source_airport_id">Source Airport</option>
	-->
	<!--
		<option value="dep_time">Departure Time</option>
		<option value="dest_airport_id">Destination Airport</option>
		<option value="no_of_passengers">Passengers</option>
		<option value="status">Status</option>
		<option value="remarks">Remarks</option>
</select><br><br><br>

<label>New Value : </label><input type="text" name="new"><br><br><br>

<input type="submit" value="EDIT"/>
</form>-->

<!--
if($_POST)
{

//$id = $_GET['id']; // $id is now defined
/*$flight_id = $_GET['flight_id'];
$dep_date = $_GET['dep_date'];
$source_airport_id = $_GET['source_airport_id'];
$dep_time = $_GET['dep_time'];
$dest_airport_id = $_GET['dest_airport_id'];
$no_of_passengers = $_GET['no_of_passengers'];
$status = $_GET['status'];
*/
$attribute = $_POST["attribute"];
$new = $_POST["new"];

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];
if($attribute=='no_of_passengers')
{
	$query="update flight_schedule set $attribute=$new where flight_id='$flight_id' and dep_date='$dep_date' and source_airport_id='$source_airport_id'";
}
else
{
	$query="update flight_schedule set $attribute='$new' where flight_id='$flight_id' and dep_date='$dep_date' and source_airport_id='$source_airport_id'";
}
if(mysql_query($query))
	echo "Successful";
else
	echo "Error : ".mysql_error();
//header("Location: flight_schedule.php");
}
-->

<!--

<h3>Previous Values</h3>

<div style="color: white">

<?php
/*
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

$flight_id = $_GET['flight_id'];
$dep_date = $_GET['dep_date'];
$source_airport_id = $_GET['source_airport_id'];
$dep_time = $_GET['dep_time'];
$dest_airport_id = $_GET['dest_airport_id'];
$no_of_passengers = $_GET['no_of_passengers'];

echo "<table border = 1 >
<tr>
<th>Flight Id</th>
<th>Departure Date</th>
<th>Source Airport</th>
<th>Destination Airport</th>
<th>Departure Time</th>
<th>No of Passengers</th>
</tr>
<tr>
<td>".$flight_id."</td><td>".$dep_date."</td><td>".$source_airport_id."</td><td>".$dest_airport_id."</td><td>".$dep_time."</td><td>".$no_of_passengers."</td></tr></table><br><br>";



mysql_close($con) or die(mysql_error()+" occurs");
*/
?> 


</div>

-->