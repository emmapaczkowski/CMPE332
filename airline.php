<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>airline</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Welcome to my airline!</h1>
    <!-- <img src="airplane-flying.jpg" alt="Airplane"> -->
    <h3> On time flights!</h3>
    <?php
    include 'getflights.php';
    ?>

    <h3> Find a flight! </h3>
    <form action="findflight.php" method="post">
    <?php
    include 'getAirlines_and_daysOffered.php';
    ?>
    <input type="submit" value="Select Airline">
    </form>

    <h3>Add a flight!</h3>
    <form action="addflight.php" method="post">
    <p> ('111AN','AN', '1234','YYZ','YYC', '16:00:00','','12:00:00','') <p>
    <?php
    include 'get_all_info_to_add_flight.php';
    ?>
    FlightNumber: <input type="text" name="flightNum"><br>
    AirlineType: <input type="text" name="airplaneType"></br>
    DepartTime: <input type="text" name="departureTime"></br>
    AriveTime: <input type="text" name="arrivalTime"></br>
    DayOfWeek: <input type="text" name="dayOfWeek"></br>

    <input type="submit" value="Add Flight">
    </form>

    <!-- - display airlines
    - display airports

    - GOT flight_number
    - GOT parent_airline
    - flown_by
    - destination
    - origin 
    - scheduled_arrival
    - scheduled_departure
    - you also need to add to days offered table -->
    <h1 class=  "title">Add Flight</h1>
    <h2>Flight List</h2>
    <?php
    $result = $connection->query("select * from flight");
    echo "<table class='table' border='1'>
    <tr>
    <th>Flight Number</th>
    <th> Departure Airport</th>
    <th>Arrival Airport</th>
    <th>Scheduled Departure Time</th>
    <th>Sceduled Arrival Time</th>
    </tr>";
    while ($row = $result->fetch()){
    echo "<tr>";
    echo "<td>" . $row["flight_number"]. "</td>";
    
    echo "<td>" . $row["destination"] . "</td>";
    
    echo "<td>" . $row["origin"] . "</td>";
    
    echo "<td>" . $row["scheduled_departure"] . "</td>";
    
    echo "<td>" . $row["scheduled_arrival"] . "</td>";
    echo "</tr>";
    }
    echo "</table>"    
    ?>

    <br> <button onclick= "reloadPage()">Refresh</button>

    <div class="section">
    <?php
    $connection = NULL;
    ?>
</body>
</html>