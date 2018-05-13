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
<li id=active><a href="crew_master.php">Crew Details</a></li>
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
		$member_name=$_POST["member_name"];
		$designation=$_POST["designation"];
		$mobile=$_POST["mobile"];
		$email=$_POST["email"];

		//if(!($source_airport_id==$dest_airport_id))
	//{
		/*$query="delete from flight_schedule where flight_id='$flight_id' and dep_date='$dep_date' and source_airport_id='$source_airport_id'";
		mysql_query($query);
		$query="insert into flight_schedule values('$flight_id','$dep_date','$dep_time','$source_airport_id','$dest_airport_id',$passengers,'$status','$remarks')";
		*/
		$query="update crew_master set member_name='$member_name', mobile=$mobile, designation='$designation', email='$email' where member_id='$member_id'";
		$result=mysql_query($query);

		if ($result)
		{
		echo '<h2>Successfully Edited</h2>';
		}
		else{
			echo "<h2>".mysql_error()."</h2>";
			}

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
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["member_id"]."</td>";
	echo "<td>".$record["member_name"]."</td>";
	echo "<td>".$record["designation"]."</td>";
	echo "<td>".$record["mobile"]."</td>";
	echo "<td>".$record["email"]."</td>";
	echo "</tr>";
}
echo "</table><br/><br/>";
header("Location: crew_master_exec.php");
}
mysql_close($con) or die(mysql_error()+" occurs");

?>

<fieldset><legend>Crew_Details: Edit</legend>

<form action="" method=post name="ins_form" id="edit_form" onsubmit="return validate()">
<br>
<label>Member ID : </label>
<input type="text" name="member_id" readonly value=<?php
$member_id = $_GET['member_id'];
echo $member_id;
?>
>
<br><br><br>

<label>Member Name : </label>
<input type="text" name="member_name" value=<?php
$member_name = $_GET['member_name'];
echo $member_name;
?>
>
<br><br><br>

<label>Designation : </label>
<select name= "designation" id="designation" value=<?php
$designation = $_GET['designation'];
echo $designation;
?>
 required>
 	<option value="Pilot">Pilot</option>
	<option value="Manager">Manager</option>
	<option value="Air Hostess">Air Hostess</option>
	<option value="Staff">Staff</option>
</select>
<br><br><br>


<label>Mobile No : </label>
<input type="tel" name="mobile" pattern="[789]{1}[0-9]{9}" title="Please Enter a valid Mobile Number" value=<?php
$mobile = $_GET['mobile'];
echo $mobile;
?> required>
<br><br><br>

<label>Email :</label><input type="email" name="email"  value=<?php
$email = $_GET['email'];
echo $email;
?> pattern="^[a-z]{2}[a-zA-Z0-9_]{0,}@[a-z]{2,10}.[a-z]{2,5}[?(.)[a-z]{2,5}]$" required>
<br><br><br>

<input type="submit" value="Submit" />
</form>
</fieldset>

<a href="crew_master.php"><button id=backbutton>Back</button></a><br><br>
</body>
</html>