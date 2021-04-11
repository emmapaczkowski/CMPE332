<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>airline</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Welcome to Emma Paczkowski's airline!</h1>
    <img src="airplane-flying.jpg" alt="Airplane" width="600" height = "300" />
    <h3> On time flights!</h3>
    <?php
    include 'getflights.php';
    ?>

    <h3> Find a flight! </h3>
    <form action="findflight.php" method="post">
        <?php
        include 'getAirlines_and_daysOffered.php';
        ?>
        <input class = "button2" type="submit" value="Select Airline">
    </form>
    <br><br/> 

    <h3>Add a flight!</h3>
    <button class = "button2" onclick="window.location.href='add_flight_page.php';">
        Add flight
    </button>
    <br><br/> 

    <h3>Update Departure Time</h3>
    <form type="number" action="update_departure_time.php" method="post">
        <?php
        include 'getAirplanecodes.php';
        ?>
        <input name="depHour" id="hour" type="number" value='0' min="0" max="23">
        <input name="depMin" id="min" type="number" value='0' min="0" max="59">
        <input name="depSec" id="sec" type="number" value='0' min="0" max="59">
        <br><br/> 
        <input class = "button2" type="submit" value="Update">
    </form>
    <br><br/> 

   <h3>Average number of seets per Day</h3>
   <form type= "number" action = "getAverageNumSeats.php" method = "post">
        <?php
        include 'getDaysOffered.php';
        ?> 
        <input type="submit" value="Get Average">    
   </form>

    <?php
    $connection = NULL;
    ?>
       <br><br/> 
       <br><br/> 
       <br><br/> 
       <div class="footer">
  <p>Thank you!</p>
</div>
</body>
</html>