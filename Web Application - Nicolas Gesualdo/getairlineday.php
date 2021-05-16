<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Airline Flights per Day</title>
	<link rel="stylesheet" type="text/css" href="ontimeflights.css">
</head>
<body>
<?php
include 'connectdbairline.php';
?>
<h1>Flights for the day</h1>
<table>
<?php
	$whichAirline= $_POST["airlineCode"];
	$whichDay= $_POST["dayWeek"];
	$query = 'SELECT f.FlightNumber, f.ALCode, a1.City, a2.City AS City2 FROM flight f, dayoftheweek d, airport a1, airport a2 WHERE f.ALCode = d.ALCode and f.FlightNumber = d.FlightNum and d.DayOfWeek ="' . $whichDay . '"and f.ALCode ="' . $whichAirline . '"and f.DeparturePortCode = a1.AirportCode and f.ArrivalPortCode = a2.AirportCode';
	$result=$connection->query($query);
    
	if($result->rowCount() === 0){
		echo 'Nothing found';
	}
	else {
		echo "<table border='1'>
		<tr>
			<th>Flight Number</th>
			<th>Airline Code</th>
			<th>Departure City</th>
			<th>Arrival City</th>
		</tr>";
		while ($row=$result->fetch()) {
		echo "<tr><td>".$row["FlightNumber"]."</td><td>".$row["ALCode"]."</td><td>".$row["City"]."</td><td>".$row["City2"]."</td></tr>";
		}
	}
?>
</table>
<?php
   $connection = NULL;
?>
</body>
</html>