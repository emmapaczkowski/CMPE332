<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Average Number of Seats</title>
</head>

<body>
<?php
include 'connectdb.php';
?>

<?php
$whichDay = $_POST["day"];
echo "Flights on $whichDay:";

$query = ' SELECT * FROM days_offered JOIN flight WHERE day = "' . $whichDay . '" ';
   $result = $connection->query($query);
   $totalSeat = 0;
   $sumFlight = 0;

   echo "<table class = 'table' border='1'>
   <tr>
   <th> Flight Number </th>
   <th> Number Seats </th>
   </tr>";

   while ($row = $result->fetch()) {
    $flightnumber = $row["flight_num"];
    $flight_flown_by = $row["flown_by"];
    $query2 = ' SELECT * FROM airplane JOIN airplane_type ON airplane.designed_as = airplane_type.type WHERE airplane.ID = "' . $flight_flown_by .'"';
    $results2 = $connection->query($query2);
    
      while($row = $result->fetch()) {
         echo "<tr>"; 
         echo "<td>" . $flightnumber . "</td>";
         $sumFlight++;
         
      }
      while($row2 = $results2->fetch()) {
        $numSeats = $row2["number_of_seats"];
        echo "<td>" . $numSeats . "</td>";
        echo "</tr>";
        $totalSeat += $numSeats;
      }
      echo "</table>";
    }
    $average = $totalSeat/$sumFlight;
    echo "Average Number of Seats: $average";

?>


<p> Return to home page: </p>
   <button onclick="window.location.href='airline.php';">
      Return to home page!
   </button>

</body>
</html>
