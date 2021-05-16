<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Flights</title>
<link rel="stylesheet" type="text/css" href="addflight.css">
</head>
<body>
<?php
include 'connectdbairline.php';
?>
<h1>Add flight</h1>
<table>
<form action="addnewflight.php" method="post">
<h4>Choose Airline</h4>
<?php
   $query = "SELECT * FROM airline";
   $result = $connection->query($query);
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="theAirline" value="';
        echo $row["AirlineCode"];
        echo '">' . $row["AirlineCode"] . " - " . $row["AirlineName"] . "<br>";
   }
?>
<h4>Choose Departure Airport</h4>
<?php
   $query = "SELECT * FROM airport";
   $result = $connection->query($query);
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="Departure" value="';
        echo $row["AirportCode"];
        echo '">' . $row["AirportCode"] . " - " . $row["AirportName"] . "<br>";
   }
?>
<h4>Choose Arrival Airport</h4>
<?php
   $query = "SELECT * FROM airport";
   $result = $connection->query($query);
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="Arrival" value="';
		echo $row["AirportCode"];
        echo '">' . $row["AirportCode"] . " - " . $row["AirportName"] . "<br>";
   }
?>
<br>
<b>
3 Digit Flight Number: <input type="text" name="UserFlightNumber"><br>
</b>
<input type="checkbox" name="day[]" value="Monday">Monday<br>
<input type="checkbox" name="day[]" value="Tuesday">Tuesday<br>
<input type="checkbox" name="day[]" value="Wednesday">Wednesday<br>
<input type="checkbox" name="day[]" value="Thursday">Thursday<br>
<input type="checkbox" name="day[]" value="Friday">Friday<br>
<input type="checkbox" name="day[]" value="Saturday">Saturday<br>
<input type="checkbox" name="day[]" value="Sunday">Sunday<br>
<b>
Departure Time: <input type="text" name="DepartTime"><br>
Arrival Time: <input type="text" name="ArriveTime"><br>
Plane ID: <input type="text" name="Planeid"><br>
</b>
<input type="submit" value="Add New Flight" id="submitbutton">
</form>
</table>
<?php
   $connection = NULL;
?>
</body>
</html>