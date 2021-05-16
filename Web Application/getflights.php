<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>On Time Flights</title>
	<link rel="stylesheet" type="text/css" href="ontimeflights.css">
</head>
<body>
<?php
include 'connectdbairline.php';
?>
<h1>On Time flights</h1>
<table>
<?php
   $query = 'SELECT * FROM flight WHERE SchedArrival = ActualArrival';
   $result=$connection->query($query);

	if($result->rowCount() === 0){	
		echo 'No flights are on time';
	}
	else{
		echo "<table border='1'>
		<tr>
			<th>Flight Number</th>
			<th>Airline Code</th>
			<th>Scheduled Arrival</th>
			<th>Actual Arrival</th>
		</tr>";
		while ($row=$result->fetch()) {
		echo "<tr><td>".$row["FlightNumber"]."</td><td>".$row["ALCode"]."</td><td>".$row["SchedArrival"]."</td><td>".$row["ActualArrival"]."</td></tr>";
		}
	}
																							
?>
</table>
<?php
   $connection = NULL;
?>
</body>
</html>