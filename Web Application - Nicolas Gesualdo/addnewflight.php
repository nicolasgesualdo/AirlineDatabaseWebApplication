<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Flight to Database</title>
<link rel="stylesheet" type="text/css" href="addflight.css">
<link href="https://fonts.googleapis.com/css2?family=Chango&display=swap" rel="stylesheet">
</head>
<body>
<?php
   include 'connectdbairline.php';
?>
<ol>
<p>
<?php
   $whichAirline= $_POST["theAirline"];
   $theDeparture = $_POST["Departure"];
   $theArrival =$_POST["Arrival"];
   $theFlightNum = $_POST["UserFlightNumber"];
   $dayofweek = $_POST['day'];
   $Dtime = $_POST["DepartTime"];
   $Atime = $_POST["ArriveTime"];
   $PlaneID = $_POST["Planeid"];
   $nullValue = NULL;
   
   $query2 = 'INSERT INTO flight values("' . $theFlightNum . '","' . $whichAirline . '","' . $Dtime . '","'. $Atime . '","'. $PlaneID . '","'
   . $theDeparture . '","'. $theArrival . '", NULL , NULL)';
   
   $numRows = $connection->exec($query2);
   foreach($dayofweek as $day){
	   $query3 = 'INSERT INTO dayoftheweek values("' . $theFlightNum . '","' . $whichAirline . '","' . $day . '")';
	   $numRows3 = $connection->exec($query3);
   }
   echo "Your flight was added!";
?>
</p>

<table>
<h3>Flights</h3>
<?php
   $query = 'SELECT * FROM flight';
   $result=$connection->query($query);

	echo "<table border='1'>
	<tr>
		<th>Flight Number</th>
		<th>Airline Code</th>
		<th>Scheduled Departure</th>
		<th>Actual Departure</th>
		<th>Scheduled Arrival</th>
		<th>Actual Arrival</th>
		<th>Airplane ID</th>
		<th>Departure Port Code</th>
		<th>Arrival Port Code</th>
	</tr>";
	while ($row=$result->fetch()) {
		echo "<tr><td>".$row["FlightNumber"]."</td><td>".$row["ALCode"]."</td><td>".$row["SchedDeparture"]."</td><td>".$row["ActualDeparture"]."</td><td>".$row["SchedArrival"]."</td><td>".$row["ActualArrival"]."</td><td>".$row["PlaneID"]."</td><td>".$row["DeparturePortCode"]."</td><td>".$row["ArrivalPortCode"]."</td></tr>";
	}	
?>
</table>
<table>
<br>
<h3>Day Of The Week</h3>
<?php
   $query2 = 'SELECT * FROM dayoftheweek';
   $result=$connection->query($query2);
	echo "<table border='1'>
	<tr>
		<th>Flight Number</th>
		<th>Airline Code</th>
		<th>Day Of Week</th>
	</tr>";
	while ($row=$result->fetch()) {
		echo "<tr><td>".$row["FlightNum"]."</td><td>".$row["ALCode"]."</td><td>".$row["DayOfWeek"]."</td></tr>";
	}																						
?>
</table>
</p>
<?php
   $connection = NULL;
?>
</ol>
</body>
</html>