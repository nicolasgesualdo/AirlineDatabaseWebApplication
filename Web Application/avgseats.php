<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Average Number Of Seats</title>
<link rel="stylesheet" type="text/css" href="avgseats.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
</head>
<body>
<?php
include 'connectdbairline.php';
?>
<h1>Average number of seats for the day:</h1>
<table>
<?php
	$theDay= $_POST["dayofweek"];
	$query = 'SELECT AVG(MaxSeats) AS avgSeat FROM flight f, dayoftheweek d, airplane a, airplanetype apt WHERE d.DayOfWeek ="' . $theDay . '" and f.ALCode = d.ALCode and f.FlightNumber = d.FlightNum and f.ALCode = d.ALCode and f.PlaneID = a.AirplaneID and a.PlaneTypeName = apt.TypeName';
	$result=$connection->query($query);
    
    while ($row=$result->fetch()) {
	echo "<tr><td>".$row["avgSeat"]."</td></tr>";
    }
?>
</table>
<?php
   $connection = NULL;
?>
</body>
</html>