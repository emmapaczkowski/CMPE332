<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<meta charset="utf-8">
<title>Flights from airline on day</title>
<style> 
   .table {
      margin-left: fit;
      margin-right: fit;
   }

</style>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Here are your flights:</h1>
<!-- <table> -->
<?php
   $whichAirline=  $_POST["airline"];
   $whichDay = $_POST["day"];
   $query = ' SELECT * FROM days_offered JOIN flight WHERE day = "' .$whichDay . '" AND parent_airline= "' . $whichAirline. '" ';
   $result = $connection->query($query);
   echo "<table class = 'table' border='1'>
   <tr>
   <th> Flight Number </th>
   <th> Departure City </th>
   <th> Arrival City </th>
   </tr>";

   while ($row = $result->fetch()) {
      $flightnumber = $row["flight_num"];
      $originQuery = ' SELECT airport.city FROM flight JOIN airport ON flight.origin = airport.code WHERE flight.flight_number = "' . $flightnumber .'" ';
      $result2 = $connection->query($originQuery);
      $departQuery = ' SELECT city FROM flight JOIN airport ON flight.destination = airport.code WHERE flight.flight_number = "' . $flightnumber .'" ';
      $result3 = $connection->query($departQuery);
      while($row2 = $result2->fetch()) {
         echo "<tr>"; 
         echo "<td>" . $flightnumber . "</td>";
         echo "<td>" . $row2["city"] . "</td>";
      }

      while($row3 = $result3->fetch()) {
         echo "<td>" . $row3["city"] . "</td>";
         
      }
      echo "</tr>";
      echo "</table>";
   }

?>

<p> </p>
   <button class = "button" onclick="window.location.href='airline.php';">
      Return to home page!
   </button>

</body>
</html>