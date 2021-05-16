<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nick's Airlines</title>
	<link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body>
<?php
include 'connectdbairline.php';
?>
<ul>
	<li><img src="Nlogo.jpg" alt="Nlogo" width="85" height="85"></li>
	<li><h1>Nick's Airlines</h1></li>
	<li><a href="getflights.php">On Time Flights</a></li>
	<li><a href="addFlights.php">Add Flight</a></li>
	<li><a href="allflights.php">See All Flights</a></li>
</ul>
<img src="Ad.jpg" alt="Ad">

<h2>Welcome to Nick's Airlines, come fly with us!</h2>
<h3>Pick an airline and find your flight!</h3>
<form action="getairlineday.php" method="post">
	Airline Code: <input type="text" name="airlineCode">
	Day of Week: <input type="text" name="dayWeek">
	<input type="submit" value="Find Flights">
</form>
<h3>Find average number of seats availible</h3>
<form action="avgseats.php" method="post">
	Day of Week: <input type="text" name="dayofweek">
	<input type="submit" value="Find Seats">
</form>
	<br>
	<h2>Airlines we offer!</h2>
	<li><img src="ACplane.jpg" alt="plane" width="466" height="296"></li>
	<li><img src="WSplane.jpg" alt="westjet" width="466" height="296"></li>
	<li><img src="DLplane.jpg" alt="delta" width="466" height="296"></li>
	<h2> </h2>
<?php
$connection = NULL;
?>
</body>
</html>