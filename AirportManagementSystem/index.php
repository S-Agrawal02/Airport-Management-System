<!DOCTYPE html>
<html>
<head>
<title>Airline</title>
<link href="css.css" rel="stylesheet">

<style>
form{
	text-align: center;
}
h1{
	font-size:40px;
}
fieldset{
	width: 20%;
	margin-left: 40%;
}
</style>
</head>
<body>
<h1>Airline Management System</h1>
<div id=navlist><ul><li><a style="color:rgba(225,225,225,0)">Airports</a></li></ul></div><br/>
  
  <fieldset><legend align="center">Log-in</legend>
  <form action="login.php" method="POST">
        <br><label for="name">Username:</label><br><br><input type="text" id="user" name="user" required pattern="^[^\s]{2,15}$" autocomplete="off"><br><br>
		<label for="pwd">Password:</label><br><br><input type="password" id="pass" name="pass" required pattern="^[^\s]{2,15}$"><br><br><br>
  <button id="formbutton" type="submit">Log-in</button>
</form>
</fieldset>

</body>
</html>