<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>All Flights</title>
<link rel="stylesheet" type="text/css" href="allflights.css">
</head>
<body>
<?php
include 'connectdbairline.php';
?>
<h1>All flights</h1>
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
<form action="updatearrivaltime.php" method="post">
<h3>Choose a Flight</h3>
<?php
   $query = "SELECT * FROM flight";
   $result = $connection->query($query);
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="theFlights" value="';
		echo $row["FlightNumber"] . " " . $row["ALCode"];
        echo '">' . $row["FlightNumber"] . " " . $row["ALCode"] . "<br>";
   }
?>
<h1></h1>
<b>
Enter Updated Departure Time: <input type="text" name="UpdatedTime"><br>
</b>
<h1></h1>
<input type="submit" value="Update Departure Time" id="submitbutton">
<?php
   $connection = NULL;
?>
</body>
</html>