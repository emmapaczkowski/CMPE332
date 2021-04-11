<?php
$query = "SELECT * FROM flight";
$result = $connection->query($query);

echo "Current Flight Numbers: </br>";
echo "<br>";
while ($row = $result->fetch()) {
     echo '<input type="radio" name="flightNum" value="';
     echo $row["flight_number"];
     echo '">' . $row["flight_number"] . "<br>";
}
echo "<br>";
?>