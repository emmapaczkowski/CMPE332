<!DOCTYPE html>
<html> 
<link rel="stylesheet" href="style.css">
<body>
<!-- <img src="header.jpg" alt="header.jpg" width="1000" height = "300" /> -->
<?php
    include 'connectdb.php';
?>

<script>
    fucntion reloadPage() {
        location.reload();
    }
</script>
<div class="header">
  <h1>Add Flight!</h1>
</div>
<h1 class=  "title"></h1>
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
    <h2>Add Flight</h2>
    <form action = "add_flight_page.php" method = "post" name = "addflight">
    <p> Select an Airline:</p>
    <?php
        $query = "SELECT * FROM airline";
        $result = $connection->query($query);
        while ($row = $result->fetch()) {
            echo '<input type="radio" name="airline" value="';
            echo $row["code"];
            echo '">' . $row["name"] . " | " . $row["code"] . "<br>";
        }
    ?>
    <p> Select a departing Airport </p>
    <?php
        echo "<br>";
        $query = "SELECT * FROM airport";
        $result = $connection->query($query);
        while ($row = $result->fetch()) {
            echo '<input type="radio" name="departure" value="';
            echo $row["name"];
            echo '">' . $row["code"] .  "<br>";
        }
   ?>
   <p> Select a arrival Airport </p>
    <?php
        echo "<br>";
        $query = "SELECT * FROM airport";
        $result = $connection->query($query);
        while ($row = $result->fetch()) {
            echo '<input type="radio" name="arrival" value="';
            echo $row["name"];
            echo '">' . $row["code"] .  "<br>";
        }
   ?>

   <p> Select the day of the week </p>
        <input type = "checkbox" id ="monday" name="day[]" value = "Monday">
        <label for = "monday">Monday</label><br>
        <input type = "checkbox" id = "tuesday" name="day[]" value = "Tuesday">
        <label for = "tuesday">Wednesday</label><br>
        <input type = "checkbox" id = "wednesday" name="day[]" value = "Wednesday">
        <label for = "wednesday">Wednesday</label><br>
        <input type = "checkbox" id = "thursday" name="day[]" value = "Thursday">
        <label for = "thursday">Thursday </label><br>
        <input type = "checkbox" id = "friday" name="day[]" value = "Friday">
        <label for = "frieday">Friday </label><br>
        <input type = "checkbox" id = "saturday" name="day[]" value = "Saturday">
        <label for = "saturday">Saturday</label><br>
        <input type = "checkbox" id = "sunday" name="day[]" value = "Sunday">
        <label for = "sunday">Sunday </label><br>

    <p> Enter a three digit flight number:</p>
    <input name = "fnum1" type="number" value="0" min="0" max ="9">
    <input name = "fnum2" type="number" value="0" min="0" max ="9">
    <input name = "fnum3" type="number" value="0" min="0" max ="9">

    <p> Enter the flights scheduled departure time(hr:min:sec):</p>
    <input name="depHour" id="hour" type="number" value='0' min="0" max="23">
    <input name="depMin" id="min" type="number" value='0' min="0" max="59">
    <input name="depSec" id="sec" type="number" value='0' min="0" max="59">

    <p> Enter the flights scheduled arrival time(hr:min:sec):</p>
    <input name="arrHour" id="hour" type="number" value='0' min="0" max="23">
    <input name="arrMin" id="min" type="number" value='0' min="0" max="59">
    <input name="arrSec" id="sec" type="number" value='0' min="0" max="59">
    <br></br>


   <br></br>
   
    <input type = "submit" name="submit" value="New Flight" onClick="clearform()" >  
    </form>

    <?php
        if(isset($_POST["submit"])) {
            $airLine = $_POST["airline"];
            $departureAirport = $_POST["departure"];
            $arrivalAirort= $_POST["arrival"];
            $whichDay = $_POST["day"];
            $number1 = $_POST['fnum1'];
            $number2 = $_POST['fnum2'];
            $number3= $_POST['fnum3'];
            $flightNumber= $airLine . $number1 . $number2 .$number3;
            $dHour= $_POST["depHour"];
            $dMin= $_POST["depMin"];
            $dSec= $_POST["depSec"];
            $dTime= $dHour . ":" . $dMin . ":" . $dSec;
            $aHour= $_POST["arrHour"];
            $aMin= $_POST["arrMin"];
            $aSec= $_POST["arrSec"];
            $aTime= $aHour . ":" .  $aMin . ":" . $aSec;
            $sql1 = 'SELECT ID FROM airplane WHERE owened_by = "'. $airLine. '" ';
            $resut = $connection->query($sql1);
            $airplaneID = "null";
            if ($row = $result->fetch()){
                $airplaneID = $row["ID"];
            }
        
            $sql2 = 'INSERT INTO flight VALUES("' . $flightNumber. '" , "' . $airLine . '" , "' . $airplaneID. '" , "' . $arrivalAirort. '" , "' . $departureAirport. '" , "' . $dTime. '" , "' .$dTime . '" , "' . $aTime . '" , "' .$aTime . '")';
            if($airplaneID != "null") {
                $sql4 = 'SELECT flight_number FROM WHERE flight_number = "' . $flightNumber .'" ';
                $value = $connection->query($sql4);
                if(!($row = $value->fetch())) {
                    $numRows = connection->exec($sql2);
                }
            }

            if(isset($_POST['day'])) {
                if (is_array($_POST['day'])) {
                    foreach($_POST['day'] as $value) {
                       $sql3 = 'INSERT INTO days_offered VALUES( "'  . $flightNumber . '" , "' . $value . '" ) ';
                       $sql4 = 'SELECT flight_num FROM days_offered  WHERE flight_num = "' . $flightNumber . '" ';
                       $value = $connection->query($sql4);
                       if (!($row = $value-> fetch())) {
                           $numRow2 = $connection->exec($sql3);
                       }
                    }

                } else {
                    $value = $_POST['day'];
                    $sql3 = 'INSERT INTO days_offered VALUES( "' . $flightNumber . '" , "' . $value . '" )' ;
                }
            }

        } 
        echo "<br>";
    ?>
    
     <button class="button" onclick="window.location.href='airline.php';">
      Return to home page!
   </button>


</body>

</html>