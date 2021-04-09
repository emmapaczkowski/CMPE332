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
    
    <?php
    $connection = NULL;
    ?>

</body>
</html>