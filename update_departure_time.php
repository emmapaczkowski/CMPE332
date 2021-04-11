<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<meta charset="utf-8">
<title>Update departure time</title>
</head>
<body>
<img src="clock.jpg" alt="Airplane" width="1000" height = "300" />
<br></br>

<?php
include 'connectdb.php';
?>


<?php
   $airlineNumber=  $_POST["flightNum"];
   $dHour= $_POST["depHour"];
   $dMin= $_POST["depMin"];
    $dSec= $_POST["depSec"];
    $dTime= $dHour . ":" . $dMin . ":" . $dSec;
    $sql = 'UPDATE flight SET scheduled_departure = "' . $dTime . '" WHERE flight_number = "' . $airlineNumber .'" ';
    //$sql = 'UPDATE flight SET actuall_departure = "" WHERE flight_number = "' . $airlineNumber .'" ';
    $result2 = $connection->query($sql);
   echo "Updating the departure time for flight number: $airlineNumber";
   $query = ' SELECT * FROM flight WHERE flight_number = "' . $airlineNumber .'" '; 
    $result = $connection->query($query);

    echo "<table class = 'table' border='1'>
    <tr>
    <th> Flight Number </th>
    <th> Scheduled Departure</th>
    <th> Actual Departure</th>
    <th> Scheduled Arrival</th>
    <th> Actual Arrival</th>
    </tr>";
 
    while ($row = $result->fetch()) {
     $flightnumber = $row["flight_number"];
     $sArr = $row["scheduled_arrival"];
     $aArr = $row["actuall_arrival"];
     $sDep = $row["scheduled_departure"];
     $aDep = $row["actuall_departure"];
          echo "<tr>"; 
          echo "<td>" . $flightnumber . "</td>";
          echo "<td>" . $sDep . "</td>";
          echo "<td>" . $aDep . "</td>";
          echo "<td>" . $sArr . "</td>";
          echo "<td>" . $aArr . "</td>";
          echo "</tr>"; 
    }
   
?>  


<p></p>
   <button class = "button" onclick="window.location.href='airline.php';">
      Return to home page!
   </button>    
   <br></br>
   <h3>Current information:</h3>


</body>
</html>