<!-- This is for the first part of the assignment and it complete -->
<?php
$result = $connection->query("SELECT flight_number, actuall_arrival FROM flight WHERE actuall_arrival = scheduled_arrival;");
echo "      Flight Number  |  Arrival Time";
echo "<ol>";
while ($row = $result->fetch()) {
	echo "<li>";
	echo $row["flight_number"];
    echo " | ";
    echo $row["actuall_arrival"];
    echo "</li>";
}
echo "</ol>";
?>

