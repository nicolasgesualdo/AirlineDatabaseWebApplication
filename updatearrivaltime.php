<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Departure Time</title>
<link rel="stylesheet" type="text/css" href="allflights.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Chango&display=swap" rel="stylesheet">
</head>
<body>
<?php
include 'connectdbairline.php';
?>
<p>
<?php
	$whichTime= $_POST["UpdatedTime"];
	$whichFlightCode= $_POST["theFlights"];
	$pieces = explode(" ", $whichFlightCode);
	
	$query = 'UPDATE flight SET ActualDeparture = "' . $whichTime . '" WHERE FlightNumber = "' . $pieces[0] . '" and ALCode = "' . $pieces[1] . '"';
	$result=$connection->query($query);
    
	echo "Your Actual Departure Time Was Updated!";

?>
<table>
<?php
   $query = "SELECT * FROM flight";
   $result = $connection->query($query);
	echo "<table border='1'>
	<tr>
		<th>Flight Number</th>
		<th>Airline Code</th>
		<th>Scheduled Departure</th>
		<th>Actual Departure</th>
	</tr>";
	while ($row=$result->fetch()) {
		echo "<tr><td>".$row["FlightNumber"]."</td><td>".$row["ALCode"]."</td><td>".$row["SchedDeparture"]."</td><td>".$row["ActualDeparture"]."</td></tr>";
	}

?>
</table>
</p>
<?php
   $connection = NULL;
?>
</body>
</html>