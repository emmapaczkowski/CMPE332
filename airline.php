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
    <?php
    include 'get_all_info_to_add_flight.php';
    ?>
    FlightNumber: <input type="text" name="petname"><br>
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

    <?php
    $connection = NULL;
    ?>
</body>
</html>